<?php
session_start();

include_once("../connections/connection.php");

if (!isset($_SESSION['UserEmail'])) {

    echo "<script>window.open('../homepage___login.php','_self')</script>";
} else {

    $con = connection();

if (isset($_POST['add_student'])) {

    $stud_id = $_POST['stud_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $program = $_POST['program'];
    $level = $_POST['level'];
    
    // $gender = $_POST['gender'];
    // $department = $_POST['department'];
    $email = strtoupper(str_replace(' ', '', $last_name)) . "." . substr($stud_id, -6) . "@angeles.sti.edu.ph";
    $full_name = ucwords($first_name . " " . $last_name);
    $name_initial = explode(' ', $full_name);

        $initial = "";
        foreach($name_initial as $n){
            $initial .= $n[0];
        }

    $password = $initial . substr($stud_id, -6);
    $position = "Student";
    $status = "Active";
    $role = "3";

    $add_student = "INSERT INTO users (`id_number`, `last_name`, `first_name`, `middle_name`, `address`, `contact`, " .
                "`program`, `level`, `position`, `status`, `email`, `password`, `role`) " .
                "VALUES ('$stud_id','$last_name','$first_name','$middle_name','$address','$contact','$program','$level'," .
                "'$position','$status','$email','$password','$role')";
    $query_run = $con->query($add_student) or die($con->error);

    if ($query_run) {
        // echo "Saved";
        $_SESSION['status'] = "Profile Added";
        $_SESSION['status_code'] = "success";
        header('Location: gc___all-students.php');
    } else {
        // echo "Not saved";
        $_SESSION['status'] = "Profile Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: gc___all-students.php');
    }

}

}