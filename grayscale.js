let mobilenet;
let classifier;
let conf;
let label;
let prob; 
let pred;
let predspeech;
let sequence = '';  
let aButton;
let bButton;
let cButton;
let dButton;
let eButton;
let fButton;
let gButton;
let hButton;
let iButton;
let jButton;
let kButton;
let lButton;
let mButton;
let nButton;
let oButton;
let pButton;
let qButton;
let rButton;
let sButton;
let tButton;
let uButton;
let vButton;
let wButton;
let xButton;
let yButton;
let zButton;


let trainButton;
let saveButton;
let predSentence;
let delSentence;

aButton = document.getElementById('A');
bButton = document.getElementById('B');
cButton = document.getElementById('C');
dButton = document.getElementById('D');
eButton = document.getElementById('E');
fButton = document.getElementById('F');
gButton = document.getElementById('G');
hButton = document.getElementById('H');
iButton = document.getElementById('I');
jButton = document.getElementById('J');
kButton = document.getElementById('K');
lButton = document.getElementById('L');
mButton = document.getElementById('M');
nButton = document.getElementById('N');
oButton = document.getElementById('O');
pButton = document.getElementById('P');
qButton = document.getElementById('Q');
rButton = document.getElementById('R');
sButton = document.getElementById('S');
tButton = document.getElementById('T');
uButton = document.getElementById('U');
vButton = document.getElementById('V');
wButton = document.getElementById('W');
xButton = document.getElementById('X');
yButton = document.getElementById('Y');
zButton = document.getElementById('Z');

trainButton = document.getElementById('train');
saveButton = document.getElementById('save');
pred= document.getElementById('pred');



function modelReady(){
    console.log("Model Loaded");
}

function videoReady(){
    console.log("Video is Ready");
}


function gotResults(error, result){
    if(error){  //safety: if something went wrong during prediction process
        console.error(error);
    }
    else{
        // console.log(result);
        label = result[0].label;
        // console.log(label)
        prob = result[0].confidence;
        classifier.classify(gotResults);
        
    }
}


function whileTraining(loss){
    // console.log(loss);
    if(loss == null){
        console.log("Training complete");
        classifier.classify(gotResults); 
        // modalBody.innerText = `TRAINING COMPLETED`;
    }
    else{
        console.log(loss);
    }
}

function setup(){
    createCanvas(350,380);
    video = createCapture(VIDEO);
    video.hide();
    mobilenet = ml5.featureExtractor('MobileNet',{numLabels: 26, epochs:21},modelReady);
    classifier = mobilenet.classification(video, videoReady);

    // trainButton.addEventListener('click',function(){ //when i press the button execute this func
    //     classifier.train(whileTraining);
    // });

    saveButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.save();
    });

}

function textToAudio(){
    predspeech = document.getElementById('pred-sentence').innerText;
    // let slicedPred = predspeech.slice(12);
    let speech = new SpeechSynthesisUtterance();
    speech.lang = "en-US";
    speech.text = predspeech;
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 4;
    window.speechSynthesis.speak(speech);
}


function draw(){
    background(255);
    fill(0);
    noStroke();
    video.loadPixels();
    for (let x = 0; x < video.width; x++) {
        for (let y = 0; y < video.height; y++) {
          let i = (video.width - x - 1 + (y * video.width))*4;
          let r = video.pixels[i+0];
          let g = video.pixels[i+1];
          let b = video.pixels[i+2];
          let a = video.pixels[i+3];
          
          let luma = 0.299 * r + 0.587 * g + 0.114 * b;
          
          video.pixels[i+0] = luma;
          video.pixels[i+1] = luma;
          video.pixels[i+2] = luma;
        }
    }
    video.updatePixels();
    push();
    translate(video.width, 0);
    scale(-1, 1);
    image(video,0,0);
    pop();

    pred = document.getElementById('pred');
    conf = document.getElementById('conf');
    if(prob > 0.8)
    {
        pred.innerText = `${label}`;
    }
    else
    {
        pred.innerText = ``;
    }

    if(prob == undefined)
    {
        conf.innerText = `LOADING ...`;
    }
    else 
    {
        conf.innerText = `Accuracy: ${prob.toFixed(2) * 100}%`;
    }
}
predSentence = document.getElementById('pred-sentence');
function keyTyped(){

    
    if(key === "a")
    {
        classifier.addImage('A');
        console.log('A');
    }
    else if(key === "b")
    {
        classifier.addImage('B');
        console.log('B');
    }
    else if(key === "c")
    {
        classifier.addImage('C');
        console.log('C');
    }
    else if(key === "d")
    {
        classifier.addImage('D');
        console.log('D');
    }
    else if(key === "e")
    {
        classifier.addImage('E');
        console.log('E');
    }
    else if(key === "f")
    {
        classifier.addImage('F');
        console.log('F');
    }
    else if(key === "g")
    {
        classifier.addImage('G');
        console.log('G');
    }
    else if(key === "h")
    {
        classifier.addImage('H');
        console.log('H');
    }
    else if(key === "i")
    {
        classifier.addImage('I');
        console.log('I');
    }
    else if(key === "j")
    {
        classifier.addImage('J');
        console.log('J');
    }
    else if(key === "k")
    {
        classifier.addImage('K');
        console.log('K');
    }
    else if(key === "l")
    {
        classifier.addImage('L');
        console.log('L');
    }
    else if(key === "m")
    {
        classifier.addImage('M');
        console.log('M');
    }
    else if(key === "n")
    {
        classifier.addImage('N');
        console.log('N');
    }
    else if(key === "o")
    {
        classifier.addImage('O');
        console.log('O');
    }
    else if(key === "p")
    {
        classifier.addImage('P');
        console.log('P');
    }
    else if(key === "q")
    {
       classifier.addImage('Q');
        console.log('Q');
    }
    else if(key === "r")
    {
        classifier.addImage('R');
        console.log('R');
    }
    else if(key === "s")
    {
        classifier.addImage('S');
        console.log('S');
    }
    else if(key === "t")
    {
        classifier.addImage('T');
        console.log('T');
    }
    else if(key === "u")
    {
        classifier.addImage('U');
        console.log('U');
    }
    else if(key === "v")
    {
        classifier.addImage('V');
        console.log('V');
    }
    else if(key === "w")
    {
        classifier.addImage('W');
        console.log('W');
    }
    else if(key === "x")
    {
        classifier.addImage('X');
        console.log('X');
    }
    else if(key === "y")
    {
        classifier.addImage('Y');
        console.log('Y');
    }
    else if(key === "z")
    {
        classifier.addImage('Z');
        console.log('Z');
    }
    else if (key === "5")
    {
        classifier.train(whileTraining);
    }

}