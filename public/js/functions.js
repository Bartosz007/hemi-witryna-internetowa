
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