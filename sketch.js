let video;
let mobilenet;
let classifier;
let label = '';
let aButton;
let bButton;
let cButton;
let dButton;
let eButton;
let fButton
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
let pred;
let prob;   

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
        classifier.classify(gotResults); //line 16 = 
    }
    else{
        console.log(loss);
    }
}


function setup(){
    createCanvas(500,400);
    video = createCapture(VIDEO);
    video.hide();
    mobilenet = ml5.featureExtractor('MobileNet',{numLabels: 26},modelReady);
    classifier = mobilenet.classification(video, videoReady);

    aButton = createButton('A Sign');   
    aButton.mousePressed(function(){
        classifier.addImage('A');
    });

    bButton = createButton('B Sign');
    bButton.mousePressed(function(){
        classifier.addImage('B');
    });

    cButton = createButton('C Sign');
    cButton.mousePressed(function(){
        classifier.addImage('C');
    });

    dButton = createButton('D Sign');
    dButton.mousePressed(function(){
        classifier.addImage('D');
    });

    eButton = createButton('E Sign');
    eButton.mousePressed(function(){
        classifier.addImage('E');
    });

    fButton = createButton('F Sign');
    fButton.mousePressed(function(){
        classifier.addImage('F');
    });

    gButton = createButton('G Sign');
    gButton.mousePressed(function(){
        classifier.addImage('G');
    });

    hButton = createButton('H Sign');
    hButton.mousePressed(function(){
        classifier.addImage('H');
    });

    iButton = createButton('I Sign');
    iButton.mousePressed(function(){
        classifier.addImage('I');
    });

    jButton = createButton('J Sign');
    jButton.mousePressed(function(){
        classifier.addImage('J');
    });

    kButton = createButton('K Sign');
    kButton.mousePressed(function(){
        classifier.addImage('K');
    });

    lButton = createButton('L Sign');
    lButton.mousePressed(function(){
        classifier.addImage('L');
    });

    mButton = createButton('M Sign');
    mButton.mousePressed(function(){
        classifier.addImage('M');
    });

    nButton = createButton('N Sign');
    nButton.mousePressed(function(){
        classifier.addImage('N');
    });

    oButton = createButton('O Sign');
    oButton.mousePressed(function(){
        classifier.addImage('O');
    });

    pButton = createButton('P Sign');
    pButton.mousePressed(function(){
        classifier.addImage('P');
    });

    qButton = createButton('Q Sign');
    qButton.mousePressed(function(){
        classifier.addImage('Q');
    });

    rButton = createButton('R Sign');
    rButton.mousePressed(function(){
        classifier.addImage('R');
    });

    sButton = createButton('S Sign');
    sButton.mousePressed(function(){
        classifier.addImage('S');
    });

    tButton = createButton('T Sign');
    tButton.mousePressed(function(){
        classifier.addImage('T');
    });

    uButton = createButton('U Sign');
    uButton.mousePressed(function(){
        classifier.addImage('U');
    });

    vButton = createButton('V Sign');
    vButton.mousePressed(function(){
        classifier.addImage('V');
    });

    wButton = createButton('W Sign');
    wButton.mousePressed(function(){
        classifier.addImage('W');
    });

    xButton = createButton('X Sign');
    xButton.mousePressed(function(){
        classifier.addImage('X');
    });

    yButton = createButton('Y Sign');
    yButton.mousePressed(function(){
        classifier.addImage('Y');
    });

    zButton = createButton('Z Sign');
    zButton.mousePressed(function(){
        classifier.addImage('Z');
    });

    trainButton = createButton('Train');
    trainButton.mousePressed(function(){
        classifier.train(whileTraining);
    });

    saveButton = createButton('Save');
    saveButton.mousePressed(function(){
        classifier.save();
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
    pred = document.getElementById('pred');
    if(prob > 0.8){
        pred.innerText = `Prediction: ${label}`;
    }
    else
    {
        pred.innerText = `Prediction: cannot recognize`;
    }
    
}

