<?php 
    session_start();
    $uid = $_GET['id'];
    $url = 'localhost/problems/restapi/api/api-fetch-single.php';
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url.'?id='.$uid);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $fetch = json_decode(curl_exec($ch));
    curl_close($ch);

    if(isset($_POST['submit'])){
        $data = [
            'name'=>$_POST['uname'],
            'age'=>$_POST['uage']
        ];
        $str = '';
        foreach($data as $k=>$v){
            $str .= $k.'='.$v.'&';
        }
        rtrim($str,'&');

        $update_url = 'localhost/problems/restapi/api/api-update.php';
        $update = curl_init();
        curl_setopt($update,CURLOPT_URL,$update_url.'?id='.$uid);
        curl_setopt($update,CURLOPT_POST,count($data));
        curl_setopt($update,CURLOPT_POSTFIELDS,$str);
        curl_setopt($update,CURLOPT_RETURNTRANSFER,true);
        $result = json_decode(curl_exec($update));

        if($result->status == '202'){
            header('location:index.php');
            $_SESSION['success'] = $result->message;
        }else{
            $_SESSION['error'] = $result->message;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php if($fetch->status != '404'){ ?>
        <h1 class="text-center">Add New User</h1>

        <?php if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-danger"><?= ucfirst($_SESSION['error']); unset($_SESSION['error']); ?></div>
        <?php } ?>

        <form action="" method="post">
            <label><strong>Name</strong></label>
            <input type="text" class="form-control" name="uname" placeholder="Enter User Name" value="<?= isset($fetch->data->name) ? $fetch->data->name : '' ?>">
            <label><strong>Age</strong></label>
            <input type="text" class="form-control" name="uage" placeholder="Enter User Age" value="<?= isset($fetch->data->age) ? $fetch->data->age : '' ?>">
            <br>
            <button type="submit" class="btn btn-success" name="submit">Modify</button>
            <a href="index.php" class="btn btn-default">Back</a>
        </form>
        <?php }else{ echo '<h1>'.ucfirst($result->message).'</h1><a href="index.php" class="btn btn-default">Back</a>'; } ?> 
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>