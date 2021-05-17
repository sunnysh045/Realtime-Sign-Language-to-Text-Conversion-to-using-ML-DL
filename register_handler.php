<?php
session_start();
$msg="";
$error_array = array();
if(isset($_POST['submit'])){

    include 'C:/xampp/htdocs/sign_recognition/db.php';  
   
    $_SESSION['is_register'] = true;
            
    $fname = strip_tags(mysqli_real_escape_string($conn,$_POST['first_name'])); //Retrieve form values. //Remove HTML Tags
    $fname = str_replace(' ','',$fname); //Space is replaced with nothing
    $fname = ucfirst(strtolower($fname)); //Capitalize first letter.
    $_SESSION['reg_fname'] = $fname; //Stores first name into the session
    
    
    $mname = strip_tags(mysqli_real_escape_string($conn,$_POST['middle_name'])); //Retrieve form values. //Remove HTML Tags
    $mname = str_replace(' ','',$mname); //Space is replaced with nothing
    $mname = ucfirst(strtolower($mname)); //Capitalize first letter.
    $_SESSION['reg_mname'] = $mname; //Stores first name into the session

    $lname = strip_tags(mysqli_real_escape_string($conn,$_POST['last_name'])); //Retrieve form values. //Remove HTML Tags
    $lname = str_replace(' ','',$lname); //Space is replaced with nothing
    $lname = ucfirst(strtolower($lname)); //Capitalize first letter.
    $_SESSION['reg_lname'] = $lname; //Stores first name into the session.

    $college_email = strip_tags(mysqli_real_escape_string($conn,$_POST['email']));
    $_SESSION['reg_email'] = $college_email;
   
    $password = strip_tags(mysqli_real_escape_string($conn,$_POST['password']));
    $_SESSION['reg_pass'] = $password;
    
    $c_password = strip_tags(mysqli_real_escape_string($conn,$_POST['confirm_password']));
    $_SESSION['reg_cpass'] = $c_password;

    $phone_num = strip_tags(mysqli_real_escape_string($conn,$_POST['phone']));
    $_SESSION['reg_phone'] = $phone_num;

    //Date
    $signup_date = date("Y-m-d"); //Current date

    if(preg_match("/\s/",$fname))
    {
        array_push($error_array,"Your First Name should not contain any Spaces. <br>");
    }

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
       //if(preg_match("/^[a-z][a-zA-Z0-9$]+(@gmail.com)/ix",$college_email)){

            $sql = "SELECT `EMAIL` FROM `users` WHERE `EMAIL` = '$college_email'";
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


    if(strlen($phone_num) > 10){

        array_push($error_array,"Phone Number should consist of only 10 digits <br>");
    }


    if(empty($error_array)){

        // $query = "SELECT `randSalt` FROM `users`";
        // $select_randsalt_query = mysqli_query($conn,$query);

        // if(!$select_randsalt_query){

        //     die("Query Failed" . mysqli_error($conn));
        // }

        // $row = mysqli_fetch_array($select_randsalt_query);
        // $salt = $row['randSalt']; //Fetch this for encrypting password
        // $password = crypt($password,$salt); //Encrypting Password

        $password = md5($password); //encrypts the password before sending to database.

        $verification_id =  rand(111111111,999999999);
        $query = "INSERT INTO `users`(`FIRST_NAME`,`MIDDLE_NAME`,`LAST_NAME`,`EMAIL`,`PASSWORD`,`SIGN_DATE`,`VERIFICATION_ID`,`VERIFY_STATUS`,`PHONE_NUM`) VALUES ('$fname','$mname','$lname','$college_email','$password','$signup_date','$verification_id',0,'$phone_num')";
        $register_query = mysqli_query($conn,$query);
        if(!$register_query){
            die("Query Failed" . mysqli_error($conn));
        }
        else{

            $msg = "<p style='color:green;'>We have just sent a verification link to <strong>{$college_email}</strong><br>Please checkyour inbox and click on the link
            to get started. If you can't find this email, just request a new one here</p>";

            $mailHtml = "Please Confirm your account registration by clicking the button or link below: <a href='http://localhost/sign_recognition/check.php?id={$verification_id}'>
            http://localhost/sign_recognition/check.php?id={$verification_id}</a>";

            smtp_mailer($college_email,'Account Verification',$mailHtml);
        }

        //  //Reset Session
        //  $_SESSION['reg_fname'] = "";
        //  $_SESSION['reg_lname'] = "";
        //  $_SESSION['reg_email'] = "";

        //  header("Location: register.php");

    }

}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function smtp_mailer($to,$subject,$msg){
  try{
    require 'C:/xampp/htdocs/sign_recognition/php_mailer/vendor/autoload.php';
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = 1;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sonuhalkatti23@gmail.com';                     // SMTP username
    $mail->Password   = 'Pandya28@1971';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sonuhalkatti23@gmail.com');
    $mail->addAddress($to);     // Add a recipient

    //$body = '<p><strong> Hello </strong> This is my first Email</p>';


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;

    $mail->Body    = $msg;
    //$mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

?>