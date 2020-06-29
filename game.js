var tempUncoveredNum = 0;
var pairs = 0;
var uncoveredButton;
var score = 20;

async function Uncover(id) {
    var image = document.getElementById(id).children[0];
    image.style.visibility = "visible";
    tempUncoveredNum++;
    if (tempUncoveredNum == 2) {
        if (uncoveredButton.children[0].name == image.name && uncoveredButton.id != id) {
            score++;
            pairs++;
            uncoveredButton.style.visibility = "hidden";
            uncoveredButton.disabled = true;
            document.getElementById(id).style.visibility = "hidden";
            document.getElementById(id).disabled = true;
            if (pairs == 10)
                Finish()
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
    if (pairs != 10) {
        document.getElementById("scoreDiv").innerHTML = "Score: " + score;
    }
}
async function Finish() {
    var elem = document.getElementById("scoreInput");
    elem.value = score;
    document.getElementById("finished").style.visibility = "visible";
    alert("You won!");
}

