<?php
/**
*	@param hostname,username,password and Database Name.
*	@param connect_type can be PDO or MySqli;
*   PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
*/
	$connectDetails=[
			"hostname"=>"localhost",
			"username"=>"root",
			"password"=>"pico4421",
			"DB_NAME"=>"loginlib",
			"connect_type"=>strtoupper("pdo"),
		];

	