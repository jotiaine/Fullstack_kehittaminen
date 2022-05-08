"use strict";
$(document).ready(function () {
  $("#student").click(() => {
    $("#myModal").hide();
  });

  $("#student").click(() => {
    $("#teacher").hide();
    $("#student").hide();
    $("#studentForm").removeClass("d-none");
    $("#goBackBtn").removeClass("d-none");
  });

  $("#goBackBtn").click("d-none");
});
