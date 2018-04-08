<?php

	$host = $_POST['txthost'];
	$username = $_POST['txtuser'];
	$pass = $_POST['txtpass'];
	$dbname = $_POST['txtdbname'];


	// Create connection
	$conn = new mysqli($host, $username, $pass);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS ".$dbname." CHARACTER SET utf8 COLLATE utf8_unicode_ci";
	if ($conn->query($sql) === TRUE) {
	    //Create table
		$conn2 =  mysqli_connect($host, $username, $pass, $dbname);

		$sqltable = "CREATE TABLE post (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			title VARCHAR(30) NOT NULL,
			description TEXT  NOT NULL,
			image VARCHAR(50)  NOT NULL,
			status INT(6)  NOT NULL,
			created_at DATETIME,
			pdated_at DATETIME
		)";
		$usertable = "CREATE TABLE user (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(30) NOT NULL,
			password VARCHAR(30) NOT NULL,
			created_at DATETIME,
			pdated_at DATETIME
		)";

		if (mysqli_query($conn2, $sqltable)) {
		    if (mysqli_query($conn2, $usertable)){
                fopen("check.txt", "w");
                $file = fopen("check.txt", "w");
                $string = $host." ".$username." ".$pass." ".$dbname;
                fwrite($file,$string);
                header("Location: http://localhost:88/training/indice.php");
		    } else {
		    	echo "Error creating table: " . mysqli_error($conn2);
		    }
		} else {
		    echo "Error creating table: " . mysqli_error($conn2);
		}
	} else {
	    echo "Error creating database: " . $conn->error;
	}

	$conn->close();


?>