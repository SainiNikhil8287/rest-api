<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Header: Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);// True => for Associated Array

$id = $data['id'];

include "config.php";
$sql = "DELETE FROM tasks WHERE id = '{$id}'";

if(mysqli_query($conn,$sql)){
	echo json_encode(['message'=>'Task Deleted','status'=> true]);
}else{
	echo json_encode(['message'=>'Task Not Deleted','status'=> false]);
}

?>