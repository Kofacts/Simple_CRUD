# Simple_CRUD
A Simple Create,Read,Update,Delete Library for your PHP Web App. Basically, there wouldn't be any need to tinker with annoying Query Codes.

Inspired by Laravel's Sleek Query System.

# How to use?
1. Hit up the terminal and glone this repo using :

<code> git clone https://github.com/Kofacts/Simple_CRUD.git</code> 

2. The File will be stored with the Name, Simple_CRUD.

3. Next, include or require the file src/Srud or

<code>require{Scrud/Scrud} for Composer [Little Fixing though]</code>

4. instantiate the class.

<code>$scrud = new Scrud($tablename);</code>

Before you Proceed, this Lib. is built with abstraction in mind, making everything, out of the box for you.

First, locate the config.pj folder and edit the corresponding details there.
The DB Name, Server, hostname, password and all that.
Then you can proceed to the next step below.

5. To Insert Data into DB, Simply use:

<code>
	$news= new Scrud;
	$news->create("user_details",array("username"=>"Ricesss","password"=>"pico4421ss"));
	You can increase the array as you wish.
	Where user_details is the tablename, and array are the column and values data respectively.
</code>



6. To Get a Post.

<code>
	Instantiate the class first via
	$news = new Scrud;
	Then access the db using the tablename.

	$posts=$news->get("user_details");

	To Get all the Data from the Db, simply do.

	foreach($posts as $row)
	{
		echo $row['username']."<br>";
	}
	NB: "$posts must be equal to $posts" as declared above.
</code>

7. Get Post with Id. You can use the code below that is after instantiating your class. For this, i am making use of $news.

<code>
	$no=$news->get_where("user_details","id",1);
	echo $no['password'];
</code>