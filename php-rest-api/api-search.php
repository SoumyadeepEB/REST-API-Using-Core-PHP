<?php 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    $data = json_decode(file_get_contents("php://input"), true);
    
    $search_item = $data['search'];

    include "config.php";

    $sql = "SELECT * FROM users WHERE name LIKE '{$search_item}%'";
    $result = mysqli_query($link,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($output);
    }

    else
    {
        echo json_encode(array('message' => 'No search found', 'status' => false));
    }
?>