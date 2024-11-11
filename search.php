<?php
include("connection.php");
header('Content-Type: application/json');

$data=json_decode(file_get_contents("php://input"),true);
$search=$data['search'];

try{
  $stmt= $conn->prepare('SELECT * FROM users WHERE fname LIKE :search OR lname LIKE :search');
  $stmt->execute(['search' => "%$search%"]);
  $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
  if($result){
    echo json_encode(['status'=>'success', 'data'=>$result]);
  }else{
    echo json_encode(['status'=> 'error', 'data'=>'Data not found']);
  }
}catch(PDOException $e){
  echo json_encode(['status'=> 'error', $e->getMessage()]);
}