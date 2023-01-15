<?php include 'header.php';
include 'conn.php';
$mess = "";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $image = $_POST['image'];

    $sql = "INSERT INTO user_info (name, email, phone, img_url) VALUES ('$name', '$email', '$phone', '$image')";
    $result = mysqli_query($con, $sql);


    if($result){
        $mess = '<h3 class="text-success text-center"> Registration Successful </h3>';
    }
    else {
        $mess = '<h3 class="text-dandger text-center"> Registration Not successful </h3>';
    
    }
}



?>
<style>
   .btn{
    margin: 8px;
   }

   .form-group, .bttn {
        margin: 20px 250px;
   }
</style>
</head>
<body>
<a href="./dashboard.php"><button type="button" class="btn btn-success">View Dashboard</button></a>
<form method="POST" action="./create.php">
    <h1 class="text-primary text-center m-4" >ADD NEW USER</h1>
<div class="form-group md-3">
    <label for="fullname">Full Name</label>
    <input type="name" class="form-control" id="fullname" aria-describedby="nameHelp" name="name" placeholder="Enter full name">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email">
  </div>
  <div class="form-group ">
    <label for="phone">Phone Number</label>
    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
  </div>

  <div class="form-group ">
    <label for="image">Image Url</label>
    <input type="name" class="form-control" id="image" name="image" placeholder="Enter Image url">
  </div>
  
  <button type="submit" name="submit" class=".px-2 btn bttn btn-primary">Submit</button>

</form>

<?php 
echo $mess;
?>

<body>