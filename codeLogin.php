<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once("connections/connection.php");

$con = connection();

// $connection = mysqli_connect("localhost", "root", "", "db_web");

if (isset($_POST['login_btn'])) {
    $login_email = $_POST['user_email'];
    $login_password = $_POST['user_password'];

    $query = "SELECT * FROM users WHERE email = '$login_email' AND password = '$login_password'";
    $query_run = mysqli_query($con, $query);
    $row=mysqli_fetch_array($query_run);

    if($row['role'] == 1){
        $_SESSION['UserEmail'] = $row['email'];
        $_SESSION['UserId'] = $row['user_id'];
        $_SESSION['UserRole'] = $row['role'];
        header('Location: ./Guidance_Counselor_UI/gc___dashboard.php');
    }elseif($row["role"] == 2){
        $_SESSION['UserEmail'] = $row['email'];
        $_SESSION['UserId'] = $row['user_id'];
        $_SESSION['UserRole'] = $row['role'];
        header('Location: ./Staff_UI/staff___dashboard.php');
    }elseif($row["role"] == 3){
        $_SESSION['UserEmail'] = $row['email'];
        $_SESSION['UserId'] = $row['user_id'];
        $_SESSION['UserRole'] = $row['role'];
        header('Location: ./Student_UI/stud___dashboard.php');
    }elseif($row["role"] == 4){
        $_SESSION['UserEmail'] = $row['email'];
        $_SESSION['UserId'] = $row['user_id'];
        $_SESSION['UserRole'] = $row['role'];
        header('Location: ./Guidance_Counselor_UI/gc___dashboard.php');
    }
    
    else {
        $_SESSION['status'] = 'Email Address / Password is Invalid';
        header('Location: homepage___login.php');
    }

    
}
?>