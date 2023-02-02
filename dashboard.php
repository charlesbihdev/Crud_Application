<?php include 'header.php';
include 'conn.php';

//get all detail from database
$sql = "SELECT * FROM user_info";
$result = mysqli_query($con, $sql);
$r = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<style>
   .btn{
    margin: 8px;
   }
</style>
</head>
<body>
  <h1 class="text-center text-success my-6">School Database</h1>
<a href="./create.php"><button type="button" class="btn btn-success">Create User</button></a>
<div class="table-responsive-lg">
<table class="table table-striped table-primary ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Full Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email Address</th>
      <th scope="col">passport Picture</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    

    <?php foreach ($r as $items){ ?>

<tr>
<th scope="row"><?php echo $items['id'] ?></th>
<td><?php echo $items['name'] ?></td>
<td><?php echo $items['phone'] ?></td>
<td><?php echo $items['email'] ?></td>
<td><img src="./images/<?php echo $items['img_url'] ?>" height="130px" width="130px"></td>
<td>
<a href="./delete.php?id=<?php echo $items['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
<a href="./edit.php?id=<?php echo $items['id'] ?>"><button type="button" class="btn btn-primary">Edit</button></a>
</td>
</tr>

  <?php } ?>

  </tbody>
</table>
</div>


</body>
</html>