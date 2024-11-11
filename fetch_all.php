<?php
include("connection.php");

try{
  $stmt=$conn->prepare("SELECT * FROM users");
  $stmt->execute();
  $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

  if($result){
    echo json_encode(array("status"=>"success","data"=> $result));
  }else{
    echo json_encode(array("status"=> "error","data"=> "Data Not Found"));
  }
}catch(PDOException $e){
  echo json_encode(array("status"=> "error","data"=>$e->getMessage()));
}