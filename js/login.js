$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();

        $.ajax({
            type: "POST",
            url: "http://localhost/guvi/php/login.php",
            data: { login: true, email: email, password: password },
            success: function (response) {
                if (response && response.status === "success") {
                    localStorage.setItem('userName', response.email);
                    localStorage.setItem('phone_No', response.phone_No);
                    console.log("Successfully Logged");
                    window.location.href = "profile.html";
                } else {
                    alert(response && response.message ? response.message : 'Some error occurred');
                    console.log("Some error ");
                }
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
                console.error(xhr.responseText);
            }
        });
    });
});
