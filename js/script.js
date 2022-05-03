"use strict";

const cancelBtn = document.getElementById("cancel-btn");
const modal = document.getElementById("modal");

cancelBtn.addEventListener("click", function () {
  console.log("asdas");
  modal.style.display = "none !important";
});
