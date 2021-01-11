if(document.getElementById("logout") != null){
    document.getElementById("logout").onclick = function (){
        document.cookie = "admin= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
        document.cookie = "email= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
        document.cookie = "name= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
        document.cookie = "surname= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";

        document.location.reload();
    }
}


document.getElementById("open-menu").onclick = function (){
    document.getElementsByTagName("nav")[0].style.display = "flex";
    document.getElementsByTagName("main")[0].style.display = "none";
    document.getElementsByTagName("header")[0].style.display = "none";
}

document.getElementById("close-menu").onclick = function (){
    document.getElementsByTagName("nav")[0].style.display = "none";
    document.getElementsByTagName("main")[0].style.display = "flex";
    document.getElementsByTagName("header")[0].style.display = "flex";
}




