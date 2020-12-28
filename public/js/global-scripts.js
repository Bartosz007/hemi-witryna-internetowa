if(document.getElementById("logout") != null){
    document.getElementById("logout").onclick = function (){
        document.cookie = "admin= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
        document.cookie = "email= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
        document.cookie = "name= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
        document.cookie = "surname= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";

        document.location.reload();
    }
}

if(document.getElementById("alert") != null) {
    document.getElementById("alert").onclick = function () {
        let opacity = 0.85;

        let interval  = setInterval(function (){
            document.getElementById("alert").style.opacity = opacity;
            if(opacity <0.05){
                clearInterval(interval);
                document.getElementById("alert").style.display = "none";
            }
            opacity = opacity - 0.05;
        },40);
    }
}
