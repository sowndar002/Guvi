
const userEmail = localStorage.getItem("userEmail");
const password = localStorage.getItem("password");

document.getElementById("userName").value = userEmail;
document.getElementById("phone_No").value = phone_No;

$("#updateButton").click(function (ev) {
  ev.preventDefault();
  var form = $("formId");

  var url = "http://localhost/guvi/php/profile.php";

  $.ajax({
    method: "POST",
    url: url,
    data: form.serialize(),
    dataType: "text",
    success: function (data) {
      console.log("Profile updated successfully");
    },
    error: function (data) {
      console.error("Error updating profile");
    },
  });
});
