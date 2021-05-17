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
        for (let i=0;i <= 120; i++)
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

    // const logits = features.infer(video);
    // console.log(logits.dataSync()); //digital fingerprint
    // console.log(logits);
    // if(key === "a")
    // {
    //     knn.addExample(logits,'A');
    //     console.log('A');
    // }
    // else if(key === "b")
    // {
    //     knn.addExample(logits,'B');
    //     console.log('B');
    // }
    // else if(key === "c")
    // {
    //     knn.addExample(logits,'C');
    //     console.log('C');
    // }
    // else if(key === "d")
    // {
    //     knn.addExample(logits,'D');
    //     console.log('D');
    // }
    // else if(key === "e")
    // {
    //     knn.addExample(logits,'E');
    //     console.log('E');
    // }
    // else if(key === "f")
    // {
    //     knn.addExample(logits,'F');
    //     console.log('F');
    // }
    // else if(key === "g")
    // {
    //     knn.addExample(logits,'G');
    //     console.log('G');
    // }
    // else if(key === "h")
    // {
    //     knn.addExample(logits,'H');
    //     console.log('H');
    // }
    // else if(key === "i")
    // {
    //     knn.addExample(logits,'I');
    //     console.log('I');
    // }
    // else if(key === "j")
    // {
    //     knn.addExample(logits,'J');
    //     console.log('J');
    // }
    // else if(key === "k")
    // {
    //     knn.addExample(logits,'K');
    //     console.log('K');
    // }
    // else if(key === "l")
    // {
    //     knn.addExample(logits,'L');
    //     console.log('L');
    // }
    // else if(key === "m")
    // {
    //     knn.addExample(logits,'M');
    //     console.log('M');
    // }
    // else if(key === "n")
    // {
    //     knn.addExample(logits,'N');
    //     console.log('N');
    // }
    // else if(key === "o")
    // {
    //     knn.addExample(logits,'O');
    //     console.log('O');
    // }
    // else if(key === "p")
    // {
    //     knn.addExample(logits,'P');
    //     console.log('P');
    // }
    // else if(key === "q")
    // {
    //     knn.addExample(logits,'Q');
    //     console.log('Q');
    // }
    // else if(key === "r")
    // {
    //     knn.addExample(logits,'R');
    //     console.log('R');
    // }
    // else if(key === "s")
    // {
    //     knn.addExample(logits,'S');
    //     console.log('S');
    // }
    // else if(key === "t")
    // {
    //     knn.addExample(logits,'T');
    //     console.log('T');
    // }
    // else if(key === "u")
    // {
    //     knn.addExample(logits,'U');
    //     console.log('U');
    // }
    // else if(key === "v")
    // {
    //     knn.addExample(logits,'V');
    //     console.log('V');
    // }
    // else if(key === "w")
    // {
    //     knn.addExample(logits,'W');
    //     console.log('W');
    // }
    // else if(key === "x")
    // {
    //     knn.addExample(logits,'X');
    //     console.log('X');
    // }
    // else if(key === "y")
    // {
    //     knn.addExample(logits,'Y');
    //     console.log('Y');
    // }
    // else if(key === "z")
    // {
    //     knn.addExample(logits,'Z');
    //     console.log('Z');
    // }
    if (key === "1")
    {
        knn.save('knnmodel_13.json');
    }


}

function draw(){
    // background(0);
    // stroke(0,255,0);
    // translate(video.width, 0);
    // scale(-1, 1);
    // rect(100,100,30,30);
    // fill(255,0);
    // image(video,0,0);

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

