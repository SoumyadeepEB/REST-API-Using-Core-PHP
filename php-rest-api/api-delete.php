<?php 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: 
            Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"), true);
    
    $user_id = $data['sid'];


    include "config.php";

    $sql = "DELETE FROM users WHERE id = '{$user_id}'";

    if(mysqli_query($link,$sql))
    {
        echo json_encode(array('message' => 'Success', 'status' => true));
    }

    else
    {
        echo json_encode(array('message' => 'Failed', 'status' => false));
    }
?>