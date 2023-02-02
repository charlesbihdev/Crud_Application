<?php
     $host = 'localhost';
     $username = 'root';
     $password = '';
     $db = 'crud_app';

     $con = mysqli_connect($host, $username, $password, $db);

    if(mysqli_connect_errno()){
        echo "Failed to Connect". mysqli_connect_error();
        exit();
    }

?>