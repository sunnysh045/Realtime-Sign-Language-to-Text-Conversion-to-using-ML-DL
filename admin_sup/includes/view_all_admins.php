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
            <th>Phone Number</th>
            <th>Registered By</th>
            <th colspan="3" style="text-align:center;">ACTION</th>  
        </tr>
    </thead>
    <!-- Placeholders -->
    <tbody>
        <?php
                $query = "SELECT * FROM `admins`";
                $select_users = mysqli_query($conn,$query);

                $id = 0;
                while($row = mysqli_fetch_array($select_users)){
                        $id++;
                        $user_id = $row['ADMIN_ID'];
                        $user_firstname = $row['FIRST_NAME'];
                        $user_middlename = $row['MIDDLE_NAME'];
                        $user_lastname = $row['LAST_NAME'];
                        $user_email = $row['EMAIL'];
                        $user_signupdate = $row['SIGNUP_DATE'];
                        $phone_num = $row['PHONE_NUM'];

                        $admin_register = mysqli_query($conn,"SELECT FIRST_NAME,LAST_NAME FROM `admins` INNER JOIN `admin_register` ON `admins`.ADMIN_ID = `admin_register`.REG_BY_ID WHERE `ADDED_ID`='$user_id'");
                        if(!$admin_register){
                            die("Query Failed". mysqli_error($conn));
                        }

                        while($row2 = mysqli_fetch_array($admin_register)){
                            $fname = $row2['FIRST_NAME'];
                            $lname = $row2['LAST_NAME'];
                        

                      
                        //Display data from database 
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td colspan='3'>$user_firstname $user_middlename $user_lastname</td>";
                        echo "<td>$user_email</td>";
                        echo "<td>$user_signupdate</td>";
                        echo "<td>$phone_num</td>";
                        echo "<td>$fname $lname</td>";
                        echo "<td><a href='users.php?delete={$user_id}'>Remove Access</a></td>";
                        echo "</tr>";
                    }
                    
                }

            if(isset($_GET['delete'])) {

                $the_user_id = $_GET['delete'];

                $query = "DELETE FROM admins WHERE `admin_id` = '$the_user_id'";
                $delete_user_query = mysqli_query($conn,$query);
                header("Location: users.php");

                //confirm($delete_user_query);
            }  
        ?>
    </tbody>
</table>
