<?php
// database connection
include("config.php");

if($_POST['submit']) {

    if(!isset($_POST['name']) || empty($_POST['name'])) {
        die("Name filed is required");
    }

    $id = $_POST['id'];
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = $_POST['fname'];
    $cnic = $_POST['cnic'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];


    $sql = "UPDATE students SET name='$name', cnic='$cnic',mobile='$mobile',  father_name='$fname', gender='$gender' WHERE id=$id";

    if(mysqli_query($db_con, $sql)) {

        header("Location: insert.php");

       

    }

}




?>