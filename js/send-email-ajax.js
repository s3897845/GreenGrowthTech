var form = $('#contact-form');

$(document).ready(function () {
  form.submit(function (e) {
    e.preventDefault();
    sendEmail();
  });
});

function sendEmail() {
  var dataStr = form.serialize();
  $.ajax({
    type: "POST",
    url: "send-email.php",
    data: dataStr,
    success: function (result) {
      if (result == "success") {
        form.trigger("reset");
        showMessage(true, "Your message has been sent.");
      } else {
        showMessage(false, result);
      }
    }
  });
}

function showMessage(valid, msg) {
  var msgClasses;
  if (valid) {
    msgClasses = "alert alert-success";
  } else {
    msgClasses = "alert alert-danger";
  }
  $("#result-message")
    .removeClass()
    .addClass(msgClasses)
    .text(msg);
}