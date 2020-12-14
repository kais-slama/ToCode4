<?php
	// Connect to database
	include("DataBase.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getinfoUsers()
	{
		global $conn;
		$query = "SELECT * FROM `info`";
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function getinfoUser($cin=0)
	{   
		global $conn;
	
		if($cin != 0)
		{
			$query="SELECT * FROM `info` WHERE cin=$cin";
		}
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function AddUser()
	{
		global $conn;
		$id = $_POST["id"];
		$cin = $_POST["cin"];
        $name = $_POST["name"];
		$password = $_POST["password"];
		
	
		echo $query="INSERT INTO info VALUES('".$id."','".$cin."','".$name."', '".$password."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'utilisateur ajouté avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	
	switch($request_method)
	{
		
		case 'GET':
			if(!empty($_GET["cin"]))
			{
				$id=$_GET['cin'];
				getinfoUser($cin);
			}
			else
			{
                getinfoUsers();
            }
			
			break;
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			AddUser();
			break;
			

	}
?>