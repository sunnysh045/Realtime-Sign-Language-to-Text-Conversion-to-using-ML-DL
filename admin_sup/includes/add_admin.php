<?php

$adminid = $_SESSION['admin_id'];

//security purposes
// if(!isset($_SESSION['is_login']) || $_SESSION['is_login']!= true)
// {
//     header("location: login.php"); 
//     exit;
// }
?>
<?php include 'C:/xampp/htdocs/sign_recognition/admin_sup/includes/admin_reg_handler.php';  ?>
<?php  include('C:/xampp/htdocs/sign_recognition/admin_sup/includes/admin_header.php'); ?>
<?php  echo "<p class='bg-success' style='font-size: 18px;font-weight: bold;'>{$msg}</p>";  ?>
<div class="container-fluid form-container">
<h3 style="text-align:center;">ADMIN REGISTRATION</h3>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?source=add_admin" method="post">
        
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" aria-describedby="emailHelp" value="<?php  if(isset($_SESSION['reg_fname']))  
            echo $_SESSION['reg_fname'];  ?>">
        
        <?php if(in_array("Your First Name must be between 2 and 25 characters <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your First Name must be between 2 and 25 characters*<br></div>"; ?>

        </div>

        <div class="form-group">
            <label for="mname">Middle Name</label>
            <input type="text" class="form-control" name="mname" id="mname" aria-describedby="emailHelp" value="<?php  if(isset($_SESSION['reg_mname']))  
            echo $_SESSION['reg_mname'];  ?>">

            <?php if(in_array("Your Middle Name must be between 2 and 25 characters <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your Middle Name must be between 2 and 25 characters*<br></div>"; ?>     	
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" value="<?php if(isset($_SESSION['reg_lname']))  
            echo $_SESSION['reg_lname']; ?>">
            
            <?php if(in_array("Your Last Name must be between 2 and 25 characters <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your Last Name must be between 2 and 25 characters.*<br></div>"; ?>     	

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp"
                value="<?php if(isset($_SESSION['reg_email']))  
            echo $_SESSION['reg_email'];  ?>">
            <?php   
                    //in_array() is case-sensitive
                if(in_array("Email already in use <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Email already in use*<br></div>";
                else if(in_array("Invalid Format!<br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Invalid Format!*<br></div>";
            ?>
        </div>
        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" class="form-control" name="phone" pattern="\d*"
                maxlength="10" required="required" value="<?php  if(isset($_SESSION['reg_phone']))  
                echo $_SESSION['reg_phone']; ?>">
            <?php
                if(in_array("Phone Number should consist of only 10 digits <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Phone Number should consist of only 10 digits*<br></div>";
            ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="conf_password">Confirm Password</label>
            <input type="password" class="form-control" name="conf_password" id="conf_password">
        </div>
        <?php   
            if(in_array("Password don't match <br>",$error_array)) echo "<div class='passdiv' style='text-align:center;position:relative;bottom:1em;color:red;'>*Password don't match*<br></div>";
            else if(in_array("Your password can only contain english characters or numbers <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your password can only contain english characters or numbers*<br></div>";
            else if(in_array("Your password must be between 5 and 30 characters <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your password must be between 5 and 30 characters*<br></div>";
        ?>   
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Agree to Terms & Conditions</label>
        </div>
        <div class="form-group">
           <button  class="btn waves-effect waves-light red" type="reset" value="Reset" > Reset </button>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="submit">Register Admin</button>
        </div>
</div>
</form>

<?php  include('C:/xampp/htdocs/sign_recognition/admin_sup/includes/admin_footer.php'); ?>