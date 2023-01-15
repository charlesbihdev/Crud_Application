</head>
<body>
<?php
include 'header.php';
include 'conn.php';
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM user_info WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if($result){
        header("location: dashboard.php");
    }
}

else {
    header("location: dashboard.php");
}

?>

</body>