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
let speakButton;

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
speakButton = document.getElementById('speak');



function modelReady(){
    console.log("Model Loaded");
    // models/gray16_model/model.json
    classifier.load('models/14th_may/model.json',customModelReady);
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
    mobilenet = ml5.featureExtractor('MobileNet',{numLabels: 26,epochs: 30},modelReady);
    classifier = mobilenet.classification(video, videoReady);

   
    // trainButton.addEventListener('click',function(){ //when i press the button execute this func
    //     classifier.train(whileTraining);
    // });

    // saveButton.addEventListener('click',function(){ //when i press the button execute this func
    //     classifier.save();
    // });

}

function textToAudio(){
    predspeech = document.getElementById('pred-sentence').textContent;
    // let slicedPred = predspeech.slice(12);
    let speech = new SpeechSynthesisUtterance();
    speech.lang = "en-US";
    speech.text = predspeech;
    speech.volume = 10;
    speech.rate = 1;
    speech.pitch = 1;
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
    if(prob >= 0.4)
    {
        if(label)
        {
            pred.innerText = `${label}`;
        }
       
    }
    else
    {
        pred.innerText = ` `;
    }

    if(prob == undefined)
    {
        conf.innerText = `LOADING . . .`;
    }
    else 
    {
        conf.innerText = `Accuracy: ${prob.toFixed(2) * 100}%`;
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
    else if(key == "k")
    {
        predSentence.innerText = `${sequence+= ' '}`;
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