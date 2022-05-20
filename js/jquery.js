// Establshing no conflict just in case. $ for jQuery works only inside ready function
$.noConflict();
jQuery(document).ready(function ($) {
  /* =========================
  === FEEDBACK LOAD TESTS AJAX ===
  ==========================*/
  load_students();

  function load_students(query) {
    $.ajax({
      url: "ajax/load_tests.php",
      method: "POST",
      data: { query: query },
      success: function (data) {
        $("#search-result").html(data);
      },
    });
  }

  $("#search-text").keyup(function () {
    $("#search-result").removeClass("d-none");
    var searchTxt = $(this).val();
    if (searchTxt != "") {
      load_students(searchTxt);
    } else {
      load_students();
    }
    $("html, body").animate(
      {
        scrollTop: $("#header-feedback"),
      },
      300,
      "swing"
    );
  });

  /* =========================
  === FEEDBACK update feedback ===
  ==========================*/
  function sendFeedback(hiddenID, t_feedback) {
    $.ajax({
      url: "ajax/send_feedback.php",
      method: "POST",
      data: { hiddenID: hiddenID, t_feedback: t_feedback },
      success: function (data) {
        $("#current_t_feedback").html(data);
      },
    });
  }

  $("#submit-feedback").click(function () {
    console.log("submit-feedback");
    var hiddenID = $("#hiddenTestID").val();
    var t_feedback = $(this).parent().prev().val();

    if (t_feedback != "") {
      sendFeedback(hiddenID, t_feedback);
    } else {
      alert("Please fill the feedback!");
    }
  });

  /* =========================
  === FEEDBACK delete feedback ===
  ==========================*/
  function deleteFeedback(hiddenID, t_feedback) {
    $.ajax({
      url: "ajax/delete_feedback.php",
      method: "POST",
      data: { hiddenID: hiddenID, t_feedback: t_feedback },
      success: function (data) {
        $("#current_t_feedback").html(data);
      },
    });
  }

  $("#delete-icon").click(function () {
    var hiddenID = $("#hiddenTestID").val();
    var t_feedback = $(this).parent().prev().val();

    if ($("#current_t_feedback").html() == "") {
      alert("Feedback is empty already!");
    } else {
      deleteFeedback(hiddenID, t_feedback);
    }
  });

  /*===========================*/
  /*===========================*/
  /*===========================*/

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

  /******************/
  /**    FEEDBACK   **/
  /*******************/
  $(".student-body").hide();
  $(".student-name").click(function () {
    $(this).parent().parent().next(".student-body").fadeToggle("400", "swing");
  });

  // search - table - body;
  // search - table - heading;
  // $(".search-table-body").hide();
});
