<?php
include("connection.php");
header("Content-Type:application/json");
$data = json_decode(file_get_contents("php://input"), true);
$id = $data["id"];
$fname = $data["fname"];
$lname = $data["lname"];

try {
  $stmt = $conn->prepare("UPDATE users SET fname = :fname, lname = :lname WHERE id = :id");
  $stmt->bindParam(":id", $id);
  $stmt->bindParam(":fname", $fname);
  $stmt->bindParam(":lname", $lname);
  $stmt->execute();
  echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
  echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>