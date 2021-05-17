let btn;
let btnName;
let btnPlus;
let btnMinus;
let btnCont;
let mobilenet;
let classifier;
let pred;
let predspeech;
let conf;
let label;
let prob;
let modalBody;
let trainButton;
let saveButton;
let trainStats;

btnPlus = document.getElementById('plus');
btnMinus = document.getElementById('minus');
btnCont = document.querySelector('.btn-frame');
modalBody = document.querySelector('.modal-body');
trainStats = document.querySelector('.train-stats');


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
        modalBody.textContent = `TRAINING COMPLETED`;
    }
    else{
        console.log(loss);
    }
}


function setup(){

    var items = ['btn-success','btn-primary','btn-secondary','btn-info','btn-warning','btn-dark'];
    var item = items[Math.floor(Math.random() * items.length)];
    createCanvas(350,380);
    video = createCapture(VIDEO);
    video.hide();
    mobilenet = ml5.featureExtractor('MobileNet',{numLabels: 26},modelReady);
    classifier = mobilenet.classification(video, videoReady);

    btnPlus.addEventListener('click',function(){
        btnName = prompt("Enter the name of the button");
        console.log(btnName);
        if(btnName == null)
        {
            console.log("NULL");
        }
        else{
       
        btn = document.createElement('button');
        btn.classList.add('btn',item);
        btn.innerText = btnName;
        btnCont.appendChild(btn);
        console.log(btn);
        btn.addEventListener('click', function(){
            classifier.addImage(btnName);
            console.log("Image Added");
        });
    }

    }); 

    btnMinus.addEventListener('click',function(){
        console.log('Minus');
        if(btnCont.childElementCount == 0)
        {
            alert('Please add some gestures');
        }
        else 
        {
            btnCont.removeChild(btnCont.lastElementChild);
        }
        
    });

    trainButton = document.getElementById('train-btn');
    trainButton.addEventListener('click',function(){
        classifier.train(whileTraining);
    });

    saveButton = document.getElementById('save-btn');
    saveButton.addEventListener('click',function(){
        classifier.save();
    });
}


function textToAudio(){
    predspeech = document.getElementById('pred').innerText;
    let slicedPred = predspeech.slice(12);
    let speech = new SpeechSynthesisUtterance();
    speech.lang = "en-US";
    speech.text = slicedPred;
    speech.volume = 1;
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
    if(prob > 0.8){
        pred.innerText = `Prediction: ${label}`;
    }
    else
    {
        pred.innerText = `Prediction: cannot recognize`;
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

