<?php
$name = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$phone = $_POST['number'];
$password = $_POST['password'];
$rePass = $_POST['repeatPassword'];
$date = $_POST['date'];

require("config.php");
$sql = "INSERT INTO `user` (`username`, `name`, `email`,`address`,`city`,`postcode`,`phone`,`password`, `date`,`level`)
 VALUES ('" . $username . "', '" . $name . "','" . $email . "', '" . $address . "','" . $city . "','" . $postcode . "','" . $phone . "','" . $password . "','" . $date . "','2');";

if ($password == $rePass) {
    $result = $connect->query($sql);
    if ($result) {

        echo "<script>window.location.href='../login.php'; alert('Registration Success!');</script>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
} else {
    echo "<script>window.location.href='../register.php'; alert('Password  harus sama!');</script>";
}
