// ml5.js: Training a Convolutional Neural Network for Image Classification
// The Coding Train / Daniel Shiffman
// https://thecodingtrain.com/learning/ml5/8.4-cnn-image-classification.html
// https://youtu.be/hWurN0XhzLY
// https://editor.p5js.org/codingtrain/sketches/ogxO8har_
// (mask) https://editor.p5js.org/codingtrain/sketches/tKLoeUD0u

let video;
let videoSize = 64;
let ready = false;

let pixelBrain;
let label = '';
pred= document.getElementById('pred');

function setup() {
  createCanvas(340,370);
  video = createCapture(VIDEO, videoReady);
  video.size(508,101);
  video.hide();

  let options = {
    inputs: [64, 64, 4],
    task: 'imageClassification',
    debug: true,
  };
  pixelBrain = ml5.neuralNetwork(options);
}

function loaded() {
  let options = {
    epohcs: 50
  }
  pixelBrain.train(options, finishedTraining);
}

function finishedTraining() {
  console.log('training complete');
  classifyVideo();
}

function classifyVideo() {
  let inputImage = {
    image: video,
  };
  pixelBrain.classify(inputImage, gotResults);
}

function gotResults(error, results) {
  if (error) {
    return;
  }
  label = results[0].label;
  classifyVideo();
}

function keyTyped() {
  if (key == 't') {
    pixelBrain.normalizeData();
    pixelBrain.train({
        epochs: 50,
      },
      finishedTraining
    );
  } else if (key == 's') 
  {
        pixelBrain.saveData();
   }
}

let input_btn = document.getElementById('input');
input_btn.addEventListener('click', function(){
    let letter = prompt("Enter the Alphabet");
    let confirmation = confirm('Do you want to start');
    if (confirmation == true){
        for (let i=0;i <= 120; i++)
        {
            addExample(letter);
        }
    }
    else
    {
        console.log('Try Again');
    } 
});

function addExample(label) {
  let inputImage = {
    image: video,
  };
  let target = {
    label,
  };
  console.log('Adding example: ' + label);
  pixelBrain.addData(inputImage, target);
}

// Video is ready!
function videoReady() {
  ready = true;
}

function draw() {

background(0);
stroke(0,255,0);
translate(width, 0);
scale(-1, 1);
rect(100,100,30,30);
fill(255,0);

if (ready)
{
    image(video, 0, 0);
}    

pred.innerText = `${label}`;

}