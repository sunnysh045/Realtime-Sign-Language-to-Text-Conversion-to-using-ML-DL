
<?php

if(isset($_POST['submit']))
{

    include 'C:/xampp/htdocs/col_social_network/includes/db.php';

    $company = $_POST['company'];
    $position = $_POST['position'];
    $level = $_POST['level'];
    $job_type = $_POST['job_type'];
    $link = $_POST['place_link'];
    $content =  mysqli_escape_string($conn,$_POST['post_content']);
    $added = date('d-m-y');

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_temp,"../images/$image");

    $query = "INSERT INTO `placements_posts` (`company`, `position`, `level`, `job_type`, `place_img`,`place_link`,`description`, `added`) VALUES ('$company', '$position', '$level', '$job_type', '$image','$link','$content', '$added')";
    $insert_query = mysqli_query($conn,$query);
    if(!$insert_query){
        echo "Query Failed" . mysqli_error($conn);
    }

    echo "<p class='bg-success'>Placements Added</p>";


}

?>


<form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="company">Company Name</label>
    <input type="text" class="form-control" name="company" id="company" required>
  </div>

  <div class="form-group">
    <label for="position">Position</label>
    <input type="text" class="form-control" name="position" id="position" required>
  </div>

  <div class="form-group">
    <label for="level">Level of Education</label>
    <input type="text" class="form-control" name="level" id="level" required>
  </div>
  

  <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" id="post_image" name="image" required>
    </div>

  <div class="form-group">
    <label for="link">Placement Link</label>
    <input type="text" name="place_link" id="link" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="job_type">Job Type</label>
    <select name="job_type" class="form-control" required>
        <option value="select">Select Options</option>
        <option value="full time">Full Time</option>
        <option value="internship">Internship</option>
        <option value="remote">Remote</option>
    </select>
  </div>

  <div class="form-group">
    <textarea name="post_content" id="editor" cols="30" rows="10" class="form-control" novalidate></textarea>
  </div>

  <div class="form-group">
    <input type="submit" value="Add Placements" name="submit">
  </div>

</form>