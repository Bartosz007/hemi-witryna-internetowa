
document.getElementById("toRegister").onclick = function (){
    document.getElementsByClassName("right-container")[0].style.display = "none";
    document.getElementsByClassName("left-container")[0].style.display = "flex";
}

document.getElementById("toLogin").onclick = function (){
    document.getElementsByClassName("right-container")[0].style.display = "flex";
    document.getElementsByClassName("left-container")[0].style.display = "none";
}

document.getElementById("alert").onclick = function (){
    fadeOut(this);
}


function fadeOut(element){
    let opac = 0.85;

    let interval  = setInterval(function (){
        element.style.opacity = opac;
        if(opac <0.05){
            clearInterval(interval);
            element.style.display = "none";
        }
        opac = opac - 0.05;
    },40);
}