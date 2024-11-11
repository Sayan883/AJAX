<?php
include("connection.php");
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$id = $data["id"];

if ($id) {
  try {
    $stmt = $conn->prepare("SELECT id, fname, lname FROM users WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      echo json_encode(['status' => 'success', 'data' => $user]);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'No data found']);
    }
  } catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid ID']);
}
?>
