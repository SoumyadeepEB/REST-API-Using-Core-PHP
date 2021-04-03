<?php 
    session_start();
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

        $insert_url = 'localhost/problems/restapi/api/api-insert.php';
        $insert = curl_init();
        curl_setopt($insert,CURLOPT_URL,$insert_url);
        curl_setopt($insert,CURLOPT_POST,count($data));
        curl_setopt($insert,CURLOPT_POSTFIELDS,$str);
        curl_setopt($insert,CURLOPT_RETURNTRANSFER,true);
        $result = json_decode(curl_exec($insert));

        if($result->status == '201'){
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
        <h1 class="text-center">Add New User</h1>

        <?php if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-danger"><?= ucfirst($_SESSION['error']); unset($_SESSION['error']); ?></div>
        <?php } ?>

        <form action="" method="post">
            <label><strong>Name</strong></label>
            <input type="text" class="form-control" name="uname" placeholder="Enter User Name" value="<?= isset($_POST['uname']) ? $_POST['uname'] : '' ?>">
            <label><strong>Age</strong></label>
            <input type="text" class="form-control" name="uage" placeholder="Enter User Age" value="<?= isset($_POST['uage']) ? $_POST['uage'] : '' ?>">
            <br>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
            <a href="index.php" class="btn btn-default">Back</a>
        </form>  
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>