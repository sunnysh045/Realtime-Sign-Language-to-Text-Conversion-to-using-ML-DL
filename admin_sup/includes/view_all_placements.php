<!-- This is included in posts.php and admin_navigation link -->
<?php
//$user_id = $_SESSION['user_id'];
?>
<?php  include 'C:/xampp/htdocs/col_social_network/includes/db.php'; ?>

<form action="" method="post">
<table class="table table-bordered table-hover">


    <!-- Table Heading -->
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>ID</th>
            <th>Company</th>
            <th>Position</th>
            <th>Level</th>
            <th>Job Type</th>
            <th>Placement Image</th>
            <th>Description</th>
            <th>Added</th>
            <th colspan="2" style="text-align:center;">ACTION</th>
            <!-- <th>Post Views</th> -->
        </tr>
    </thead>
    <!-- Placeholders -->
    <tbody>
        <?php
                //$id = $_GET['user_id']; //Sent from admin_navigation.php
                $query = "SELECT * FROM `placements_posts`";
                $select_posts = mysqli_query($conn,$query);

                $id = 0;
                while($row = mysqli_fetch_array($select_posts)){
                        $id++;
                        $place_id = $row['place_id'];
                        $company = $row['company'];
                        $position = $row['position'];
                        $level = $row['level'];
                        $job_type = $row['job_type'];
                        $place_img = $row['place_img'];
                        $description = $row['description'];
                        $post_date = $row['added'];
                        // $post_views_count = $row['post_views_count'];

                        //Display data from database 
                        echo "<tr>";
                        ?>
                            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                        <?php
                        echo "<td>$place_id</td>";
                        echo "<td>$company</td>";
                        echo "<td>$position</td>";
                        echo "<td>$level</td>";
                        echo "<td>$job_type</td>";
                        echo "<td><img width='100' src='../images/$place_img' alt='post_image'></td>";
                        echo "<td> $description </td>";
                        echo "<td>$post_date</td>";
                        
                         
                         echo "<td><a href='../post.php?p_id={$place_id}'>Edit</a></td>"; //Send it to post.php
                         echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='placements.php?delete={$place_id}'>Delete</a></td>";
                         echo "</tr>";

                    
                }

        ?>
        
        <?php

            if(isset($_GET['delete'])) {

                $the_post_id = $_GET['delete'];

                $query = "DELETE FROM `placments_posts` WHERE `place_id` =' $the_post_id'";
                $delete_query = mysqli_query($conn,$query);
                header("Location: placements.php");
            }  




        ?>


    </tbody>
</table>
</form>
