<?php
//database connection file
//save this file as connection.php inside the newly created folder
$dbuser = "root";
$dbpass = "";
$dbhost = "localhost";
$dbname = "book_db";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>