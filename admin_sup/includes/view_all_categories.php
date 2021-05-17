<?php

if(!isset($_SESSION)){
    session_start();  
}
$adminid = $_SESSION['admin_id'];

?>
<?php include 'C:/xampp/htdocs/col_social_network/includes/db.php';  ?>
<table class="table table-bordered table-hover">
    <!-- Table Heading -->
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Created</th>
            <th colspan="3" style="text-align:center;">ACTION</th>  
        </tr>
    </thead>
    <!-- Placeholders -->
    <tbody>
        <?php
                $query = "SELECT * FROM `categories`";
                $select_categories = mysqli_query($conn,$query);

                $id = 0;
                while($row = mysqli_fetch_array($select_categories)){
                        $id++;
                        $category_id = $row['category_id'];
                        $category_name = $row['category_name'];
                        $category_desc = $row['category_description'];
                        $created = $row['created'];

            
                        //Display data from database 
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$category_name</td>";
                        echo "<td>$category_desc</td>";
                        echo "<td>$created</td>";
                        echo "<td><a href='forums.php?source=edit_categories&cat_id={$category_id}'>EDIT</a></td>";
                        echo "<td><a href='forums.php?delete={$category_id}'>DELETE</a></td>";
                        echo "</tr>";
                    
                }

            if(isset($_GET['delete'])) {

                $the_category_id = $_GET['delete'];

                $query = "DELETE FROM `categories` WHERE `category_id` = '$the_category_id'";
                $delete_category_query = mysqli_query($conn,$query);
                header("Location: forums.php");
                //confirm($delete_user_query);
            }  
        ?>
    </tbody>
</table>
