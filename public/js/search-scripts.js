
document.querySelector("input[name='search']").addEventListener("keypress",function (e){
    let data = {
        search: this.value
    }

    if(e.key === "Enter"){

        fetch(`/searchArticle/${this.value}`,{
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }).then(function (response){
            return response.json();
        }).then(function (message){
            document.querySelector(".section-search").innerHTML = message.data;
           /* let addComentBlock = document.querySelector(".comment-section").lastChild;
            document.querySelector(".comment-section").lastChild.remove();
            document.querySelector(".comment-section").innerHTML += message.data;
            document.querySelector(".comment-section").appendChild(addComentBlock);
            alertPage("Pomyślnie dodano komentarz!");

            */
        })

    }
})