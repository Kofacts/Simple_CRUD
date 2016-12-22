<?php

	include "../src/Scrud.php";
	$news= new Scrud;
	

	//$news->create("user_details",array("username"=>"Ricesss","password"=>"pico4421ss"));
//	$posts=$news->get("user_details");
//	foreach($posts as $row)
//	{
//		echo $row['username']."<br>";
//	}

	//$no=$news->get_where("user_details","id",1);
	//echo $no['username'];
	//$news->update("user_details",array("username"=>"Rapheal","password"=>"skjf...ochemylove"),"id",1);
	$news->delete("user_details","id",2);