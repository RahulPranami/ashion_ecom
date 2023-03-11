$(document).ready(() => {
  $("#add-cat-btn").on("click", function (e) {
    // e.preventDefault();
    var dataString = $("#addCat").serialize();
    // console.log(dataString);
    $("#update").validate({
      rules: {
        name: {
          required: true,
          minlength: 2,
        },
      },
      messages: {
        name: "This field is required",
      },
      submitHandler: function () {
        console.log(dataString);
        $.ajax({
          url: "../Config/addCat.php",
          method: "POST",
          data: dataString,
          success: function (res) {
            if (res == 400) {
              alert("Something Went Wrong!!");
            }
            if (res == 303) {
              alert("Category already Exists!!");
              //   location.reload();
            }
            if (res == 201) {
              alert("Added Category Successfully!!");
              window.location.href = "./categories.php";
              //   console.log("logged In");
            }
            // if (res == 400) {
            //   alert("Something Went Wrong!!");
            // }
            // if (res == 201) {
            //   alert("Data Updated Successfully!!");
            //   window.location.href = "./profile.php";
            // }
          },
        });
      },
    });
  });

  $("#update-btn").on("click", function (e) {
    // e.preventDefault();
    var dataString = $("#update").serialize();
    $("#update").validate({
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
      },
      messages: {
        name: "This field is required",
        email: {
          email: "Enter a valid email",
          required: "This field is required",
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
          url: "../Config/update.php",
          method: "POST",
          data: dataString,
          success: function (res) {
            if (res == 400) {
              alert("Something Went Wrong!!");
            }
            if (res == 201) {
              alert("Data Updated Successfully!!");
              window.location.href = "./profile.php";
            }
          },
        });
      },
    });
  });
});
