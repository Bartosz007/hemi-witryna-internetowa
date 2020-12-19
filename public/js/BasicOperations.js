
window.onload = function (){

    if(document.getElementById("logout") != null){
        document.getElementById("logout").onclick = function (){
            document.cookie = "admin= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
            document.cookie = "email= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
            document.cookie = "name= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
            document.cookie = "surname= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";

            document.location.reload();
        }
    }


}
