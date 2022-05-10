"use strict";

// Establshing no conflict just in case. $ for jQuery works only inside ready function
$.noConflict();
jQuery(document).ready(function ($) {
  // hide test form
  $("#test-container").hide();

  // hide submit test btn container
  $("#submit-btn-container").hide();

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

  /* TEST.php */
  $("#start-test-btn").click(() => {
    $("#start-btn-container").hide("slow", "linear", () => {
      $("#test-container").slideToggle("slow", "linear", () => {
        $("#submit-btn-container").show("slow");
      });
    });
  });
});
