<?php
    // $dbServername = "localhost";
    // $dbUserName = "root";
    // $dbPassword = "lutenica123";
    // $dbName = "todotasksDB";

    // $conn = mysqli_connect($dbServername, $dbUserName, $dbPassword, $dbName);

    // if(!$conn){
    //     //dopishi
    // }
    $host="localhost";
    $port=3306;
    $user="root";
<<<<<<< HEAD
    $password=""; 
=======
    $password="lutenica123";
>>>>>>> 7ac9164a8b5ac49a6294040ccfa17b80a209e26f
    $dbname="tododb";

    $con = new mysqli($host, $user, $password, $dbname, $port)
	or die ('Could not connect to the database server' . mysqli_connect_error());

    //$con->close();
