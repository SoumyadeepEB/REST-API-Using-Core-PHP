<?php 
    include "config.php";
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $user_id = $_GET['id'];
            $sql = "DELETE FROM users WHERE id='$user_id'";

            if($conn->exec($sql)){
                http_response_code(200);
                echo json_encode([
                    'status'=>'200',
                    'message'=>'one record deleted successfully'
                ]);
            }else{
                http_response_code(422);
                echo json_encode([
                    'status'=>'422',
                    'message'=>'record deletion failed'
                ]);
            }
        }else{
            http_response_code(400);
            echo json_encode([
                'status'=>'400',
                'message'=>'user id is empty'
            ]);
        }
    }else{
        http_response_code(405);
        echo json_encode([
            'status'=>'405',
            'message'=>'method not allowed'
        ]);
    }
?>