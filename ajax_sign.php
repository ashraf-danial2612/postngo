<?php
    require_once "connect.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $postcd = mysqli_real_escape_string($conn, $_POST['postcd']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $qry = mysqli_query($conn, "SELECT * FROM customers WHERE cust_email = '".$email."'");
    $result = mysqli_fetch_array($qry);
    if ($result > 0)
    {
        echo "fail";
    }
    else{
        mysqli_query($conn, "INSERT INTO customers (types, cust_email, cust_password, cust_fname, cust_lname, cust_phone, cust_address, cust_postcode, cust_state)
        VALUES ('customer', '".$email."', '".$password."', '".$fname."', '".$lname."', '".$phone."', '".$address."', '".$postcd."', '".$state."')");
        echo "success";
    }
?>
