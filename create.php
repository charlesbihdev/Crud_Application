<?php include 'header.php';
include 'conn.php';
$mess = "";

if(isset($_POST['submit'])){
  $uploadfile =  $_FILES['image']['name'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $img = $uploadfile;
    


   


    if($name != '' && $phone != '' && $email != '' && $_FILES['image']['name'] != ''){
        $targetfolder = "images/";
        $uploadfile =  $_FILES['image']['name'];
        $filename = $targetfolder.basename($uploadfile);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $filename)){
          $sql = "INSERT INTO user_info (name, email, phone, img_url) VALUES ('$name', '$email', '$phone', '$img')";
          $result = mysqli_query($con, $sql);

        $mess = '<h3 class="text-success text-center"> Registration Successful </h3>';
    }
    }
    elseif(empty($_FILES['image']['name'])){
      $mess = '<h3 class="text-dandger text-center"> Image cannot be empty </h3>';
    }
    else {
        $mess = '<h3 class="text-dandger text-center"> Please fill all required </h3>';
    
    }
}



?>
<style>
   .btn{
    margin: 8px;
   }

   .form-group, .bttn {
        margin: 20px 3rem;
   }
</style>
</head>
<body>
<a href="./dashboard.php"><button type="button" class="btn btn-success">View Dashboard</button></a>
<form method="POST" action="./create.php" enctype="multipart/form-data">
    <h1 class="text-primary text-center m-4" >ADD NEW USER</h1>
<div class="form-group md-3">
    <label for="fullname">Full Name</label>
    <input type="name" class="form-control" value="form-control" id="fullname" aria-describedby="nameHelp" name="name" placeholder="Enter full name">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email">
  </div>
  <div class="form-group ">
    <label for="phone">Phone Number</label>
    <input type="number" class="form-control" value="03456789" id="phone" name="phone" placeholder="Enter Phone Number">
  </div>

  <div class="form-group ">
    <label for="image">Insert Image</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image url">
  </div>
  
  <button type="submit" name="submit" class=".px-2 btn bttn btn-primary">Submit</button>

</form>

<?php 
echo $mess;
?>

<body>