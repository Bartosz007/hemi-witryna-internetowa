if(document.getElementById("alert") != null) {
    document.getElementById("alert").onclick = function () {
        let opacity = 0.85;

        let interval  = setInterval(function (){
            document.getElementById("alert").style.opacity = opacity;
            if(opacity <0.05){
                clearInterval(interval);
                document.getElementById("alert").style.display = "none";
                document.getElementById("alert").style.opacity = "0.85";
            }
            opacity = opacity - 0.05;
        },40);
    }
}

function alertPage(text){
    document.getElementById("alert").style.display = "flex";
    document.getElementById("alert").innerHTML = "<h1>" +text+ "</h1>";
}