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


function modelReady(){
    console.log("MobileNet Loaded");
    knn = ml5.KNNClassifier();
    knn.load('knn_number.json',function(){
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
            if(result.label)
            {
                label  = result.label;
                pred.textContent = knn.mapStringToIndex[result.label];
                goClassify();
               
            }
           
            // console.log(result); 
        }
        
    });

    
}

function draw(){

    background(0);
    stroke(0,255,0);
    translate(video.width, 0);
    scale(-1, 1);
    rect(100,100,30,30);
    fill(255,0);    
    image(video,0,0);


}

