<?php
include_once "./config.php";

$ecomm = new ECOMM();

// print_r($_POST);
$ecomm->addProduct($_POST['name'], $_POST['categoryId'], $_POST['description'], $_POST['price'], $_FILES['image']['name'], $_FILES['image']['tmp_name']);

// $fname = $_POST['FirstName'];
// $lname = $_POST['LastName'];
// $email = $_POST['Email'];
// $number = $_POST['PhoneNumber'];
// $bdate = $_POST['birthdate'];
// $gender = $_POST['gender'];
// $passwd = $_POST['Password'];
// $img = $_FILES['image']['name'];
// $tmp_name = $_FILES['image']['tmp_name'];

// $file = "images/" . $img;
// move_uploaded_file($tmp_name, $file);

// $insert = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `password`, `birthdate`, `image`, `gender`, `mobile`) VALUES ('$fname','$lname','$email','$passwd','$bdate','$file','$gender','$number');";

// if ($this->conn->query($insert)) {
//     echo "<script>alert('Data Added Sussfully');</script>";
//     header('location: ./loggedIn.php');
// } else {
//     echo $this->conn->error;
//     echo "<script>console.log('Data Not Added');</script>";
// }

// echo "Hello";
// print_r($_POST);
// print_r($_FILES);
