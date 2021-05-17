
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
    <link rel="stylesheet" href="style1.css">
    <title>Custom</title>
  </head>
  <body>
    <!-- <div class="loader">
      <img src="images/Infinity-0.9s-263px.gif" alt="">
    </div> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">SIGNRECOG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pretrained.php">Pretrained Model</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="custom.php">Custom Model</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="custom_sentence.php">Sign to Sentence Model</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pretrainednumber.php">Finger Counting Model</a>
            </li>
            <li class="nav-item profile">
              <a class="nav-link" href="profile.php"><?php echo $_SESSION['name'];   ?></a>
            </li>
          </ul>
          <!-- <form class="d-flex">
            <input class="form-control me-2 search-box" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
        </div>
      </div>
    </nav>
    <div class="container">
        <h3>Place your hand gesture here&nbsp;&nbsp;<i class="fas fa-arrow-down animate__flash"></i></h3>
        <div class="plus-btn">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-success" type="button" id="plus"><i class="fas fa-plus"></i>&nbsp;Add Gesture</button>
                <button class="btn btn-danger" type="button" id="minus"><i class="fas fa-minus"></i>&nbsp;Remove Gesture</button>
            </div>
        </div>
        <div class="btn-frame">
           
        </div>
        <div class="train-save-btn">
            <button class="btn btn-info" type="button" id="train-btn"><i class="fas fa-dumbbell"></i>&nbsp;Train Model</button>
            <button class="btn btn-warning" type="button" id="save-btn"><i class="fas fa-save"></i>&nbsp;Save Model</button>
            <!-- <button class="btn btn-danger" type="button" id="rules"><i class="fas fa-rules"></i>&nbsp;Instructions</button> -->
            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Instructions
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Insructions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ol>
          <li>This is a <b>custom</b> sign gesture model where you can create your own custom gestures.</li>
          <li>To start making prediction,place your appropriate sign gesture in front of web-cam.</li>
          <li>Make sure you have plain background like green screen & ambient lighting
            for making prediction accurately.
          </li>
          <li>Sometimes, your screen may get stuck, it may be due to excessive computation power
            used by your PC. If this issue persist press <b>F5</b> function key.
          </li>
          <li>If you want the model to speak the prediction, press the speak buttton.</li>
          <li>To add custom gesture click on <b>Add Gesture</b> button</li>
          <li>After clicking and naming the sign gesture, place your hand gesture in <b>ROI</b>
          and start clicking the button, which means you are gathering some samples for prediction</li>
          <li>To remove the sign gesture click on <b>Remove Gesture</b> button</li>
          <li>After adding samples click on <b>Train Model</b> button to train your model</li>
          <li>Click on <b>Watch Training Status</b> button to view the status of traning</li>
          <li>Finally, Place your hand gesture in front of web cam for making prediction</li>
          <li>Click on <b>Save Model</b> button to save your model in local environment, so that you can you
          can use it in your future project.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        </div>
        <div class="training-status-box">
          <!-- <button class="btn btn-success training-status">Training Status</button> -->
          <!-- Button trigger modal -->
        <button type="button" class="btn btn-success training-status" data-bs-toggle="modal" data-bs-target="#exampleModal1">
          Watch Training Status
        </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="pred-box">
          <h4 id="pred">Prediction: </h4>
        </div>
        <!-- <div class="speak-box">
          <button class="btn btn-warning" onclick="textToAudio()">Speak</button>
        </div> -->
        <div class="confidence-box">
          <h5 id="conf">Accuracy: </h5>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/addons/p5.sound.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/addons/p5.dom.min.js"></script>
    <script src="https://unpkg.com/ml5@latest/dist/ml5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="customsketch.js"></script>
  </body>
</html>