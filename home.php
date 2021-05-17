
<?php  

ob_start();
session_start();
if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] != true){

  header("Location: login.php");
  exit;
  
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="homestyle.css">
    <title>SIGNRECOG</title>
  </head>
  <body>
      <!-- As a link -->
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">SIGNRECOG</a><a href="profile.php" id="profile-link">Welcome&nbsp;<?php echo $_SESSION['name'];   ?></a><a href="logout.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>
    </div>
  </nav>
    <div class="container">
        <div class="static-card">
            <h4>CUSTOM GESTURE DL MODEL</h4>
            <p>This DL model will help you to create custom sign gestures. 
            You can create your own sign gestures using your web cam.
            Train them and save it for future use in your own local project.</p>
            <a href="custom.php">ENTER</a>
        </div>
        <div class="static-card">
            <h4>PRETRAINED GESTURES DL MODEL</h4>
            <p>This DL model is already trained on 26 alphabets, 
                You just need to activate your web cam and place sign gesture 
                in front of it. The DL model will make Predictions for you.</p>
            <a href="pretrained.php">ENTER</a>
        </div>
        <div class="static-card">
            <h4>CONVERT SIGN LANGUAGE TO SENTENCE DL MODEL</h4>
            <p>Similar to Pre-trained DL model, but here you can convert the sign gestures into sentences.</p>
            <a href="custom_sentence.php" class="custom_enter">ENTER</a>
        </div>
        <div class="static-card">
            <h4>FINGER COUNTING DL MODEL</h4>
            <p>This is a pretrained Finger Couting DL model.You just need to activate your web cam and place sign gesture 
                in front of it.
            </p>
            <a href="pretrainednumber.php" class="custom_enter" target="_blank">ENTER</a>
        </div>
    </div>
    <div class="footer">
       <h5>©2021 - SIGN LANGUAGE RECOGNITON</h5> 
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  </body>
</html>