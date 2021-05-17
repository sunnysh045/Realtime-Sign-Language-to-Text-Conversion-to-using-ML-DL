let mobilenet;
let classifier;
let conf;
let label;
let prob; 
let pred;
let predspeech;
let labelP = 'needs training data';
let sequence = '';  
let features;
let knn;
let ready = false;

let trainButton;
let saveButton;
let predSentence;
let delSentence;


trainButton = document.getElementById('train');
saveButton = document.getElementById('save');
pred = document.getElementById('pred');
conf = document.getElementById('conf');
// predSentence = document.getElementById('pred-sentence');
let videoCanvas = document.querySelector('canvas');
console.log(videoCanvas);
let append = document.getElementById('append');



function setup(){
    createCanvas(350,380);
    video = createCapture(VIDEO);
    video.hide();
    features = ml5.featureExtractor('MobileNet',modelReady);

}

// const fullPath = document.getElementById('file-selector');
function modelReady(){
    console.log("MobileNet Loaded");
    knn = ml5.KNNClassifier();
    // knnmodel_up.json
    // knnmodel_13.json
    knn.load('15th_may.json',function(){
        console.log("KNN Data Loaded");
        goClassify();
    });

}


let a;
function goClassify()
{
    const logits = features.infer(video);
    knn.classify(logits,function (error,result)
    {
        if(error)
        {
            console.log(error);
        }
        if(result.confidencesByLabel)
        {
            // const confidences = result.confidencesByLabel;
            if(result.label)
            {
                label  = result.label;
                pred.textContent = knn.mapStringToIndex[result.label];
                // document.querySelector('#conf').textContent = `${confidences[result.label] * 100} %`;
                goClassify();
               
            }
           
            // console.log(result); 
        }
        
    });

    
}



document.getElementById('speak').addEventListener('click', function(){
    console.log('speak');
    predspeech = document.getElementById('pred').innerText;
    //let slicedPred = predspeech.slice(12);
    let speech = new SpeechSynthesisUtterance();
    speech.lang = "en-US";
    speech.text = predspeech;
    speech.volume = 4;
    speech.rate = 1
    speech.pitch = 1;
    window.speechSynthesis.speak(speech);
});


function draw(){

    background(0);
    stroke(0,255,0);
    translate(video.width, 0);
    scale(-1, 1);
    rect(100,100,30,30);
    fill(255,0);    
    image(video,0,0);

    // background(255);
    // fill(0);
    // noStroke();
    // video.loadPixels();
    // for (let x = 0; x < video.width; x++) {
    //     for (let y = 0; y < video.height; y++) {
    //       let i = (video.width - x - 1 + (y * video.width))*4;
    //       let r = video.pixels[i+0];
    //       let g = video.pixels[i+1];
    //       let b = video.pixels[i+2];
    //       let a = video.pixels[i+3];
          
    //       let luma = 0.299 * r + 0.587 * g + 0.114 * b;
          
    //       video.pixels[i+0] = luma;
    //       video.pixels[i+1] = luma;
    //       video.pixels[i+2] = luma;
    //     }
    // }
    // video.updatePixels();
    // push();
    // translate(video.width, 0);
    // scale(-1, 1);
    // image(video,0,0);
    // pop();



}

