<?php
include("connection.php");
header("Content-Type:application/json");

$data=json_decode(file_get_contents("php://input"),true);
$id=$data["id"];

try{
  $stmt=$conn->prepare("DELETE FROM users WHERE id=:id");
  $stmt->bindParam(":id", $id);
  $stmt->execute();

  echo json_encode(array("status"=> "success","message"=> "Data Deleted SuccessFully"));
}catch(PDOException $e){
  echo json_encode(array("status"=> "error","message"=>$e->getMessage()));
}
?>