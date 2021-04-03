<?php 
    include "config.php";
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if((isset($_GET['id']) && !empty($_GET['id'])) && (isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['age']) && !empty($_POST['age'])) && is_numeric($_POST['age'])){
            $id = $_GET['id'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $sql = "UPDATE users SET name='$name',age='$age' WHERE id='$id'";

            if($conn->exec($sql)){
                http_response_code(202);
                echo json_encode([
                    'status'=>'202',
                    'message'=>'one record updated successfully'
                ]);
            }else{
                http_response_code(422);
                echo json_encode([
                    'status'=>'422',
                    'message'=>'record updation failed'
                ]);
            }
        }else if((empty($_POST['name'])) || (empty($_POST['age']))){
            http_response_code(400);
            echo json_encode([
                'status'=>'400',
                'message'=>'all fields are required'
            ]);
        }else if(!empty($_POST['name']) && !empty($_POST['age']) && !is_numeric($_POST['age'])){
            http_response_code(400);
            echo json_encode([
                'status'=>'400',
                'message'=>'age must be numaric'
            ]);
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