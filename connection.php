<?php

  $host='localhost';
$dbname='testing_ajax';
$user='root';
$password="";
  try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //return $conn;
    }catch(PDOException $e){
      echo "Error". $e->getMessage()."Try again";
      
    }
?>
