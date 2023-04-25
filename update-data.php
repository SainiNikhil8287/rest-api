<?php 


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Header: Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);// True => for Associated Array

$id = $data['id'];
$task_name = $data['name'];
$task_status = $data['status'];

include "config.php";
$sql = "UPDATE tasks SET task = '{$task_name}',status = '{$task_status}' WHERE id = '{$id}'";

if(mysqli_query($conn,$sql)){
	echo json_encode(['message'=>'Task Updated','status'=> true]);
}else{
	echo json_encode(['message'=>'Task Not Updated','status'=> false]);
}