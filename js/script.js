"use strict";

$(document).ready(function () {
  openModal();

  function openModal() {
    $isTeacher = false;
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

    // After submitting student form
    $("#submit-student-btn").click(() => {
      $("#myModal").addClass("d-none");
    });

    // Choosing Teacher user
    $("#teacher").click(() => {
      $isTeacher = true;
      if ($isTeacher) {
        $("#myModal").addClass("d-none");

        // Hide test.php when teacher user
        $("#test-page").addClass("d-none");

        // Teacher näkymä kuntoon!
      }
    });
  }
});
