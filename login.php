<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>COLNET LOGIN</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/register_style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
</head>
<body>

<?php
ob_start();
session_start();
$msg = "";
if(isset($_POST['login'])){

	include 'C:/xampp/htdocs/sign_recognition/db.php';  
	$college_email = $_POST['email'];
	$_SESSION['log_email'] = $college_email;
	$password = $_POST['password'];
	$password = md5($password);


	$sql = "SELECT * FROM `users` WHERE `EMAIL`= '$college_email' AND `PASSWORD` = '$password'";
	// $stmt = $conn->prepare($sql);
	// $stmt->bind_param("sss",$college_email,$password,$user_role);
	// $stmt->execute();
	// $result = $stmt->get_result();
	// $row = $result->fetch_assoc();
	$login_query = mysqli_query($conn,$sql);


	while($row=mysqli_fetch_assoc($login_query)){

		$userid = $row['USER_ID'];
		$fname = $row['FIRST_NAME'];
		$lname = $row['LAST_NAME'];
		$email = $row['EMAIL'];
		$pass = $row['PASSWORD'];
		$verification_status = $row['VERIFY_STATUS'];

	}

	$num_rows = mysqli_num_rows($login_query);

	if($num_rows == 1)
	{
		//header("Location: index.php");
		
		if($verification_status == 0)
		{
			$msg = "<p style='color:red;'>You have not confirmed your Email-Id yet. Please check your inbox and verify your email id.</p>";
		}
		else
		{

			$msg = "<p style='color:red;'>Your email is verified successfully</p>";
			session_start();
			$_SESSION['is_login'] = true; //user defined
			$_SESSION['name'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['email'] = $email;
			$_SESSION['user_id'] = $userid;
			header("location: home.php");
							
		}

	}
	
	else{

		$msg = "Email or Password is incorrect!Please try again";
	}


}

?>

<div class="signup-form">
    <form action="login.php" method="post">
		<h2>SIGNRECOG LOGIN</h2>
		<p>Enter credentials to login</p>
        <hr>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Enter your Email-Id" required="required" value="<?php  if(isset($_SESSION['log_email']))  
                echo $_SESSION['log_email'];  ?>">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <div class="text-center">
                <!-- <a href="register1.php" class="btn">NEXT</a> -->
                <input type="submit" name="login" value="LOGIN " class="btn btn-primary btn-lg">
        </div>
        </div>
		<?php  echo  $msg; ?>
    </form>
	<div class="hint-text">Don't have an account? <a href="register.php">Register here</a></div>
</div>