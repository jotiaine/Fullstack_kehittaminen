"use strict";

// Hero pic auto text
const heroAutoTextEl = document.querySelector("#hero-auto-text");
let text = "DATADRIVERS";
const homeLink = document.querySelector("#home-link");
let idx = 0;

homeLink.addEventListener("click", renderText());

function renderText() {
  if (idx < text.length) {
    heroAutoTextEl.innerHTML += text.charAt(idx);
    idx++;
    setTimeout(renderText, 400);
  }
}
