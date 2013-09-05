<?php

class Config {
	
	/* Database Config  */
	var $type = "MySQL"; // Only MySQL
	var $host = "localhost";
	var $user = "root";
	var $password = "";
	var $db = "bookmarks";
	var $login_table = "usuarios";
	var $books_table = "bookmarks";
	
	
	/* General Config */
	var $not_found = "404.html";
	var $forbidden = "403.html";
	
}

?>