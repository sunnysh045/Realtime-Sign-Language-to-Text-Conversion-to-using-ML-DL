<?php

if(!isset($_SESSION)){
    session_start();  
}
$adminid = $_SESSION['admin_id'];

?>
<?php include 'C:/xampp/htdocs/sign_recognition/db.php';  ?>
<table class="table table-bordered table-hover">
    <!-- Table Heading -->
    <thead>
        <tr>
            <th>ID</th>
            <th colspan="3">Name</th>
            <th>Email-id</th>
            <th>Signup Date</th>
            <th>Profile</th>  
            <th colspan="3" style="text-align:center;">ACTION</th>  
        </tr>
    </thead>
    <!-- Placeholders -->
    <tbody>
        <?php
                $query = "SELECT * FROM `users`";
                $select_users = mysqli_query($conn,$query);

                $id = 0;
                while($row = mysqli_fetch_array($select_users)){
                        $id++;
                        $user_id = $row['USER_ID'];
                        $user_firstname = $row['FIRST_NAME'];
                        $user_middlename = $row['MIDDLE_NAME'];
                        $user_lastname = $row['LAST_NAME'];
                        $user_email = $row['EMAIL'];
                        $user_signupdate = $row['SIGN_DATE'];
                        $phone_nums = $row['PHONE_NUM'];

                        //Display data from database 
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td colspan='3'>$user_firstname $user_middlename $user_lastname</td>";
                        echo "<td>$user_email</td>";
                        echo "<td>$user_signupdate</td>";
                        echo "<td>$phone_nums</td>";
                        echo "<td><a href='users.php?delete={$user_id}'>BAN</a></td>";
                        echo "</tr>";
                    
                }

            if(isset($_GET['delete'])) {

                $the_user_id = $_GET['delete'];

                $query = "DELETE FROM `users` WHERE `user_id` = '$the_user_id'";
                $delete_user_query = mysqli_query($conn,$query);
                //header("Location: users.php");

                //confirm($delete_user_query);
            }  
        ?>
    </tbody>
</table>
