var startTime = new Date();

var endTime = new Date();

generateShapeStyle();

var bestTime = Number.MAX_SAFE_INTEGER;

function generateShapeStyle () {

    var size = (Math.random() * 200) + 50;

    var left = (Math.random() * 90);

    var top = (Math.random() * 90);

    document.getElementById("shape").style.width = size + "px";

    document.getElementById("shape").style.height = size + "px";

    document.getElementById("shape").style.backgroundColor = "blue";

    document.getElementById("shape").style.left = left + "%";

    document.getElementById("shape").style.top = top + "%";

    document.getElementById("shape").style.backgroundColor = getRandomColor();

    document.getElementById("shape").style.borderRadius = circleOrSquare() + "%";

}

function reportTime () {

    endTime = new Date();

    var diffTime = (endTime - startTime) / 1000;

    document.getElementById("timer").innerHTML = diffTime;

    if (diffTime < bestTime) {

        bestTime = diffTime;

    }

    document.getElementById("bestTime").innerHTML = bestTime;            

}

function hideShape () {

    document.getElementById("shape").style.display = "none";

}

function showShape () {

    document.getElementById("shape").style.display = "block";

    startTime = new Date();

}

function getRandomColor () {

    var letters = '0123456789ABCDEF';

    var color = '#';

    for (var i = 0; i < 6; i++) {

        color += letters[Math.floor(Math.random() * 16)];

    }

    return color;
}

function circleOrSquare () {

    var zeroOrOne = Math.floor(Math.random() * 2);

    if(zeroOrOne == 0){
        return 50;
    } else {
        return 0;
    }

}

document.getElementById("shape").onclick = function () {

    reportTime();

    hideShape();

    generateShapeStyle();

    setTimeout(showShape, Math.random() * 2000);

}