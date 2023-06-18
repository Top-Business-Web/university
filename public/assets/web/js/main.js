const slidePage = document.querySelector(".slidePage");  //call div Containing four forms 
const firstNextBtn = document.querySelector(".next-btn");  //call first next button
const prevBtn1 = document.querySelector(".prev1-btn");     //call first previous button
const secNextBtn = document.querySelector(".next1-btn");
const prevBtn2 = document.querySelector(".prev2-btn");
const thirdNextBtn = document.querySelector(".next2-btn");
const prevBtn3 = document.querySelector(".prev3-btn");
const fourNextBtn = document.querySelector(".next3-btn");

const progressText = document.querySelectorAll(".step p");  //call title of progress
const progressCheck = document.querySelectorAll(".step .check");  //call icon of check
const bullet = document.querySelectorAll(".step .bullet");    //call number of form

let current = 1; //variable

// -four forms each form will take margin left in style 25% to move
//- variable current -1 "first index" to add class active from style
//- the same in title of progress, icon of check and number of form add class active from style
//- add variable current 1 to call second index
firstNextBtn.addEventListener("click", function(){
    slidePage.style.marginLeft = "-25%";             //This part is responsible for the slide movement
    bullet[current - 1].classList.add("active");     //This part is responsible for class acive for number 
    progressText[current - 1].classList.add("active"); //This part is responsible for class acive for title
    progressCheck[current - 1].classList.add("active"); //This part is responsible for class acive for icon of check
    current +=1;
});

secNextBtn.addEventListener("click", function(){
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    current +=1;
});

thirdNextBtn.addEventListener("click", function(){
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    current +=1;
});

fourNextBtn.addEventListener("click", function(){
    bullet[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    current +=1;
});


// This part is the opposite of the next button, We will decrease 25% to go back
// current -2 "first index negative" to remove class active from style
prevBtn1.addEventListener("click", function(){
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -=1;
});

prevBtn2.addEventListener("click", function(){
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -=1;
});

prevBtn3.addEventListener("click", function(){
    slidePage.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -=1;
});