<?php 
    session_start();
    $uid = $_GET['id'];
    $url = 'localhost/problems/restapi/api/api-delete.php';
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url.'?id='.$uid);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'DELETE');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    if($result->status == '200'){
        $_SESSION['success'] = $result->message;
    }else{
        $_SESSION['error'] = $result->message;
    }
    header('location:index.php');
?>