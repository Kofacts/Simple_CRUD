# Simple_CRUD
A Simple Create,Read,Update,Delete Library for your PHP Web App. Basically, there wouldn't be any need to tinker with annoying Query Codes.
Leverages Both MYSQLi and PDO.


# How to use?
1. Clone this Repo which will then be stored in your chosen directory as Simple_CRUD

<code> git clone https://github.com/kofacts/Simple_CRUD.git"</code>

2. Open the File

3. Locate the src/ directory and Open the config.php

4. Fill in the necessary details and DB_Type. MYSQLI or PDO.

<code> 	$connectDetails=[
			"hostname"=>"hostname",
			"username"=>"username",
			"password"=>"password",
			"DB_NAME"=>"database name",
			"connect_type"=>strtoupper("pdo or mysqli"),
		];
</code>

5. Inside your Main Page, say index.php, instantiate a Scrud Object.

<code> $scrud= new Scrud;</code>

6. Now you Have done the needful, What can you do with all this.

# Some of the Basic Methods you can use.

1. create($tablename,$fields) : The tablename is the name of the Tablename you wish to add Data to, while the fields are the array of data you wish to  insert values into.  From the code below, the user_details is the tablename, while the array are yes, array of values you wish to insert data into.

<code>$scrud->create("user_details",array("username"=>"Ricesss","password"=>"pico4421ss")); </code>

2. get($tablename) : params is just $tablename. This would get all fields from DB. Simple instantiate the Scrud Class. eg

<code>$posts=$scrud->get("user_details");</code>

And then loop through all the fields.

<code>foreach($posts as $row)
	{
		echo $row['username']."<br>";
	}</code>

3. get_where($tablename,$id,$value): This would accept params tablename,id/field and the value you wish to get. To use, simply do

<code>$value=$scrud->get_where($tablename,$id,$value)</code>
And then use

<code>echo $value['username'];</code>

4. update($tablename,$field,$id,$value); This would accept params $tablename,$field [arrays],id to be update and value. To use, simply do,

<code>$scrud->update("user_details",array("username"=>"Rapheal","password"=>"skjf..anything"),"id",1);</code>

5. delete($tablename,$id,$value): This would accept params $tablename,$id to delete and then value. To Use, Simply do,

<code>$scrud->delete("user_details","id",2);</code>

# Inspiration
The Concept is inspired by Codeigniter's Sleek Query System. Make it simple, and very simple has always been the name.

# Contribute

There are so many features that should be added to this platform. Hey, Don't just leave, you can always contribute by pulling a request.

# This would Help Me, How should i thank you.

Nah, Nada, Don't thank Me. 
Actually, you can thank me by Staring. 
Em, :smile: I think that is just it.

<b>PS:</b> Some Basic Touches still going on.

# Licence
MIT
