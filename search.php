<?php  

header('Content-Type: application/json'); // for 3rd party to know,data is in json formate
header('Access-control-Allow-Origin: *');// * For all and we can give custom url
include "config.php";

$data = json_decode(file_get_contents("php://input"), true);
$search_value = $data['search_name'];

$sql = "SELECT * FROM tasks WHERE task LIKE '%{$search_value}%'";
$result = mysqli_query($conn,$sql) or die("Sql Query Failed.");

if(mysqli_num_rows($result) > 0){
		$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
		echo json_encode($output);
}else{
	
	echo json_encode(array('message'=>'No Record Found.','status' => false));
	
	}

 ?>
 