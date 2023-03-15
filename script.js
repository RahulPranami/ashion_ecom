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
              window.location.href = "./admin/index.php";
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

  $("#productModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var name = button.data("productname");
    var price = button.data("productprice");
    var desc = button.data("productdesc");
    var img = button.data("setbg"); // Extract info from data-* attributes
    var id = button.data("id");

    var modal = $(this);

    modal.find("#productname").text(name);
    $("#productImage").attr("src", img);

    $("#buyNow").attr("href", "./checkout.php?pid=" + id);
    $("#seeMore").attr("href", "./product-details.php?pid=" + id);

    modal.find("#productPrice").text(price);
    modal.find("#productDesc").text(desc);
  });

  // $(".cart__quantity .pro-qty").on("click", function (e) {
  //   // console.log(this.children[1].value);
  //   let pid = this.getAttribute("id");
  //   qty = this.children[1].value;

  //   let subtotal = this.parentNode.nextElementSibling.children[0].textContent;
  //   // console.log(subtotal);

  //   type = "update";

  //   $.ajax({
  //     url: "./Config/manageCart.php",
  //     method: "POST",
  //     data: "productId=" + pid + "&qty=" + qty + "&type=" + type,
  //     success: function (res) {
  //       //     // $("#cart_qty").text(res);
  //       // subtotal = res;
  //       //     location.reload();
  //     },
  //   });
  // });

  $(".cart__quantity .pro-qty").on("click", function (e) {
    // console.log(this.children[1].value);
    let pid = this.getAttribute("id");
    qty = this.children[1].value;

    type = "update";

    $.ajax({
      url: "./Config/manageCart.php",
      method: "POST",
      data: "productId=" + pid + "&qty=" + qty + "&type=" + type,
      success: function (res) {
        // $("#cart_qty").text(res);
        location.reload();
      },
    });
  });

  $(".icon_close").on("click", function (e) {
    let pid = this.getAttribute("value");
    // let pid = $(this).attr("value");
    let type = "remove";
    // let tr = this.parentNode.parentNode;
    // console.log(tr);

    $.ajax({
      url: "./Config/manageCart.php",
      method: "POST",
      data: "productId=" + pid + "&type=" + type,
      success: function (res) {
        // $("#cart_qty").text(res);
        // $("#cart_qty").text(res);
        // tr.remove();

        if (res == 200) {
          alert("Item Deleted Successfully");
        } else if (res) location.reload();
      },
    });
  });

  // checkoutForm;
  $("#checkoutForm").on("submit", function (e) {
    e.preventDefault();
    // var dataString = $("#checkoutForm").serialize();
    let formData = new FormData(this);

    console.log(formData);

    $.ajax({
      url: "./Config/checkout.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (res) {
        console.log(res);
        if (res == 201) {
          // alert("Signed Up Successfully!!");
          window.location.href = "./thankyou.php";
        } else {
          alert("Something Went Wrong!!" + res);
        }
      },
    });
  });
});

function addToCart(pid, type, qty = 1) {
  $.ajax({
    url: "./Config/manageCart.php",
    method: "POST",
    data: "productId=" + pid + "&qty=" + qty + "&type=" + type,
    // data: "productId=" + pid + "&type=" + type,
    success: function (res) {
      console.log(res);
      if (res == 200) {
        alert("Product Added Successfully");
      } else if (res == 1062) {
        alert("Product Already Exists !!!");
      } else {
        alert("Something Went Wrong !!!");
      }
      // console.log(res);
      // $("#cart_qty").text(res);
    },
  });
}
