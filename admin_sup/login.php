<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>SIGNRECOG ADMIN LOGIN</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/register_style.css">
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
    
	$sql = "SELECT * FROM `admins` WHERE `EMAIL`='$college_email' AND `PASSWORD`='$password'";
	$login_query = mysqli_query($conn,$sql);


	while($row=mysqli_fetch_assoc($login_query)){

		$admin_id = $row['ADMIN_ID'];
		$fname = $row['FIRST_NAME'];
		$email = $row['EMAIL'];
		$pass = $row['PASSWORD'];

		$colnet_user = mysqli_query($conn,"SELECT * FROM `users`");
		while($row2 = mysqli_fetch_array($colnet_user)){

			$user_id = $row['USER_ID'];
			$user_first_name = $row['FIRST_NAME'];
			$user_last_name = $row['LAST_NAME'];
		}
	}

	$num_rows = mysqli_num_rows($login_query);

	if($num_rows == 1)
	{
		//$msg = "<p style='color:red;'>Your email is verified successfully</p>";
		session_start();
		$_SESSION['is_login'] = true; //user defined
		$_SESSION['name'] = $fname;
		$_SESSION['email'] = $email;
		$_SESSION['admin_id'] = $admin_id;
		$_SESSION['user_id'] = $user_id;
		$_SESSION['fname'] = $user_first_name;
		$_SESSION['lname'] = $user_last_name;

		header("location: index.php");

	}
	
	else{

		$msg = "Email or Password is incorrect!";
	}

}

?>


<div class="signup-form">
    <form action="login.php" method="post">
		<h2 style="text-align: center;">SIGNRECOG ADMIN LOGIN</h2>
		<p>Enter credentials to login</p>
        <hr>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Enter your College Email" required="required" value="<?php  if(isset($_SESSION['log_email']))  
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
	<!-- <div class="hint-text">Don't have an account? <a href="register.php">Register here</a></div> -->
</div>
<?php  //include 'C:/xampp/htdocs/col_social_network/includes/footer.php'  ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>