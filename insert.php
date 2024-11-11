<?php
include("connection.php");
header("Content-Type: application/json");

// Get the input data
$data = json_decode(file_get_contents("php://input"), true);

// Check if fname and lname are set
// if (!isset($data["fname"]) || !isset($data["lname"])) {
//     echo json_encode(['status' => 'Error', 'msg' => 'Missing fname or lname']);
//     exit;
// }

$fname = $data["fname"];
$lname = $data["lname"];

try {
  // Prepare the statement
  $stmt = $conn->prepare("INSERT INTO users(fname, lname) VALUES(:fname, :lname)");

  // Bind parameters
  $stmt->bindParam(":fname", $fname);
  $stmt->bindParam(":lname", $lname);

  // Execute the statement
  $stmt->execute();



  $row = array('status' => 'success', 'msg' => 'Saved and Data Inserted');
} catch (PDOException $e) {
  $row = array('status' => 'Error', 'msg' => $e->getMessage());
}

echo json_encode($row);
