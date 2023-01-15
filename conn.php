<?php
     $host = 'sql107.epizy.com';
     $username = 'epiz_33384930';
     $password = 'Z0Us85Sdxgt';
     $db = '384930_User_Data';

     $con = mysqli_connect($host, $username, $password, $db);

    if(mysqli_connect_errno()){
        echo "Failed to Connect". mysqli_connect_error();
        exit();
    }

?>