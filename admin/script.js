$(document).ready(() => {
  $("#add-cat-btn").on("click", function (e) {
    // e.preventDefault();
    var dataString = $("#addCat").serialize();
    // console.log(dataString);
    $("#addCat").validate({
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
        // console.log(dataString);
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
              location.reload();
            }
            if (res == 201) {
              alert("Added Category Successfully!!");
              window.location.href = "./categories.php";
              //   console.log("logged In");
            }
          },
        });
      },
    });
  });

  $("#edit-cat-btn").on("click", function (e) {
    // e.preventDefault();
    var dataString = $("#editCat").serialize();
    // console.log(dataString);
    $("#editCat").validate({
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
        // console.log(dataString);
        $.ajax({
          url: "../Config/editCat.php",
          method: "POST",
          data: dataString,
          success: function (res) {
            if (res == 400) {
              alert("Something Went Wrong!!");
            }
            if (res == 201) {
              alert("Category Updated Successfully!!");
              window.location.href = "./categories.php";
              //   console.log("logged In");
            }
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
              window.location.href = "./index.php";
            }
          },
        });
      },
    });
  });

  $("#addProd").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "../Config/addProd.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (res) {
        if (res == 400) {
          alert("Something Went Wrong!!");
        }
        if (res == 201) {
          alert("Product Added Successfully!!");
          window.location.href = "./products.php";
          $("#addProd")[0].reset();
        }
      },
    });
  });

  $("#editProd").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "../Config/editProd.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (res) {
        console.log(res);
        if (res == 400) {
          alert("Something Went Wrong!!");
        }
        if (res == 201) {
          alert("Product Updated Successfully!!");
          window.location.href = "./products.php";
          $("#editProd")[0].reset();
        }
      },
    });
  });

  $(".delete-btn").on("click", function (e) {
    if (confirm("Are You Sure You Want to delete this ??? ")) {
      $.ajax({
        url: "../Config/delete.php",
        method: "POST",
        data: "product&id=" + this.id + "&tbl=" + "product",
        success: function (res) {
          console.log(res);
          if (res == 200) {
            alert("Product Deleted Successfully!!");
            location.reload();
          } else if (res == 1451) {
            alert("There are previous orders depending on it!!");
          } else {
            alert(res);
          }
        },
      });
    }
  });

  $(".delete-order-btn").on("click", function (e) {
    if (confirm("Are You Sure You Want to delete this Order ??? ")) {
      $.ajax({
        url: "../Config/delete.php",
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

  $(".delete-user-btn").on("click", function (e) {
    if (confirm("Are You Sure You Want to delete this user ??? ")) {
      $.ajax({
        url: "../Config/delete.php",
        method: "POST",
        data: "user&id=" + this.id + "&tbl=" + "user",
        success: function (res) {
          console.log(res);
          if (res == 200) {
            alert("User Deleted Successfully!!");
            location.reload();
          } else {
            alert(res);
          }
        },
      });
    }
  });

  $(".delete-cat-btn").on("click", function (e) {
    $.ajax({
      url: "../Config/delete.php",
      method: "POST",
      data: "cat&id=" + this.id + "&tbl=" + "category",
      success: function (res) {
        if (res == 200) {
          alert("Category Deleted Successfully!!");
          location.reload();
        } else if (res == 1451) {
          alert(
            "Category Cannot be deleted as There are products depending on it!!"
          );
        } else {
          alert(res);
        }
      },
    });
  });
});
