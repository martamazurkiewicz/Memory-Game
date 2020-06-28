var tempUncoveredNum = 0;
var uncoveredNum = 0;
var uncoveredButton;
var score = 20;

async function Uncover(id) {
    var image = document.getElementById(id).children[0];
    image.style.visibility = "visible";
    tempUncoveredNum++;
    if (tempUncoveredNum == 2) {
        if (uncoveredButton.children[0].name == image.name && uncoveredButton.id != id) {
            score++;
            uncoveredNum++;
            uncoveredButton.style.visibility = "hidden";
            uncoveredButton.disabled = true;
            document.getElementById(id).style.visibility = "hidden";
            document.getElementById(id).disabled = true;
            if (uncoveredNum == 10) {
                document.getElementById("finished").style.visibility = "visible";
                document.getElementById("score").innerHTML = score;
                alert("You won!");
            }
        }
        else {
            score--;
            $(':button').prop('disabled', true);
            await new Promise(r => setTimeout(r, 800));
            $(':button').prop('disabled', false);
            uncoveredButton.children[0].style.visibility = "hidden";
            image.style.visibility = "hidden";
        }
        tempUncoveredNum = 0;
        
    }
    else {
        uncoveredButton = document.getElementById(id);
        uncoveredButton.disabled = true;
    }
    document.getElementById("scoreDiv").innerHTML = "Score: "+score;
}

