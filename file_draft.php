<form method="POST" enctype="multipart/form-data">
  <div class="form-group ">
    <label for="image">Image Url</label>

    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image url">
    <br>
    <input type="submit" class="form-control" id="image" name="submit" value="submit">
</div>
</form>

  <?php
    if(isset($_POST['submit'])) {
      $targetpath = 'images/';
      $filename = $_FILES['image']['name'];
      


      if(!empty($_FILES['image']['name'])){
        //echo "success";
        $path = $targetpath.basename($filename);
      if (move_uploaded_file($_FILES['image']['tmp_name'], $path)){
        echo "uploaded succesful";
        echo $path;
      };

      }
      else{
        echo "cannot upload an empty file";
      }
      //move_uploaded_file(filename, path) 
      
     //print_r($_FILES);




    }
    

  ?>