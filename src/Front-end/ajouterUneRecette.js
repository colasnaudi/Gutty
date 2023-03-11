var btn1 = document.getElementById("btn1");
var btn2 = document.getElementById("btn2");
var btn3 = document.getElementById("btn3");
var btn4 = document.getElementById("btn4");

function changeBackground1() {
    btn1.style.background = "#ffb400";
    btn2.style.background = "white";
    btn3.style.background = "white";
    btn4.style.background = "white";
}

function changeBackground2() {
    btn1.style.background = "white";
    btn2.style.background = "#ffb400";
    btn3.style.background = "white";
    btn4.style.background = "white";
}

function changeBackground3() {
    btn1.style.background = "white";
    btn2.style.background = "white";
    btn3.style.background = "#ffb400";
    btn4.style.background = "white";
}

function changeBackground4() {
    btn1.style.background = "white";
    btn2.style.background = "white";
    btn3.style.background = "white";
    btn4.style.background = "#ffb400";
}

const inputPhoto = document.querySelector('#inputImageRecette');
const apercuPhoto = document.querySelector('#imageRecette');

inputPhoto.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
            apercuPhoto.setAttribute('src', this.result);
            apercuPhoto.style.display = 'block';
        });

        reader.readAsDataURL(file);
    } else {
        apercuPhoto.setAttribute('src', '#');
        apercuPhoto.style.display = 'none';
    }
});