<?php 
    $conn = new PDO("mysql:host=localhost;dbname=restapi",'root','');
    
    if(!$conn){
        echo json_encode([
            'status'=>500,
            'message'=>'database not connected'
        ]);
        die;
    }
?>