<?php
  $DB_SERVER = 'localhost';
  $DB_USER = 'Elvis';
  $DB_PASSWORD  = '12345';
  $DB_NAME = 'Php_dev';

  // create connection
  $conn = new mysqli($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);

  // check connection
  if($conn -> connect_error){
    die('Connection Failed' . $conn->connect_error);
  }
?>