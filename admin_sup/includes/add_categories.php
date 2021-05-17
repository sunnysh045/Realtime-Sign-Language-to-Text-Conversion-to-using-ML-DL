
<?php

if(isset($_POST['create_category'])){

    $category_title = $_POST['title'];
   
    $category_content = mysqli_escape_string($conn,$_POST['category_content']);  //Clean up the content

    $query = "INSERT INTO `categories` (`category_name`,`category_description`) VALUES ('$category_title','$category_content')";
    $create_category_query = mysqli_query($conn,$query);
    //confirm($create_category_query); //functions.php
   
    $the_category_id = mysqli_insert_id($conn); //This pulls out the last created ID.
    echo "<p class='bg-success'>Category Created<a href='../col_forum/index.php'>View Category</a></p>";

}

?>


<form action="forums.php?source=add_categories" method="post" enctype="multipart/form-data">
<?php  //echo(var_dump($_SESSION['email'])); ?>
    <div class="form-group">
        <label for="title">Category Name</label>
        <input type="text" class="form-control" name="title" required>
    </div>

  <div class="form-group">
        <label for="post_content">Category Description</label>
        <textarea name="category_content" id="editor" cols="30" rows="10" class="form-control" required>
            </textarea>
    </div>


  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_category" value="Add Category">
  </div>

</form>