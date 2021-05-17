<?php
$msg="";
$error_array = array();
if(isset($_POST['submit'])){
    
    include 'C:/xampp/htdocs/sign_recognition/db.php';  

    $_SESSION['is_register'] = true;
    
    $fname = strip_tags(mysqli_real_escape_string($conn,$_POST['fname'])); //Retrieve form values. //Remove HTML Tags
    $fname = str_replace(' ','',$fname); //Space is replaced with nothing
    $fname = ucfirst(strtolower($fname)); //Capitalize first letter.
    $_SESSION['reg_fname'] = $fname; //Stores first name into the session
    
    
    $mname = strip_tags(mysqli_real_escape_string($conn,$_POST['mname'])); //Retrieve form values. //Remove HTML Tags
    $mname = str_replace(' ','',$mname); //Space is replaced with nothing
    $mname = ucfirst(strtolower($mname)); //Capitalize first letter.
    $_SESSION['reg_mname'] = $mname; //Stores first name into the session

    $lname = strip_tags(mysqli_real_escape_string($conn,$_POST['lname'])); //Retrieve form values. //Remove HTML Tags
    $lname = str_replace(' ','',$lname); //Space is replaced with nothing
    $lname = ucfirst(strtolower($lname)); //Capitalize first letter.
    $_SESSION['reg_lname'] = $lname; //Stores first name into the session.

    $college_email = strip_tags(mysqli_real_escape_string($conn,$_POST['email']));
    $_SESSION['reg_email'] = $college_email;

    $password = strip_tags(mysqli_real_escape_string($conn,$_POST['password']));
    $_SESSION['reg_pass'] = $password;
    
    $c_password = strip_tags(mysqli_real_escape_string($conn,$_POST['conf_password']));
    $_SESSION['reg_cpass'] = $c_password;

    // $admin_role = strip_tags(mysqli_real_escape_string($conn,$_POST['admin_role']));
    // $_SESSION['reg_role'] = $admin_role;

    $phone_num = strip_tags(mysqli_real_escape_string($conn,$_POST['phone']));
    $_SESSION['reg_phone'] = $phone_num;

    //Date
    $signup_date = date("Y-m-d"); //Current date

    if(strlen($fname) > 25 || strlen($fname) < 2)
    {
        array_push($error_array,"Your First Name must be between 2 and 25 characters <br>");
    }

    if(strlen($mname) > 25 || strlen($mname) < 2)
    {
        array_push($error_array,"Your Middle Name must be between 2 and 25 characters <br>");
    }

    if(strlen($lname) > 25 || strlen($lname) < 2)
    {
        array_push($error_array,"Your Last Name must be between 2 and 25 characters <br>");
    }


    if(preg_match("/^[a-z][a-zA-Z0-9$]+(@gmail.com)/ix",$college_email)){

        $sql = "SELECT `EMAIL` FROM `admins` WHERE `EMAIL` = '$college_email'";
        $e_check = mysqli_query($conn,$sql);

        $num_rows = mysqli_num_rows($e_check);

        if($num_rows > 0)
        {
            array_push($error_array, "Email already in use <br>");
        }

   }
   else{
      array_push($error_array, "Invalid Format!<br>");
   }

//Password validation
   if($password != $c_password)
   {
       array_push($error_array, "Password don't match <br>");
   }
   else{

       if(preg_match('/[^A-Za-z0-9@#]/',$password)) //validate password
       {
           array_push($error_array,"Your password can only contain english characters or numbers <br>");
       }
   }

    if(strlen($password > 30 || strlen($password) < 5)){
        array_push($error_array,"Your password must be between 5 and 30 characters <br>");
    }


    if(empty($error_array)){

        $password = md5($password); //encrypts the password before sending to database.

        $query = "INSERT INTO `admins`(`FIRST_NAME`,`MIDDLE_NAME`,`LAST_NAME`,`EMAIL`,`PASSWORD`,`SIGNUP_DATE`,`PHONE_NUM`) VALUES ('$fname','$mname','$lname','$college_email','$password','$signup_date','$phone_num')";
        $register_query = mysqli_query($conn,$query);
        if($register_query){
            
            $msg = 'Admin registered successfully';

            $view_admin = mysqli_query($conn,"SELECT `ADMIN_ID` FROM `admins` WHERE `EMAIL` = '$college_email'");
            if(!$view_admin){
                die("Query Failed" . mysqli_error($conn));
            }
            while($row = mysqli_fetch_array($view_admin)){

                $added_id = $row['ADMIN_ID'];

                $admin_register = mysqli_query($conn,"INSERT INTO `admin_register` (`ADDED_ID`,`REG_BY_ID`) VALUES ('$added_id','$adminid')");

            }

        }
        else{
            die("Query Failed" . mysqli_error($conn));
        }
    }


}

?>