function toggleDisplay() {
    'use strict';
    document.getElementById("mobileNavDrop").classList.toggle("display");
}


var acc = document.getElementsByClassName("accordion_header");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.nextElementSibling.classList.toggle("display");
    });
   
}

var annouces = document.getElementsByClassName("exit");

for (i = 0; i < annouces.length; i++) {
    annouces[i].addEventListener("click", function() {
        this.parentElement.style.display = "none";
    })
}