<?php

session_start();
ob_start();

if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] != true){

  header("Location: login.php");
  exit;
  
}
include 'C:/xampp/htdocs/sign_recognition/db.php';  
$query = "SELECT * FROM `users` WHERE `USER_ID` = '".$_SESSION['user_id']."'";
$query1 = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($query1)){

    $first_name = $row['FIRST_NAME'];
    $last_name = $row['LAST_NAME'];
    $email = $row['EMAIL'];
    $signup_date = $row['SIGN_DATE'];
    $phone = $row['PHONE_NUM'];
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title> <?php echo $_SESSION['name'];   ?>'s&nbsp;SIGNRECOG PROFILE</title>
    <script defer src="profile_info.js"></script>
  </head>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap');
      .profile-card 
      {
        box-shadow: 1px 10px 38px -6px rgba(0,0,0,0.53);
        -webkit-box-shadow: 1px 10px 38px -6px rgba(0,0,0,0.53);
        -moz-box-shadow: 1px 10px 38px -6px rgba(0,0,0,0.53);
        border-radius: 6px;
        width: 40rem;
        height: 40rem;
        margin-left: 22rem;
        margin-top: 4.5rem;
      }

      .profile-card h4
      {
        position: relative;
        top: 3.3rem;
        text-align: center;
        font-family: 'Titillium Web', sans-serif;
        font-size: 30px;
      }

      body {
    background: linear-gradient(265deg, #09dea7, #09bcde);
    background-size: 400% 400%;

    -webkit-animation: AnimationName 12s ease infinite;
    -moz-animation: AnimationName 12s ease infinite;
    animation: AnimationName 12s ease infinite;
}

@-webkit-keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@-moz-keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}

      #names
      {
        position: relative;
        top: 5rem;
        left: 61px;
      }

      #email_id
      {
        position: relative;
        top: 105px;
        left: 182px;
      }
      
      #phone_num
      {
        position: relative;
        top: 130px;
        left: 181px;
      }

      #bio
      {
        position: relative;
        top: 164px;
        left: 182px;
      }

      #signup
      {
        margin-top: 0;
        margin-bottom: 1rem;
        position: relative;
        top: 11rem;
        left: 179px;
        font-size: 20px;
      }

      #save1
      {
        position: relative;
        top: 13rem;
        margin-left: 196px;
      }

      #edit1
      {
        position: relative;
        top: 13em;
      }

  </style>
  <body>
    <div class="container">

        <div class="profile-card">
          <h4>Your SIGNRECOG Profile</h4>
        <form action="" method="post">
            <div class="row" id="names">
              <div class="col-lg-5">
                <input type="text" name="first" id="first_name" class="form-control" placeholder="First Name" value="<?php  echo $first_name;  ?>">
              </div>
              <div class="col-lg-5">
                <input type="text" name="last" id="last_name" class="form-control" placeholder="Last Name"  value="<?php  echo $last_name;  ?>">
              </div>
            </div>
            <div class="row" id="email_id">
              <label for="email_id">Email-Id</label>
              <div class="col-lg-6">
                  <input type="email" name="email" id="email-id" class="form-control" value="<?php  echo $email;  ?>">
              </div>
            </div>
            <div class="row" id="phone_num">
              <label for="mobile">Mobile</label>
              <div class="col-lg-6">
                  <input type="text" name="phone" id="mobile" class="form-control" placeholder="Enter 10 digits mobile number" value="<?php  echo $phone;  ?>">
              </div>
            </div>
            <div class="row" id="bio">
              <label for="bio_info">BIO</label>
              <div class="col-lg-6">
                 <textarea name="prof-bio" id="bio_info" cols="60" rows="3" class="form-control" placeholder="Describe yourself in few words"></textarea>
              </div>
            </div>
            <p id="signup">Account created on : <?php echo $signup_date; ?></p>
           
        </form>
        <input type="button" class="btn btn-success" name="save" id="save1" value="SAVE CHANGES">
        <input type="button" class="btn btn-primary" name="edit" id="edit1" value="EDIT CHANGES">
        </div>
      
    </div>

   
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
  </body>
</html>