<?php

    ob_start(); //Turns on output buffering
    session_start();

    date_default_timezone_set("Asia/Yangon");

    try{
        $con = new PDO("mysql:dbname=zephflix;host=localhost", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch(PDOException $e) {
        exit("Connection failed: " . $e->getMessage());
    }

?>