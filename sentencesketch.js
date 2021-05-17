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
    classifier.load('model.json',customModelReady);
}


function customModelReady(){
    console.log("Custom Model is ready");
    classifier.classify(gotResults);
}


function videoReady(){
    console.log("Video is Ready");
    classifier.classify(gotResults);
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
    mobilenet = ml5.featureExtractor('MobileNet',{numLabels: 26},modelReady);
    classifier = mobilenet.classification(video, videoReady);

    aButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('A');
        console.log("A Image Added");
    });

    bButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('B');
        console.log("B Image Added");
    });

    cButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('C');
        console.log("C Image Added");
    });

    dButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('D');
        console.log("D Image Added");
    });

    eButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('E');
        console.log("E Image Added");
    });

    fButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('F');
        console.log("F Image Added");
    });

    gButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('G');
        console.log("G Image Added");
    });

    hButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('H');
        console.log("H Image Added");
    });

    iButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('I');
        console.log("I Image Added");
    });

    jButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('J');
        console.log("J Image Added");
    });

    kButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('K');
        console.log("K Image Added");
    });

    lButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('L');
        console.log("L Image Added");
    });

    mButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('M');
        console.log("M Image Added");
    });

    nButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('N');
        console.log("N Image Added");
    });

    oButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('O');
        console.log("O Image Added");
    });

    pButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('P');
        console.log("P Image Added");
    });

    qButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('Q');
        console.log("Q Image Added");
    });

    rButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('R');
        console.log("R Image Added");
    });

    sButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('S');
        console.log("S Image Added");
    });

    tButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('T');
        console.log("T Image Added");
    });

    uButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('U');
        console.log("U Image Added");
    });

    vButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('V');
        console.log("V Image Added");
    });

    wButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('V');
        console.log("W Image Added");
    });

    xButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('X');
        console.log("X Image Added");
    });

    yButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('Y');
        console.log("Y Image Added");
    });

    zButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.addImage('Z');
        console.log("Z Image Added");
    });

    trainButton.addEventListener('click',function(){ //when i press the button execute this func
        classifier.train(whileTraining);
    });

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
    background(0);
    stroke(0,255,0);
    translate(video.width, 0);
    scale(-1, 1);
    rect(100,100,30,30);
    fill(255,0);
    image(video,0,0);

    pred = document.getElementById('pred');
    conf = document.getElementById('conf');
    if(prob > 0.7)
    {
        pred.innerText = `Prediction: ${label}`;
    }
    else
    {
        pred.innerText = `Prediction: `;
    }

    if(prob == undefined)
    {
        conf.innerText = `Add samples for prediction`;
    }
    else 
    {
        conf.innerText = `Accuracy: ${prob.toFixed(4)}`;
    }
}
predSentence = document.getElementById('pred-sentence');
function keyTyped(){

    if(key === "j")
    {
        predSentence.innerText = `${sequence = sequence + label}`;
    }
    else if(key === "l")
    {
        predSentence.innerText = `${sequence = sequence.slice(0,sequence.length - 1)}`;
    }
    else if(key === "c")
    {
        predSentence.contentEditable = true;
    }
    else if(key === "d")
    {
        predSentence.contentEditable = false;
    }
}