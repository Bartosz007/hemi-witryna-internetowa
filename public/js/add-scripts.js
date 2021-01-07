document.getElementsByName("addButton")[0].onclick = function (){

    let file = document.getElementsByName("files[]")[0];
    if (parseInt(file.files.length)>5){
        alert("Wczyta się maksymalnie 5 elementów");
    }

}
