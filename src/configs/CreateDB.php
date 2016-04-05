<?php
$link = mysqli_connect('localhost','root','yes');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
mysqli_query($link,'DROP DATABASE IF EXISTS HW3');
$sql = 'CREATE DATABASE HW3';
if (mysqli_query($link,$sql)) {
    echo "Database HW3 created successfully\n";
    $db_selected=mysqli_select_db($link,'HW3');
    $sql='CREATE TABLE users(
     user_id int(5) NOT NULL AUTO_INCREMENT,
     user_name VARCHAR(50),
     password VARCHAR(50),
     PRIMARY KEY(user_id)
     )';
	if(mysqli_query($link,$sql)){
		echo "Table users created successfully\n";
		$sql="INSERT INTO users VALUES (1, 'harika', 'p'),(2, 'suchita', 'p'),(3, 'ashish', 'p')";
		if(mysqli_query($link,$sql)){
			echo "3 rows inserted in to users table\n";
		}
		else {
	    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	} else {
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	$sql='CREATE TABLE images(
		image_id int(5) NOT NULL AUTO_INCREMENT,
		image_name VARCHAR(50),
		image_caption VARCHAR(100),
		avg_rating FLOAT,
		uploaded_by int(5),
		uploaded_date TIMESTAMP,
		PRIMARY KEY(image_id),
		FOREIGN KEY (uploaded_by) REFERENCES users(user_id)
		)';
	if(mysqli_query($link,$sql)){
		echo "Table images created successfully\n";
		$sql="INSERT INTO images VALUES (1, '1.jpg', 'first pic',5,1,NOW()), (2, '2.jpg', 'one more',0,2,NOW())";
		if(mysqli_query($link,$sql)){
			echo "2 rows inserted in to images table\n";
		}
		else {
	    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	} else {
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	$sql='CREATE TABLE ratings(
		id int(5) NOT NULL AUTO_INCREMENT,
		image_id int(5),
		user_id int(5),
		rate int(5),
		rated_date TIMESTAMP,
		PRIMARY KEY(id),
		FOREIGN KEY (image_id) REFERENCES images(image_id),
		FOREIGN KEY (user_id) REFERENCES users(user_id)
		)';
	if(mysqli_query($link,$sql)){
		echo "Table ratings created successfully\n";
		$sql="INSERT INTO ratings VALUES (1, 1, 2, 5, NOW())";
		if(mysqli_query($link,$sql)){
			echo "1 rows inserted in to ratings table\n";
		}
		else {
	    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	} else {
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
} else {
    echo "Error creating database: " . mysqli_connect_error() . "\n";
}
	
mysqli_close($link);
