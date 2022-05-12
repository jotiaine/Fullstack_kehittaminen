"use strict";

// Establshing no conflict just in case. $ for jQuery works only inside ready function
$.noConflict();
jQuery(document).ready(function ($) {
  /* test.php */
  // hide test form
  $("#test-container").hide();

  // hide submit test btn container
  $("#submit-btn-container").hide();

  /* test.php slides */
  $("#start-test-btn").click(() => {
    $("#start-btn-container").hide("slow", "linear", () => {
      $("#test-container").slideToggle("slow", "linear", () => {
        $("#submit-btn-container").show("slow");
      });
    });
  });
  /****END test.php*****/

  /* index.php */
  openModal();
  function openModal() {
    $("#myModal").addClass("d-flex");

    // Open student form
    $("#student").click(() => {
      $("#teacher").hide();
      $("#student").hide();
      $("#studentForm").removeClass("d-none");
      $("#goBackBtn").removeClass("d-none");
      $("#modalHeadText").hide();
      $("#modal-title").html("Fill in your details");

      // Go back to choosing student or teacher
      $("#goBackBtn").click(() => {
        $("#goBackBtn").addClass("d-none");
        $("#studentForm").addClass("d-none");
        $("#teacher").show();
        $("#student").show();
        $("#modalHeadText").show();
        $("#modal-title").html("Select One");
      });
    });

    // Close modal
    $("#closeModal").click(() => {
      $("#myModal").addClass("d-none");
    });
  }
  /****END index.php*****/

  /* faq.php */
  faqSlides();
  function faqSlides() {
    $("#question1").click(function () {
      $("#answer1").slideToggle("slow");
    });
    $("#answer1").click(function () {
      $("#answer1").slideUp("slow");
    });
    $("#question2").click(function () {
      $("#answer2").slideToggle("slow");
    });
    $("#answer2").click(function () {
      $("#answer2").slideUp("slow");
    });
    $("#question3").click(function () {
      $("#answer3").slideToggle("slow");
    });
    $("#answer3").click(function () {
      $("#answer3").slideUp("slow");
    });
    $("#question4").click(function () {
      $("#answer4").slideToggle("slow");
    });
    $("#answer4").click(function () {
      $("#answer4").slideUp("slow");
    });
    $("#question5").click(function () {
      $("#answer5").slideToggle("slow");
    });
    $("#answer5").click(function () {
      $("#answer5").slideUp("slow");
    });

    // FAQ page opening fade, brings text slowly visible
    $(".question-area").fadeTo(1000, 1);
    $(".FAQ-header").fadeTo(300, 1);
    $(".FAQ-instruction").fadeTo(350, 1);
  }
  /****END faq.php*****/

  // Miksi Vanilla JS ei toimi!?!?!?!?
  // Hero pic auto text
  const heroAutoTextEl = document.querySelector("#hero-auto-text");
  const text = "DATADRIVERS";
  const homeLink = document.querySelector("#home-link");
  let idx = 1;
  let counter = text.length - 1;

  window.addEventListener("load", function () {
    renderText("text");
  });

  function renderText(string) {
    infoTextEl.innerHTML = string.slice(0, idx);

    idx++;

    if (idx > string.length) {
      idx = 1;
      return;
    }
    setTimeout(() => renderText(text), 1000);
  }
});
