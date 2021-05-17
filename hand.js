
let inputVideo = document.getElementById('input');
let outputVideo = document.getElementById('output');

outputVideo.style.cssText = "-moz-transform: scale(-1, 1)";
let input_btn = document.getElementById('input_btn');
let pred= document.getElementById('pred');

let ready = false;



inputVideo.hidden = true;

function modelReady(){
    console.log("Model Loaded");
}

function setup(){
    features = ml5.featureExtractor('MobileNet',{numLabels: 26},modelReady);
    knn = ml5.KNNClassifier();
}

function goClassify()
{
    const logits = features.infer(outputVideo);
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
    console.log('pressed');
    let letter = prompt("Enter the Alphabet");
    let confirmation = confirm('Do you want to start');
    if (confirmation == true){
        for (let i=0;i <= 120; i++)
        {
        const logits = features.infer(outputVideo);
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

    // background(255);
    // fill(0);
    // noStroke();
    // outputVideo.loadPixels();
    // for (let x = 0; x < outputVideo.width; x++) {
    //     for (let y = 0; y < outputVideo.height; y++) {
    //       let i = (outputVideo.width - x - 1 + (y * outputVideo.width))*4;
    //       let r = outputVideo.pixels[i+0];
    //       let g = outputVideo.pixels[i+1];
    //       let b = outputVideo.pixels[i+2];
    //       let a = outputVideo.pixels[i+3];
          
    //       let luma = 0.299 * r + 0.587 * g + 0.114 * b;
          
    //       outputVideo.pixels[i+0] = luma;
    //       outputVideo.pixels[i+1] = luma;
    //       outputVideo.pixels[i+2] = luma;
    //     }
    // }
    // outputVideo.updatePixels();
    // push();
    // translate(outputVideo.width, 0);
    // scale(-1, 1);
    // image(outputVideo,0,0);
    // pop();


    if(!ready && knn.getNumLabels() > 0)
    {
        goClassify();
        ready = true;
    }
}

