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
<a href="./create.php"><button type="button" class="btn btn-success">Create User</button></a>
<table class="table table-striped table-primary">
  <thead>
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
<td><?php echo $items['img_url'] ?></td>
<td>
<a href="./delete.php?id=<?php echo $items['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
<a href="./edit.php?id=<?php echo $items['id'] ?>"><button type="button" class="btn btn-primary">Edit</button></a>
</td>
</tr>

  <?php } ?>

  </tbody>
</table>

</body>
</html>