<?php 
    include "config.php";
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search_item = $_GET['search'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE name LIKE '%$search_item%'");
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
    }else{
        http_response_code(400);
        echo json_encode([
            'status'=>'400',
            'message'=>'search element required'
        ]);
    }
?>