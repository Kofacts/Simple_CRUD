<?php

/**
* 	Author: Rapheal Prince
*	Name: Simple CRUD Library.
*
**/
	class Scrud{

		protected $type;
		protected $Mode;
		protected $tablename;
		protected $fields=[];
		protected $wherefields;
		protected $value;
		protected $id;
		protected $field;

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
						$this->Mode="MYSQLI";
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
				$query=sprintf("INSERT into $tablename (%s) VALUES (%s)",implode(",", array_keys($this->fields)),'"'.implode('","', array_values($this->fields)).'"');

				try{
					$connect_db=$this->type->query($query);

					if(isset($connect_db))
					{
						die("You inserted into DB using Mysqli Method");
					}
					else{
						throw new Exception("Error!");
					}

				}catch (PDOException $e)
				{
					echo $e->getMessage();
				}

			}


		}


		public function get($tablename)
		{
			$this->tablename=$tablename;
			//This will apparently get everything from the DB.
			if($this->Mode=="MYSQLI")
			{
				$get_db="SELECT * FROM $this->tablename";
						//Run the Query.
						$get_db=$this->type->query($get_db);
						if($get_db->num_rows>1)
						{
							foreach($get_db as $data)
							{
								$row[]=$data;
							}
							return $row;
						}
						else{
							die("False");
						}
			}
			else{
				//prepare("SELECT id, firstname, lastname FROM MyGuests")
				$get_db=$this->type->prepare("SELECT * FROM $this->tablename");
				$get_db->execute();
				$get_db=$get_db->fetchAll();

				//iterative.
				if(count($get_db)>0)
				{
					//There is something in DB.
					foreach($get_db as $data)
					{
						$row[]=$data;
					}
					return $row;
				}
				else{
					die("Fuck you mean");
				}
				
			}

		}
		public function get_where($tablename,$id,$value)
		{
			$this->tablename=$tablename;
			$this->value=$value;
			$this->id=$id;

			//Check which connection is used.
			if($this->Mode=="MYSQLI")
			{
				//Check what the user is currently using to crawl.
				$query=sprintf("SELECT * FROM $this->tablename WHERE %s = %s",$this->id,$this->value);
				$query=$this->type->query($query);
				if($query->num_rows==1)
				{
					$get=$query->fetch_assoc();
					$row=$get;
					return $row;
					die("I Just saw some Shit");
				}
				else{
					die("Fuck Uou");
				}
			}
			else{
				//This is for PDO.
				$query=sprintf("SELECT * FROM $this->tablename WHERE %s = %s",$this->id,$this->value);
				$query=$this->type->prepare($query);
				$query->execute();

				if(count($query)==1)
				{
					$get=$query->fetch(PDO::FETCH_ASSOC);
					$row=$get;
					return $row;
				}
			}


		}

		public function update($tablename,$id,$field,$value)
		{
			$this->tablename=$tablename;
			$this->id=$id;
			$this->value=$value;
			$this->field=$field;

			if($this->Mode=="MYSQL")
			{
				//query="UPDATE $tablename SET $id=$id WHERE $field=$value";
				die("Hello");
			}
			else{
				die("Hell Awasits");
			}
		}


	}