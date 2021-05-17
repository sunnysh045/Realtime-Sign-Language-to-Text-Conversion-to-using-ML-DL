
<?php include 'register_handler.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>SIGNRECOG SIGNUP</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/register_style.css"> <!-- register style sheet -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
</head>
<body>


<div class="signup-form">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="post" style='width:28em;  '>
		<h2>SIGNRECOG SIGNUP</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control alldivspos" name="first_name" placeholder="First Name" required="required" value="<?php  if(isset($_SESSION['reg_fname']))  
                echo $_SESSION['reg_fname'];  ?>"></div>
                <?php if(in_array("Your First Name must be between 2 and 25 characters <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your First Name must be between 2 and 25 characters*<br></div>"; 
                    else if(in_array("Your First Name should not contain any Spaces. <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your First Name hould not contain any Spaces*<br></div>"; 
                ?>
			</div>        	
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="middle_name" placeholder="Middle Name" required="required" value="<?php  if(isset($_SESSION['reg_mname']))  
                echo $_SESSION['reg_mname'];  ?>"></div>
			</div>   
            <?php if(in_array("Your Middle Name must be between 2 and 25 characters <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your Middle Name must be between 2 and 25 characters*<br></div>"; ?>     	
        </div>
        <div class="form-group">
			<div class="row">
                <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required" value="<?php if(isset($_SESSION['reg_lname']))  
                echo $_SESSION['reg_lname']; ?>"></div>
			</div>   
            <?php if(in_array("Your Last Name must be between 2 and 25 characters <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your Last Name must be between 2 and 25 characters.*<br></div>"; ?>     	
        </div> 
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Enter your Email-Id" required="required" value="<?php if(isset($_SESSION['reg_email']))  
            echo $_SESSION['reg_email'];  ?>">
                <?php   
                    //in_array() is case-sensitive
                        if(in_array("Email already in use <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Email already in use*<br></div>";
                        else if(in_array("Invalid Format!<br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Invalid Format!*<br></div>";
                ?>
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="phone" placeholder="Enter your phone number" pattern="\d*" maxlength="10" required="required" value="<?php  if(isset($_SESSION['reg_phone']))  
               echo $_SESSION['reg_phone']; ?>">
                <?php
                    if(in_array("Phone Number should consist of only 10 digits <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Phone Number should consist of only 10 digits*<br></div>";
                ?>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>    
        <?php   
            if(in_array("Password don't match <br>",$error_array)) echo "<div class='passdiv' style='text-align:center;position:relative;bottom:1em;color:red;'>*Password don't match*<br></div>";
            else if(in_array("Your password can only contain english characters or numbers <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your password can only contain english characters or numbers*<br></div>";
            else if(in_array("Your password must be between 5 and 30 characters <br>",$error_array)) echo "<div style='text-align:center;color:red;'>*Your password must be between 5 and 30 characters*<br></div>";
        ?>    
        <!-- 		    
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div> -->
        
		<div class="form-group">
            <div class="text-center">
                <!-- <a href="register1.php" class="btn">NEXT</a> -->
                <input type="submit" name="submit" value="SIGN UP" class="btn btn-primary btn-lg">
        </div>
        </div>
        <br>
         <?php  echo $msg; ?>
    </form>
	<div class="hint-text">Already have an account? <a href="login.php">Login here</a></div>
</div>
</body>
</html>