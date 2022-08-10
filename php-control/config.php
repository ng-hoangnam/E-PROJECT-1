<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator <taithanh95.dev@gmail.com>
 * Date: 10/08/2022
 * Time: 2:40 PM
 */

//Config Database
$mySQL = new mysqli("localhost", "root", "");

if ($mySQL === false) {
    die("ERROR: Could not connect..." . $mySQL->connect_error);
}

// Create Database
$database = "CREATE DATABASE IF NOT EXISTS ChicLighting";

$mySQL->query($database);

// Create Table Users
$feedbackTable = "CREATE TABLE IF NOT EXISTS Feedback (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        fullname VARCHAR(50),
        email VARCHAR(50),
        comment VARCHAR(50),
        experience VARCHAR(50),
        crtdate DATE
    )";

$connect = new mysqli("localhost", "root", "", "ChicLighting");

if ($connect === false) {
    die("ERROR: Could not connect..." . $mySQL->connect_error);
}

$connect->query($feedbackTable);

