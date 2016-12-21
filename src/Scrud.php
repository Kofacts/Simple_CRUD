<?php

	class Scrud{

		public function __construct()
		{
			require_once("../src/config.php");
			if($connectDetails["connect_type"]=="MYSQLI" )
			{
				//Connect using PDO.
				$connect= new mysqli($connectDetails['hostname'],$connectDetails['username'],$connectDetails['password'],$connectDetails['DB_Name']);
			}
			elseif($connectDetails["connect_type"]=="PDO")
			{
				//Connect using PDO
			}
		}

		public static function create()

		{

		}
	}