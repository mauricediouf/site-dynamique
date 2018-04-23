<?php
	
	define ('DB_HOST', 'localhost');
	define ('DB_NAME', 'Maurice');
	define ('DB_USERNAME', 'root');
	define ('DB_PASSWORD', 'auf');



	try {

		$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_root, DB_auf);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

	}catch(PDOException $e){

		die('Erreur '.$e->getMessage());
	}

 ?>