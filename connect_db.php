<?php

function connectDB(){

  $servername = "localhost";
  $username = "root";
  $password = "root";
  
  try {
    $conn = new PDO("mysql:host=$servername;dbname=first", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  return $conn;
  
  // ---------  Create DB   -------------
  // $sql = "CREATE DATABASE myDBPDO";
  // $conn->exec($sql);
  // echo "Database created successfully<br>";
  
  // -------------------------------------
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}

$pdo = connectDB();

// Migration
function initMigration($pdo){
  try{
    $sql = "CREATE TABLE MyGuests (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      age INT NOT NULL
      )";
    ;
    $pdo->exec($sql);
  } catch(PDOException $e){
    echo "Table Creation failed: " . $e->getMessage();
  }
}
?>
