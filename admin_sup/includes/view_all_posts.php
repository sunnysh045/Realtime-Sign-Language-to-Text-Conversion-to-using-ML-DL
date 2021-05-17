<!-- This is included in posts.php and admin_navigation link -->
<?php
//$user_id = $_SESSION['user_id'];
?>
<?php  include 'C:/xampp/htdocs/col_social_network/includes/db.php'; ?>

<form action="" method="post">
<table class="table table-bordered table-hover">

    <!-- <div id="bulkOptionsCOntainer" class="col-xs-4">
        <select name="bulk_options" id="" class="form-control">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
        </select>
    </div> -->
    <!-- <div class="col-xs-4">
        <input type="submit" value="Apply" class="btn btn-success">
        <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
    </div> -->

    <!-- Table Heading -->
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>ID</th>
            <th>Title</th>
            <th>Date</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Post Comments Count</th>
            <th>Status</th>
            <th>VIEW POST</th>
            <th>ACTION</th>
            <!-- <th>Post Views</th> -->
        </tr>
    </thead>
    <!-- Placeholders -->
    <tbody>
        <?php
                $id = $_GET['user_id']; //Sent from admin_navigation.php
                $query = "SELECT * FROM `posts` WHERE `USER_ID`='$id'";
                $select_posts = mysqli_query($conn,$query);

                $id = 0;
                while($row = mysqli_fetch_array($select_posts)){
                        $id++;
                        $post_id = $row['POST_ID'];
                        $post_title = $row['POST_TITLE'];
                        $post_status = $row['POST_STATUS'];
                        $post_image = $row['POST_IMAGE'];
                        $post_tags = $row['POST_TAGS'];
                        $post_comment_counts = $row['POST_COMMENT_COUNTS'];
                        $post_date = $row['POST_DATE'];
                        // $post_views_count = $row['post_views_count'];

                        //Display data from database 
                        echo "<tr>";
                        ?>
                            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                        <?php
                        echo "<td>$post_id</td>";
                        echo "<td>$post_title</td>";
                        echo "<td>$post_date</td>";
                        echo "<td><img width='100' src='../images/$post_image' alt='post_image'></td>";
                        echo "<td>$post_tags</td>";
                        echo "<td>$post_comment_counts</td>";
                        echo "<td>$post_status</td>";
                        
                         
                         echo "<td><a href='../post.php?p_id={$post_id}'>VIEW POST</a></td>"; //Send it to post.php
                         echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='posts.php?delete={$post_id}'>BAN POST</a></td>";
                         //echo "<td>$post_views_count</td>";
                         echo "</tr>";

                    
                }

        ?>
        
        <?php

            if(isset($_GET['delete'])) {

                $the_post_id = $_GET['delete'];

                $query = "DELETE FROM posts WHERE post_id =' $the_post_id'";
                $delete_query = mysqli_query($conn,$query);

                confirm($delete_query);
                header("Location: posts.php");
            }  




        ?>


    </tbody>
</table>
</form>
