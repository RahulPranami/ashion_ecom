$(document).ready(() => {
  // NOTE: Login
  $("#login-btn").on("click", function (e) {
    // e.preventDefault();
    // var dataString = $("#login").serialize();

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
        var dataString = $("#login").serialize();
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
              window.location.href = "./index.php";
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

  // NOTE: Signup
  $(".alert").hide();

  $("#signup-btn").on("click", function (e) {
    // e.preventDefault();

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
          // $(placement).append(error);
          $(placement).text(error.text());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function () {
        var dataString = $("#signup").serialize();
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
              // alert("User already Exists!!");
              $("#emailErr").text("User already Exists!!");
              $("#email").focus();
            }
            if (res == 201) {
              // alert("Signed Up Successfully!!");
              $("#success-alert").show();
              // $("#success-alert").alert();
              $(".alert")
                .delay(2000)
                .slideUp(200, function () {
                  $(this).alert("close");
                });
              // window.location.href = "./login.php";
              //   console.log("logged In");
              document.querySelector("form").reset();
            }
          },
        });
      },
    });
  });

  // NOTE: Product Modal
  $("#productModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var name = button.data("productname");
    var price = button.data("productprice");
    var desc = button.data("productdesc");
    var img = button.data("setbg"); // Extract info from data-* attributes
    var id = button.data("id");
    var availability = button.data("availability");

    var modal = $(this);
    console.log(availability);
    // console.log(this);

    modal.find("#productname").text(name);
    $("#productImage").attr("src", img);

    // availability == 0 ? "out_of_stock" : "";

    $("#buyNow").attr(
      "href",
      availability == 0 ? "javascript:void(0)" : "./checkout.php?buyNow=" + id
    );
    // $("#buyNow").attr("class", availability == 0 ? "out_of_stock" : "");
    $("#buyNow").attr(
      "class",
      availability == 0
        ? "btn btn-outline-danger out_of_stock"
        : "btn btn-outline-success"
    );
    $("#seeMore").attr("href", "./product-details.php?pid=" + id);

    modal.find("#productPrice").text(price);
    modal.find("#productDesc").text(desc);
  });

  // NOTE: cart Quantity update
  $(".cart__quantity .pro-qty").on("click", function (e) {
    let pid = this.getAttribute("id");
    qty = this.children[1].value;

    type = "update";

    $.ajax({
      url: "./Config/manageCart.php",
      method: "POST",
      data: "productId=" + pid + "&qty=" + qty + "&type=" + type,
      success: function (res) {
        // $("#cart_qty").text(res);
        if (res == 200) {
          // alert("Cart Updated SuccessFully");
          location.reload();
        } else if (res == 429) {
          alert("Product Does Not Have That Much Stock !!!");
          location.reload();
        } else {
          alert(res);
        }
      },
    });
  });

  // NOTE: Cart item remove
  $(".icon_close").on("click", function (e) {
    let pid = this.getAttribute("value");
    let type = "remove";

    if (confirm("Are You Sure You want to delete this product")) {
      $.ajax({
        url: "./Config/manageCart.php",
        method: "POST",
        data: "productId=" + pid + "&type=" + type,
        success: function (res) {
          if (res == 200) {
            alert("Item Deleted Successfully");
            location.reload();
          } else if (res) {
            alert(res);
          }
        },
      });
    }
  });

  // NOTE: order Delete button
  $(".delete-order-btn").on("click", function (e) {
    if (confirm("Are You Sure You Want to Delete Order ??")) {
      $.ajax({
        url: "./Config/delete.php",
        method: "POST",
        data: "order&id=" + this.id + "&tbl=" + "orders",
        success: function (res) {
          console.log(res);
          if (res == 200) {
            alert("Order Deleted Successfully!!");
            location.reload();
          } else {
            alert(res);
          }
        },
      });
    }
  });

  // NOTE: empty Cart Button
  $("#emptyCart").on("click", function (e) {
    let type = "empty";
    if (confirm("Are You Sure You Want to Empty Cart ??")) {
      $.ajax({
        url: "./Config/manageCart.php",
        method: "POST",
        data: "type=" + type,
        success: function (res) {
          if (res == 200) {
            alert("Cart Is Empty Now !!!");
            location.reload();
          } else if (res) {
            alert(res);
          }
        },
      });
    }
  });

  // NOTE: add to cart button
  $(".addToCart").on("click", function (e) {
    let pid = this.getAttribute("id");
    let qty = this.getAttribute("qty") ?? document.getElementById("qty").value;
    let type = "add";

    if (qty == "0") {
      // alert("Product Is Out Of Stock !!!");
      return;
    }
    $.ajax({
      url: "./Config/manageCart.php",
      method: "POST",
      data: "productId=" + pid + "&qty=" + qty + "&type=" + type,
      success: function (res) {
        console.log(res);
        if (res == 200) {
          // alert("Product Added Successfully");
          location.reload();
        } else if (res == 1062) {
          // alert("Product Already Exists !!!");
        } else if (res == 404) {
          location.href = "./login.php";
          // alert("Product Already Exists !!!");
        } else if (res == 429) {
          alert("Product Does Not Have That Much Stock !!!");
        } else {
          alert("Something Went Wrong !!!");
          // alert("Something Went Wrong !!!" + res);
        }
      },
    });
  });

  // NOTE: Checkout Form
  $("#checkoutForm").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
      url: "./Config/checkout.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (res) {
        console.log(res);
        if (res == 201) {
          // alert(res);
          alert("Order Placed Successfully!!");
          window.location.href = "./thankyou.php";
        } else {
          alert("Something Went Wrong!!" + res);
        }
      },
    });
  });
});