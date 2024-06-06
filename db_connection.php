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
    $password="";
    $dbname="tododb";

    $con = new mysqli($host, $user, $dbname, $port)
	or die ('Could not connect to the database server' . mysqli_connect_error());

    //$con->close();
