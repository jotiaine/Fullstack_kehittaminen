"use strict";

const cancelBtn = document.getElementById("cancel-btn");
const modalTest = document.querySelector(".modal-test");

cancelBtn.addEventListener("click", function () {
  console.log("asdas");
  modalTest.style.display = "none !important";
});
