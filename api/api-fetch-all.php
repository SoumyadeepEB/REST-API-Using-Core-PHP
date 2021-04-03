<?php 
    include "config.php";
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    $stmt = $conn->prepare("SELECT * FROM users");
    if($stmt->execute()){
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($users) > 0){
            http_response_code(200);
            echo json_encode([
                'status'=>'200',
                'data'=>$users
            ]);
        }else{
            http_response_code(403);
            echo json_encode([
                'status'=>'403',
                'message'=>'no record found'
            ]);
        }
    }else{
        http_response_code(500);
        echo json_encode([
            'status'=>'500',
            'message'=>'internal server error'
        ]);
    }
?>