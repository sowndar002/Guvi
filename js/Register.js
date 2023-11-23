$("#registerButton").click(function (ev) {
  ev.preventDefault();
  var form = $("#formId");

  var url = "http://localhost/guvi/php/register.php";

  $.ajax({
    method: "POST",
    url: url,
    data: form.serialize(),
    dataType: 'text',
    success: function (data) {
      if(data.includes("Successfully Logged..")){
        window.location.href="login.html";
      }
    },
    error: function (data) {
      alert("Some error");
    },
  });
});
