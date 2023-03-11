$(document).ready(() => {
  $("#login-btn").on("click", function (e) {
    // e.preventDefault();
    var dataString = $("#login").serialize();

    $("#login").validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          //   minlength: 8,
        },
      },
      messages: {
        email: {
          email: "Enter a valid email",
          required: "This field is required",
        },
        password: {
          required: "This field is required",
          minlength: "Password must be at least 8 characters long",
        },
      },
      errorPlacement: function (error, element) {
        var placement = $(element).data("error");
        if (placement) {
          $(placement).append(error);
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function () {
        $.ajax({
          url: "./Config/login.php",
          method: "POST",
          data: dataString,
          success: function (res) {
            // console.log(res);
            if (res == 404) {
              document.getElementById("emailErr").textContent =
                "User Does not exist!!!";
            }
            if (res == 403) {
              document.getElementById("emailErr").textContent = "";
              document.getElementById("passErr").textContent =
                "Password Incorrect!!!";
            }
            if (res == 200) {
              // window.location.href = "./thankyou.php";
              //   console.log("logged In");
            }
            if (res == "user") {
              window.location.href = "./thankyou.php";
              // console.log("user");
            }
            if (res == "admin") {
              window.location.href = "./admin.php";
              // console.log("admin");
            }
          },
        });
      },
    });
  });

  $("#signup-btn").on("click", function (e) {
    // e.preventDefault();
    var dataString = $("#signup").serialize();

    $("#signup").validate({
      rules: {
        name: {
          required: true,
          minlength: 2,
        },
        email: {
          required: true,
          email: true,
        },
        number: {
          required: true,
          number: true,
          minlength: 10,
          maxlength: 10,
        },
        password: {
          required: true,
          // minlength: 8,
        },
        cpassword: {
          required: true,
          // minlength: 8,
          equalTo: "#password",
        },
      },
      messages: {
        name: "This field is required",
        email: {
          email: "Enter a valid email",
          required: "This field is required",
        },
        password: {
          required: "This field is required",
          minlength: "Password must be at least 8 characters long",
        },
      },
      errorPlacement: function (error, element) {
        var placement = $(element).data("error");
        if (placement) {
          $(placement).append(error);
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function () {
        $.ajax({
          url: "./Config/signup.php",
          method: "POST",
          data: dataString,
          success: function (res) {
            // console.log(res);

            if (res == 400) {
              alert("Something Went Wrong!!");
            }
            if (res == 303) {
              alert("User already Exists!!");
              //   location.reload();
            }
            if (res == 201) {
              alert("Signed Up Successfully!!");
              window.location.href = "./login.php";
              //   console.log("logged In");
            }
          },
        });
      },
    });
  });
});
