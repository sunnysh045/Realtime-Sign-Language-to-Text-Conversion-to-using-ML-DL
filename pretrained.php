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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="pretrainedstyle.css">
    <title>Sign to Sentence</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="/custom_sentence.html">SIGNRECOG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <li class="nav-item">
                <a class="nav-link" href="home.php">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pretrained.php">Pretrained Model</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="custom_sentence.php">Sign to Sentence Model</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="custom.php">Custom Model</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pretrainednumber.php">Finger Counting Model</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact us</a>
            </li>
            <li class="nav-item prof">
              <a class="nav-link" href="#"><?php echo $_SESSION['name'];   ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        <h4 id="place">Place your hand gesture here&nbsp;&nbsp;<i class="fas fa-arrow-down animate__flash"></i></h4>
        <div class="sign-heading">
          <h3>Pretrained DL model to recognize Alphabets</h3>
        </div>
        <!-- <div class="sentence-cont">
            <h4 id="pred-sentence"></h4>
        </div> -->
        <div class="instructions-btn">
            <!-- <button class="btn btn-danger">Instructions</button> -->
            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Instructions
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Instructions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ol>
          <li>This is a pretrained sign gesture model, which is trained on 26 alphabets.</li>
          <li>To start making prediction,place your appropriate sign gesture in front of web-cam that belongs from
            one of the 26 alphabets.
          </li>
          <li>Make sure you have plain background like green screen & ambient lighting
            for making prediction accurately.
          </li>
          <li>Sometimes, your screen may get stuck, it may be due to excessive computation power
            used by your PC. If this issue persist press <b>F5</b> function key.
          </li>
          <li>If you want the model to speak the prediction, press the speak buttton.</li>
          <li>Refer the below image for making sign gestures:
            <img src="images/realistic-signs.jpg" alt="sign gestures" width="300" height="250"></li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
            <button class="btn btn-warning" id="speak">Speak</button>
          </button>
        </div>
        <div id="pred-box">
            <h4 id="pred"></h4>
            <h5 id="conf"></h5>
        </div>
        <h4 id="letter">Predicted Gesture</h4>
            <!-- <button id="train">Train</button>  -->
            <!-- <button id="save">Save</button> -->
        <!-- </div> -->
        <button class="input_btn" id="input">INPUT</button>
        <!-- <input type="file" id="file-selector"> -->
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/addons/p5.sound.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/addons/p5.dom.min.js"></script>
    <script src="https://unpkg.com/ml5@latest/dist/ml5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <!-- <script src="pretrainedsketch.js"></script> -->
    <!-- <script src="grayscale.js"></script> -->
    <!-- <script src="savedmodel.js"></script> -->
    <script src="savedsketchknn.js"></script>
    <!-- <script src="sketchknn.js"></script> -->
  </body>
</html>