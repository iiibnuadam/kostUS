<?php
session_start();
require "config.php";



//Operation nya
$op = isset($_GET['op']) ? $_GET['op'] : null;

if ($op == "custombooks") {
    $name = $_POST['name'];
    $packet = $_POST['packet'];
    $qty = $_POST['qty'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];
    $datein = $_POST['datein'];
    $dateout = $_POST['dateout'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $status = "Waiting";

    $sql = "INSERT INTO `custom_books` (`id_csbook`, `name`, `packet`,`qty`,`notes`,`date`, `in_date`, `out_date`,`duration`, `price`, `status`)
    VALUES (  NULL   , ' " . $name . " ',' " . $packet . " ', ' " . $qty . " ',' " . $notes . " ',' " . $date . " ',' " . $datein . " ',' " . $dateout . " ',' " . $duration . " ','" . $price . "', '" . $status . "');";

    $result = $connect->query($sql);
    if ($result) {

        echo "<script>window.location.href='../user/my_reservation.php'; alert('Booked Successfull !');</script>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
}
if ($op == "quickbooks") {
    $name = $_POST['name'];
    $packet = $_POST['packet'];
    $qty = $_POST['qty'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];
    $duration = "1 Year";
    $price = $_POST['price'];
    $status = "Waiting";

    $sql = "INSERT INTO `books` (`id_book`, `name`, `packet`,`qty`,`notes`,`date`,`duration`, `price`, `status`) 
    VALUES (  NULL   , ' " . $name . " ',' " . $packet . " ', ' " . $qty . " ',' " . $notes . " ',' " . $date . " ',' " . $duration . " ','" . $price . "', '" . $status . "');";

    $result = $connect->query($sql);
    if ($result) {

        echo "<script>window.location.href='../user/my_reservation.php'; alert('Booked Successfull !');</script>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
}
if ($op == "sendmessage") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $date = $_POST['date'];

    $sql = "INSERT INTO `message` (`id_message`, `name`, `email`,`subject`,`subText`,`date`) 
    VALUES (  NULL   , ' " . $name . " ',' " . $email . " ', ' " . $subject . " ',' " . $message . " ',' " . $date . " ');";

    $result = $connect->query($sql);
    if ($result) {

        echo "<script>window.location.href='../index.php'; alert('Messsage sent !');</script>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
}
if ($op == "sendmessageuser") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $date = $_POST['date'];

    $sql = "INSERT INTO `message` (`id_message`, `name`, `email`,`subject`,`subText`,`date`) 
    VALUES (  NULL   , ' " . $name . " ',' " . $email . " ', ' " . $subject . " ',' " . $message . " ',' " . $date . " ');";

    $result = $connect->query($sql);
    if ($result) {

        echo "<script>window.location.href='../user/index.php'; alert('Messsage sent !');</script>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
}
if ($op == "edituser") {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "UPDATE `user` SET `name`='$name', `email`='$email',`address`='$address',`city`='$city',`postcode`='$postcode',`phone`='$phone',`password`= '$password' WHERE `username`='$username'";

    $result = $connect->query($sql);
    if ($result) {

        echo "<script>window.location.href='../admin/index.php?page=manage_user'; alert('Edited Success!');</script>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
}
if ($op == "deleteuser") {
    $username = $_GET['username'];

    $sql = "DELETE FROM `user` WHERE `username`='$username'";
    if ($connect->query($sql) === TRUE) {
        echo "<script>window.location.href='../admin/index.php?page=manage_user'; alert('Deleted Success!');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $connect->close();
}
if ($op == "editquickb") {
    $id_book = $_POST['id_book'];
    $name = $_POST['name'];
    $packet = $_POST['packet'];
    $qty = $_POST['qty'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sql = "UPDATE `books` SET `name`='$name', `packet`='$packet',`qty`='$qty',`notes`='$notes',`date`='$date',`duration`='$duration',`price`= '$price',`status`= '$status' WHERE `id_book`='$id_book'";

    $result = $connect->query($sql);
    if ($result) {
        echo "<script>window.location.href='../admin/index.php?page=manage_quickb'; alert('Edited Success!');</script>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
}
if ($op == "deletequickb") {
    $id_book = $_GET['id_book'];

    $sql = "DELETE FROM `books` WHERE `id_book`='$id_book'";
    if ($connect->query($sql) === TRUE) {
        echo "<script>window.location.href='../admin/index.php?page=manage_quickb'; alert('Deleted Success!');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $connect->close();
}
if ($op == "editcustomb") {
    $id_csbook = $_POST['id_csbook'];
    $name = $_POST['name'];
    $packet = $_POST['packet'];
    $qty = $_POST['qty'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];
    $indate = $_POST['indate'];
    $outdate = $_POST['outdate'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sql = "UPDATE `custom_books` SET `name`='$name', `packet`='$packet',`qty`='$qty',`notes`='$notes',`date`='$date',`in_date`='$indate',`out_date`='$outdate',`duration`='$duration',`price`= '$price',`status`= '$status' WHERE `id_csbook`='$id_csbook'";

    $result = $connect->query($sql);
    if ($result) {
        echo "<script>window.location.href='../admin/index.php?page=manage_customb'; alert('Edited Success!');</script>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
}
if ($op == "deletecustomb") {
    $id_csbook = $_GET['id_csbook'];

    $sql = "DELETE FROM `custom_books` WHERE `id_csbook`='$id_csbook'";
    if ($connect->query($sql) === TRUE) {
        echo "<script>window.location.href='../admin/index.php?page=manage_customb'; alert('Deleted Success!');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $connect->close();
}
if ($op == "editmessage") {
    $id_message = $_POST['id_message'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];

    $sql = "UPDATE `message` SET `name`='$name', `email`='$email',`subject`='$subject',`subText`='$notes',`date`='$date'WHERE `id_message`='$id_message'";

    $result = $connect->query($sql);
    if ($result) {
        echo "<script>window.location.href='../admin/index.php?page=manage_message'; alert('Edited Success!');</script>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $connect->error;
    }
    $connect->close();
}
if ($op == "deletemessage") {
    $id_message = $_GET['id_message'];

    $sql = "DELETE FROM `message` WHERE `id_message`='$id_message'";
    if ($connect->query($sql) === TRUE) {
        echo "<script>window.location.href='../admin/index.php?page=manage_customb'; alert('Deleted Success!');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $connect->close();
}
