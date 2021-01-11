document.getElementById("toRegister").onclick = function () {
    document.getElementsByClassName("right-container")[0].style.display = "none";
    document.getElementsByClassName("left-container")[0].style.display = "flex";
}

document.getElementById("toLogin").onclick = function () {
    document.getElementsByClassName("right-container")[0].style.display = "flex";
    document.getElementsByClassName("left-container")[0].style.display = "none";
}



function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function markValidation(element, condition) {
    if(condition)
        element.classList.remove('no-valid')
    else
        element.classList.add('no-valid')

}

const emailNodes = Array.prototype.slice.call(document.getElementsByName("email"),0);

emailNodes.forEach(function(node){

    node.onkeyup = function (){
        setTimeout(function () {
            markValidation(node, isEmail(node.value));
        }, 500);
    }

});


const passwordInput = document.getElementsByName("password")[0];
const passwordConfirm = document.getElementsByName("repassword")[0];

passwordConfirm.onkeyup = function (){

    setTimeout(function () {
        const condition = passwordInput.value == passwordConfirm.value;
        markValidation(passwordConfirm, condition);
    }, 500);

}


/*
form.addEventListener("submit", e => {
    e.preventDefault();

    //TODO check again if form is valid after submitting it
});*/


