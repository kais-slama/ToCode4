<?php
header("Content-Type:application/json");
if (isset($_GET['cin']) && $_GET['cin']!="") {
	include('DB_Connection.php');
	$cin = $_GET['cin'];
	$result = mysqli_query($conn,"SELECT * FROM `info` WHERE cin=$cin");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$id = $row['id'];
	$name = $row['name'];
	$password = $row['password'];
    $response_code = $row['response_code'];
	$response_desc = $row['response_desc'];
	
	response($id,$cin,$name, $password,$response_code,$response_desc);
	mysqli_close($conn);
	}else{
		response(NULL,NULL,NULL,NULL,200,"No Record Found");
		}
}else{
	response(NULL,NULL,NULL,NULL,400,"Invalid Request");
	}

function response($id,$cin,$name,$password,$response_code,$response_desc)
{
	$response['id'] = $id
	$response['cin'] = $cin;
    $response['name'] = $name;
	$response['$password'] = $password;
    $response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	$json_response = json_encode($response);
	echo $json_response;
}
?>