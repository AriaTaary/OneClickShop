// function showBlock(id) {
//     let style = document.getElementById(id).style;
//     style.display = (style.display === "block") ? "none" : "block";
// }

const personButton = document.querySelector("#person-button");               
const modal = document.querySelector(".modal");
const close = document.querySelector(".close");

personButton.addEventListener("click", function(event){
modal.classList.add('is-now-open');
console.log(personButton);
});

close.addEventListener("click", function(event){
modal.classList.remove('is-now-open');
});


const logIn = document.querySelector("#login");
const regIn = document.querySelector("#regin");
const blockLogIn = document.querySelector("#blocklogin");
const blockRegIn = document.querySelector("#blockregin");

regIn.addEventListener("click", function(event){
// console.log("login");
blockLogIn.classList.remove('block-open');
blockRegIn.classList.add('block-open');
logIn.classList.remove('link-active');
regIn.classList.add('link-active');
});

logIn.addEventListener("click", function(event){
// console.log("regin");
blockRegIn.classList.remove('block-open');
blockLogIn.classList.add('block-open'); 
regIn.classList.remove('link-active');
logIn.classList.add('link-active'); 
}); 