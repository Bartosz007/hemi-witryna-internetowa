
document.querySelector(".like").addEventListener("click", function (){

    let url = window.location.href.split("?")[1];
    url = url.split("=")[1];
    let data ={
        "id_article": url
    }

    fetch(`/addLike/${url}`)
        .then(function (){
            let like_selector =  document.querySelector(".like");
            like_selector.style.backgroundColor="#E23217D3";
            let likes = parseInt(like_selector.childNodes[3].innerHTML);
            like_selector.childNodes[3].innerHTML = likes + 1;
        })

})

document.querySelector(".add-comment").addEventListener("click", function (){
    if( document.cookie == ""){
        alertPage("Musisz się zalogować aby dodać komentarz!");
        return;
    }

    let text = document.querySelector(".text-new-comment").value;
    if(text.length < 10){
        alertPage("Komentarz jest za krótki!");
        return ;
    }

    let currentLocation = window.location.href;
    let id = currentLocation.split("?");
    id = id[1].split("=")[1];

    let email = document.cookie.split(";");
    email = email[0].split("=")[1];
    email = email.replace("%40", "@");

    let d = new Date();
    let date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
    let time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

    const data = {
        id_article: id,
        email: email,
        text: text,
        date: date,
        time: time
    };

    fetch("/addComment",{
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    }).then(function (response){
        return response.json();
    }).then(function (message){

        let addComentBlock = document.querySelector(".comment-section").lastChild;
        document.querySelector(".comment-section").lastChild.remove();
        document.querySelector(".comment-section").innerHTML += message.data;
        document.querySelector(".comment-section").appendChild(addComentBlock);
        alertPage("Pomyślnie dodano komentarz!");
    })

})


