<?php

	class Scrud{

		protected $type;
		protected $Mode;
		protected $tablename;
		protected $fields=[];

		public function __construct()
		{
			require_once("../src/config.php");
			if($connectDetails["connect_type"]=="MYSQLI" )
			{
				//Connect using MySQLi.
				try
				{
					//$connectDetails['hostname'],$connectDetails['username'],$connectDetails['password'],$connectDetails['DB_NAME']
					$connect= new mysqli($connectDetails['hostname'],$connectDetails['username'],$connectDetails['password'],$connectDetails['DB_NAME']);

					if(isset($connect))
					{
						$this->type=$connect;
						$this->Mode="Mysqli";
					}
					else{
						throw new Exception("Error Estalishing DB Connection", 1);
						
					}
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
			}
			elseif($connectDetails["connect_type"]=="PDO")
			{
				//Connect using PDO

				try {
					//".$connectDetails['hostname'].";dbname=".$connectDetails['DB_NAME'].", ".$connectDetails['username'].", ".$connectDetails['password']."
					$connect= new PDO("mysql:host=".$connectDetails['hostname'].";dbname=".$connectDetails['DB_NAME']."", $connectDetails['username'], $connectDetails['password']);
					$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					if(isset($connect))
					{
						$this->type=$connect;
						$this->Mode="PDO";
					}
					
				} catch (PDOException $e) {

					die($e->getMessage());
					
				}
			}
		}



		public function create($tablename,$fields)

		{
			//Verify which host is used.
			$this->tablename=$tablename;
			$this->fields=$fields;

			if($this->Mode=="PDO")
			{
				//Mode in PDO.
				//Use PDO Query.
				//loop through the array.
				//$test=":".implode(",:",array_keys($this->fields));
				$query=sprintf("INSERT into $tablename (%s) VALUES (%s)",implode(",", array_keys($this->fields)),'"'.implode('","', array_values($this->fields)).'"');
				var_dump($query);

				try {
					$create_db=$this->type->query($query);
					if($create_db->execute())
					{
						die("Cool");

					}
					else{
						throw new PDOExcception("Error Adding Data to DB",1);
					}
				} catch (PDOException $e) {
					echo $e->getMessage();
					
				}


			}
			else{
				//Mode in Mysqli.
				//USe MqSqli Query.
				echo count($this->fields);
			}


		}


	}