

window.onload = function (){
    let slider_container = document.querySelector(".img-container");
    let slider_img = slider_container.children;
    let slider_dots = document.getElementsByClassName("dot")
    let length = slider_container.children.length;
    let time = 10000;
    let actual_slide = 0;

    let interval = setInterval(slide,time);

    function slide(){
        changeSlide(slider_img[actual_slide%length],slider_img[(actual_slide+1)%length]);
        slider_dots[actual_slide%length].style = "background-color:white";
        slider_dots[(actual_slide+1)%length].style = "background-color:black";
        actual_slide ++;
    }

    document.querySelector(".img-container").addEventListener("click",function (){
        clearInterval(interval);
        interval = setInterval(slide,time);

        slide();
    })

    for(let i = 0; i<slider_dots.length;i++){

        slider_dots[i].addEventListener("click",function (){
            clearInterval(interval);
            interval = setInterval(slide,time);

            changeSlide(slider_img[actual_slide],slider_img[i]);
            slider_dots[actual_slide].style = "background-color:white";
            slider_dots[i].style = "background-color:black";

            actual_slide = i;

        })

    }

}



function changeSlide(previous, next){

    let opacity = 1;
    next.style.display = "block";

    let fade = setInterval(function (){

        previous.style.opacity = opacity;
        next.style.opacity = 1.0 - opacity;
        opacity = opacity - 0.05;
        if(opacity < 0.05){
            clearInterval(fade);
            previous.style.display = "none";
            previous.style.opacity = "0";
            next.style.opacity = "1";
        }

    },40)
}
