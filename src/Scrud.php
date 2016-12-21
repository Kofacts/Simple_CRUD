<?php

	class Scrud{

		public function __construct()
		{
			require_once("../src/config.php");
			if($connectDetails["connect_type"]=="MYSQLI" )
			{
				//Connect using PDO.
				try
				{
					$connect= new mysqli($connectDetails['hostname'],$connectDetails['username'],$connectDetails['password'],$connectDetails['DB_NAME']);

					if($connect===TRUE)
					{
						return true;
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

					$connect= new PDO("mysql:host=$connectDetails['hostname'];dbname=$connectDetails['DB_NAME'], $connectDetails['username'], $connectDetails['password']");
					
				} catch (PDOException $e) {

					die($e->getMessage());
					
				}
			}
		}

		public static function create()

		{

		}
	}