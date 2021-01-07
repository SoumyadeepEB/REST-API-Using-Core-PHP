<?php 
    $link = mysqli_connect('localhost','root','','exportdata');
    
    if(!$link)
    {
        die("Database not connected");
    }
?>