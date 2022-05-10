"use strict";

$(document).ready(function () {
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
});


// FAQ starts

$(document).ready(function() {
  $("#question1").click(function() {
      $("#answer1").slideToggle("slow");
  });
  $("#answer1").click(function() {
      $("#answer1").slideUp("slow");
  });
  $("#question2").click(function() {
    $("#answer2").slideToggle("slow");
  });
  $("#answer2").click(function() {
    $("#answer2").slideUp("slow");
  });
  $("#question3").click(function() {
   $("#answer3").slideToggle("slow");
  });
  $("#answer3").click(function() {
   $("#answer3").slideUp("slow");
  });
  $("#question4").click(function() {
    $("#answer4").slideToggle("slow");
  });
  $("#answer4").click(function() {
    $("#answer4").slideUp("slow");
  });
  $("#question5").click(function() {
    $("#answer5").slideToggle("slow");
  });
  $("#answer5").click(function() {
    $("#answer5").slideUp("slow");
  });
});

$(document).ready(function() {  
  $(".question-area").fadeTo(1000, 1); //tuo kysymykset hitaasti esiin
  $(".FAQ-header").fadeTo(300, 1); 
  $(".FAQ-instruction").fadeTo(350, 1); 
});

// FAQ ends