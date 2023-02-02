<style>
  .btn{
    margin: 8px;
   }

   .form-group, .bttn {
        margin: 20px 3rem;
   }
</style>
</head>
<?php include 'header.php';
include 'conn.php';

if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM user_info WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $r = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //print_r($r);
}
else {
    header("location: dashboard.php");
}


?>

<body>
<a href="./dashboard.php"><button type="button" class="btn btn-success">View Dashboard</button></a>
<form method="POST" action="" enctype="multipart/form-data">
    <h1 class="text-primary text-center m-4" >EDIT USER DETAILS</h1>

    <?php
    foreach($r as $item) { 
      $prev_img = $item['img_url'];
      ?>
<div class="form-group md-3">
    <label for="fullname">Full Name</label>
    <input type="name" class="form-control" value="<?php echo $item['name']; ?>" id="fullname" aria-describedby="nameHelp" name="name" placeholder="Enter full name">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" value="<?php echo $item['email'];  ?>" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email">
  </div>
  <div class="form-group ">
    <label for="phone">Phone Number</label>
    <input type="number" class="form-control" value="<?php echo $item['phone']; ?>" id="phone" name="phone" placeholder="Enter Phone Number">
  </div>

  <div class="form-group ">
    <label for="image">New Image</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image url">
  </div>
  <?php } ?>
  
  <button type="submit" name="submit" class=".px-2 btn bttn btn-primary">Update Data</button>

  <?php
  if (isset($_GET['status'])){
    echo '<h3 class="text-success text-center"> User Details Edited Successfully</h3>';
 }
  

  if(isset($_POST['submit'])){

    $uploadfile =  $_FILES['image']['name'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email']; 
    

    if ($uploadfile == '') {
      $image = $prev_img;
      //echo 'no upload';
    }
    else {
       $image = $uploadfile;
       $targetfolder = "images/";
       $uploadfile =  $_FILES['image']['name'];
       $filename = $targetfolder.basename($uploadfile);
      move_uploaded_file($_FILES['image']['tmp_name'], $filename);
    }
    
    

    if($name != '' && $phone != '' && $email != '' ){
   

      $query = "UPDATE user_info SET name='$name', phone='$phone', email='$email', img_url='$image' WHERE id=$id";
      $results = mysqli_query($con, $query);
      if($results){
        
        header("location: edit.php?id=$id&status=submitted");
    }
    else if(!$results) {
      echo '<h3 class="text-success text-danger"> Couldnt Edit User Details </h3>';
  }
  }   
    }
    
  ?>

</form>
<body>