<?php 
    session_start();
    $uid = $_GET['id'];
    $url = 'localhost/problems/restapi/api/api-fetch-single.php';
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url.'?id='.$uid);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php if($result->status == '200'){ ?>
        <h1 class="text-center">User #<?= $result->data->id ?></h1>
        
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td><?= $result->data->name ?></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><?= $result->data->age ?></td>
            </tr>
        </table>
        <?php }else{ echo '<h1>'.ucfirst($result->message).'</h1>'; } ?>
        <a href="index.php" class="btn btn-default">Back</a>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>