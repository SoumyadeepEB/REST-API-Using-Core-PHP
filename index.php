<?php 
    session_start();
    $url = 'localhost/problems/restapi/api/api-fetch-all.php';
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $results = json_decode(curl_exec($ch));
    curl_close($ch);

    if(isset($_POST['search'])){
        $input = $_POST['input'];
        $search_url = 'localhost/problems/restapi/api/api-search.php';
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$search_url.'?search='.$input);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $results = json_decode(curl_exec($ch));
        curl_close($ch);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Users List</h1>

        <?php if(isset($_SESSION['success'])){ ?>
            <div class="alert alert-success"><?php echo ucfirst($_SESSION['success']); unset($_SESSION['success']); ?></div>
        <?php } ?>
        <?php if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-danger"><?php echo ucfirst($_SESSION['error']); unset($_SESSION['error']); ?></div>
        <?php } ?>

        <div class="float-left">
            <a href="insert.php" class="btn btn-info"><i class='fas fa-plus'> </i>Add Data</a>
        </div>
        <div class="float-right">
            <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="input" placeholder="Search by Name" value="<?= isset($_POST['input']) ? $_POST['input'] : '' ?>">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-secondary btn-sm" name="search"><i class='fas fa-search'></i>Search</button>
                </div>
                <div class="col-md-3">
                    <a href="index.php" class="btn btn-danger btn-sm">Reset</a>
                </div>
            </div>
            </form>
        </div>
        <br><br>
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white text-center">
                <tr> 
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php if($results->status == '200'){ foreach($results->data as $result){ ?>
                <tr>
                    <td width="10%"><?= $result->id ?></td>
                    <td width="50%"><?= $result->name ?></td>
                    <td width="10%"><?= $result->age ?></td>
                    <td>
                        <a href="user.php?id=<?= $result->id ?>" class="text-dark"><i class='fas fa-eye'></i></a>&nbsp;&nbsp;
                        <a href="update.php?id=<?= $result->id ?>" class="text-success"><i class='fas fa-pencil-alt'></i></a>&nbsp;&nbsp;
                        <a href="delete.php?id=<?= $result->id ?>" class="text-danger"><i class='fas fa-trash-alt'></i></a>
                    </td>
                </tr>
                <?php }}else{ ?>
                    <tr><td colspan="4" class="text-center"><?= ucfirst($results->message) ?></td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>