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
    <!-- <link rel="stylesheet" href="neuralstyle.css"> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
   
    <title>Sign to Sentence</title>

<style>

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}


nav{
    background: rgb(33,42,130);
    background: linear-gradient(133deg, rgba(33,42,130,1) 46%, rgba(0,0,0,1) 77%);
}

.navbar-brand{
    color: #fff;
}

nav li a{
    color: #fff;
}

.container{
    border: 6px ridge #fff;
    position: relative;
    top: 6.6rem;
    height: 37rem;
    width: 91rem;
}

.p5Canvas{
    border: 5px ridge #212A82;
    width: 340px;
    height: 370px;
    position: relative;
    left: 11.6rem;
    bottom: 24rem;
}

.sentence-cont{
    border: 5px outset royalblue;
    width: 46em;
    height: 8rem;
    position: relative;
    left: 32rem;
    top: 10rem;
}

.sentence-cont h4{
    font-family: 'Noto Sans TC', sans-serif;
    font-size: 20px;
    line-height: 30px;  
}

#pred-box h4{
    font-family: 'Noto Sans TC', sans-serif;
    border: 5px ridge #2086E8;
    width: 17rem;
    height: 15.5rem;
    position: relative;
    padding-top: 5px;
    padding-bottom: 36px;
    top: 6rem;
    left: 49rem;
    text-align: center;
    font-size: 151px;

}

#letter
{
    position: relative;
    width: 27rem;
    left: 52.4rem;
    top: 95px;
}

.prof
{
    margin-left: 25rem;
}

#pred-box h5{
    font-family: 'Noto Sans TC', sans-serif;
    position: relative;
    top: 7.3rem;
    width: 23rem;
    left: 55.6px;
    border: 4px ridge #438cd1;
    padding: 6px 6px;
    text-align: center;
}


.btn-box{
    position: relative;
    left: 46rem;
    top: 6rem;
    width: 26rem;
    border: 1px solid black;
}

.btn-box h4{
    border: 2px solid black;
    display: flex;
    flex-wrap: wrap;
    width: 50rem;
    height: 14rem;
    position: relative;
    left: 30rem;
    top: 8rem;  
}

body{
    background: linear-gradient(290deg, #43d826, #1befb8);
    background-size: 400% 400%;

    -webkit-animation: sentence 6s ease infinite;
    -moz-animation: sentence 6s ease infinite;
    animation: sentence 6s ease infinite;
}

@-webkit-keyframes sentence {
    0%{background-position:0% 15%}
    50%{background-position:100% 86%}
    100%{background-position:0% 15%}
}
@-moz-keyframes sentence {
    0%{background-position:0% 15%}
    50%{background-position:100% 86%}
    100%{background-position:0% 15%}
}
@keyframes sentence {
    0%{background-position:0% 15%}
    50%{background-position:100% 86%}
    100%{background-position:0% 15%}
}

.sign-heading h3 {
    font-family: 'Noto Sans TC', sans-serif;
    border: 4px ridge olivedrab;
    width: 48rem;
    margin-left: 30.69rem;
    position: relative;
    top: 116px;
    text-align: center;
    padding: 10px 10px;
}

.sentence-footer{
    background: rgb(33,42,130);
    background: linear-gradient(133deg, rgba(33,42,130,1) 46%, rgba(0,0,0,1) 77%);
    position: relative;
    top: 400px;
}

.brand-title{
    height: 334px;
    color: #fff;
    font-size: 26px;
    margin: 13px 41px;
    padding-top: 50px;
    padding-left: 10px;
}

.explore{
    position: relative;
    bottom: 18.2rem;
    left: 15rem;
    list-style: none;
}

.explore li h3{
    color: #FFF;
}

.explore li a{
    color: #FFF;
    text-decoration: none;
    font-size: 20px;
}

.follow{
    position: relative;
    bottom: 29.1rem;
    left: 27rem;
    list-style: none;
}

.follow li h3{
    color: #FFF;
}

.follow li a{
    color: #FFF;
    text-decoration: none;
    font-size: 20px;
    text-transform: lowercase;
}

.instructions-btn{
    position: relative;
    left: 32rem;
    width: 48rem;
    top: 11rem;
    /* background-color: red; */
}

.btn-danger{
    margin-right: 35rem;
}

.fa-arrow-down{
    animation: flash; /* referring directly to the animation's @keyframe declaration */
    animation-duration: 2s; /* don't forget to set a duration! */
    animation-iteration-count:infinite;
}

.container #place{
    color: #fff;
    font-family: 'Titillium Web', sans-serif;
    font-weight: 600;
    font-size: 25px;
    letter-spacing: 2px;
    margin-left: 54px;
    position: relative;
    top: 53px;
}


</style>
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
            <button class="btn btn-warning" onclick="textToAudio()">Speak</button>
          </button>
        </div>
        <div id="pred-box">
            <h4 id="pred"></h4>
            <!-- <h5 id="conf"></h5> -->
        </div>
        <h4 id="letter">Predicted Gesture</h4>
          <!-- <div class="btn-box"> -->
            <!-- <button id="A">A Sign</button>
            <button id="B">B Sign</button>
            <button id="C">C Sign</button>
            <button id="D">D Sign</button>
            <button id="E">E Sign</button>
            <button id="F">F Sign</button>
            <button id="G">G Sign</button>
            <button id="H">H Sign</button>
            <button id="I">I Sign</button>
            <button id="J">J Sign</button>
            <button id="K">K Sign</button>
            <button id="L">L Sign</button>
            <button id="M">M Sign</button>
            <button id="N">N Sign</button>
            <button id="O">O Sign</button>
            <button id="P">P Sign</button>
            <button id="Q">Q Sign</button>
            <button id="R">R Sign</button>
            <button id="S">S Sign</button>
            <button id="T">T Sign</button>
            <button id="U">U Sign</button>
            <button id="V">V Sign</button>
            <button id="W">W Sign</button>
            <button id="X">X Sign</button>
            <button id="Y">Y Sign</button>
            <button id="Z">Z Sign</button>

            <button id="train">Train</button> -->
            <!-- <button id="save">Save</button> -->
        <!-- </div> -->
        <button class="input_btn" id="input">INPUT</button>
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
    <script src="neuralsketch.js"></script>
    <!-- <script src="sketchknn.js"></script> -->
  </body>
</html>