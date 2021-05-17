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
let knn;
let ready = false;

let trainButton;
let saveButton;
let predSentence;
let delSentence;

trainButton = document.getElementById('train');
saveButton = document.getElementById('save');
pred= document.getElementById('pred');
predSentence = document.getElementById('pred-sentence');
let append = document.getElementById('append');
let input_btn = document.getElementById('input');


function modelReady(){
    console.log("Model Loaded");
}

function setup(){
    createCanvas(350,380);
    video = createCapture(VIDEO);
    video.hide();
    features = ml5.featureExtractor('MobileNet',{numLabels: 26},modelReady);
    knn = ml5.KNNClassifier();

}


function goClassify()
{
    const logits = features.infer(video);
    knn.classify(logits,function (error,result)
    {
        if(error)
        {
            console.log(error);
        }
        else
        {
            pred.innerText = `${result.label}`;
            goClassify();
            // console.log(result); 
        }
    });
}

input_btn.addEventListener('click', function(){
    let letter = prompt("Enter the Alphabet");
    let confirmation = confirm('Do you want to start');
    if (confirmation == true){
        for (let i=0;i <= 90; i++)
        {
        const logits = features.infer(video);
        knn.addExample(logits,letter);
        console.log(letter);
        }
    }
    else
    {
        console.log('Try Again');
    } 
});


function keyTyped(){

    const logits = features.infer(video);
    // console.log(logits.dataSync()); //digital fingerprint
    // console.log(logits);
    if(key === "1")
    {
        knn.addExample(logits,'1');
        console.log('1');
    }
    else if(key === "2")
    {
        knn.addExample(logits,'2');
        console.log('2');
    }
    else if(key === "3")
    {
        knn.addExample(logits,'3');
        console.log('3');
    }
    else if(key === "4")
    {
        knn.addExample(logits,'4');
        console.log('4');
    }
    else if(key === "5")
    {
        knn.addExample(logits,'5');
        console.log('5');
    }
    else if(key === "6")
    {
        knn.addExample(logits,'6');
        console.log('6');
    }
    else if(key === "7")
    {
        knn.addExample(logits,'7');
        console.log('7');
    }
    else if(key === "8")
    {
        knn.addExample(logits,'8');
        console.log('8');
    }
    else if(key === "9")
    {
        knn.addExample(logits,'9');
        console.log('9');
    }
    else if(key === "t")
    {
        knn.addExample(logits,'10');
        console.log('10');
    }
    if (key === "s")
    {
        knn.save('knnmodel_number_15.json');
    }


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


    if(!ready && knn.getNumLabels() > 0)
    {
        goClassify();
        ready = true;
    }
}

