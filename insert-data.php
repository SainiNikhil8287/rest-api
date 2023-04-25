<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$task = $data['api_name'];
$status = $data['api_status'];

include "config.php";

$sql = "INSERT INTO tasks(task,status) VALUES ('{$task}','{$status}')";

if(mysqli_query($conn,$sql)){
	echo json_encode(['message'=>'Task Inserted','status'=> true]);
}else{
	echo json_encode(['message'=>'Task Not Inserted','status'=> false]);
}

?>