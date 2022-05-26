"use strict";

document.querySelectorAll(".cls-1").forEach((elm, i)=> {
    console.log("i", i);
    elm.classList.add("ani");
    elm.style.animationDelay = `${i/10}s`;
});