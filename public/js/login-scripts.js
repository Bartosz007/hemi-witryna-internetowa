
document.getElementById("toRegister").onclick = function (){
    document.getElementsByClassName("right-container")[0].style.display = "none";
    document.getElementsByClassName("left-container")[0].style.display = "flex";
}

document.getElementById("toLogin").onclick = function (){
    document.getElementsByClassName("right-container")[0].style.display = "flex";
    document.getElementsByClassName("left-container")[0].style.display = "none";
}




