<?php


  // Configuration for database connection


$host       = "sql7.freemysqlhosting.net";
$username   = "sql7304335";
$password   = "umvGzid9np";
$dbname     = "sql7304335"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );