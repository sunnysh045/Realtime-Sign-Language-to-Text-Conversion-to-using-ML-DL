<?php

if(isset($_GET['cat_id'])){

    $the_cat_id = $_GET['cat_id'];
}

include 'C:/xampp/htdocs/col_social_network/includes/db.php';
$query = "SELECT * FROM `categories` WHERE `category_id` = '$the_cat_id'";
$select_category_by_id = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($select_category_by_id)){
            
    $category_id = $row['category_id'];
    $category_name = $row['category_name'];
    $category_desc = $row['category_description'];
    $created = $row['created'];
}


if(isset($_POST['create_category'])){

   
    $category_title = $_POST['title'];
   
    $category_content = mysqli_escape_string($conn,$_POST['category_content']);  //Clean up the content

    $update_query = "UPDATE `categories` SET `category_name` = '$category_title',`category_description` = '$category_desc' WHERE `category_id` = '$the_cat_id'";
    $update_category1 = mysqli_query($conn,$update_query);
    //confirm($update_post);

    if(!$update_category1){
      die("Query Failed" . mysqli_error($conn));
    }
    else{
      // .. get out of directory twice
      echo "<p class='bg-success'>Category Updated. <a href='../col_forum/index.php'>View Category</a> or <a href='forums.php'>Edit More categories</a></p>";
    }

}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php  //echo(var_dump($_SESSION['email'])); ?>
    <div class="form-group">
        <label for="title">Category Name</label>
        <input type="text" class="form-control" name="title" value="<?php  echo $category_name;  ?>" required>
    </div>

  <div class="form-group">
        <label for="post_content">Category Description</label>
        <textarea name="category_content" id="editor" cols="30" rows="10" class="form-control" value="<?php  echo $category_desc;  ?>" required>
            </textarea>
    </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_category" value="Update Category">
  </div>

</form>