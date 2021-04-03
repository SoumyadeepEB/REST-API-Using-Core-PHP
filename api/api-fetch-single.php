<?php 
    include "config.php";
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    if(isset($_GET['id']) || !empty($_GET['id'])){
        $user_id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE id='$user_id'");
        if($stmt->execute()){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user != ''){
                http_response_code(200);
                echo json_encode([
                    'status'=>'200',
                    'data'=>$user
                ]);
            }else{
                http_response_code(404);
                echo json_encode([
                    'status'=>'404',
                    'message'=>'user not found'
                ]);
            }
        }else{
            http_response_code(500);
            echo json_encode([
                'status'=>'500',
                'message'=>'internal server error'
            ]);
        }
    }else{
        http_response_code(400);
        echo json_encode([
            'status'=>'400',
            'message'=>'user id required'
        ]);
    }
?>