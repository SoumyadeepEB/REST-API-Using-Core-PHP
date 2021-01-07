<?php 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"), true);
    
    $name = $data['sname'];
    $age = $data['sage'];


    include "config.php";
	

    $sql = "INSERT INTO users (name,age) VALUES ('{$name}','{$age}')";

    if(mysqli_query($link,$sql))
    {
        echo json_encode(array('message' => 'Success', 'status' => true));
    }

    else
    {
        echo json_encode(array('message' => 'Failed', 'status' => false));
    }
?>