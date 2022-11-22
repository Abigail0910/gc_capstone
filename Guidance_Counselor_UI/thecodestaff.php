<?php
session_start();

include_once("../connections/connection.php");

if (!isset($_SESSION['UserEmail'])) {

echo "<script>window.open('../homepage___login.php','_self')</script>";

} else {

$con = connection();

//this is for registering the staff profile in the database
if (isset($_POST['add_staff'])) {

    $staff_id = $_POST['staff_id'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $department = $_POST['department'];

    ($_POST['position'] != null) ? $position = $_POST['position'] : $position = null;
    // ($_POST['academic_position']) ? $position = $_POST['academic_position'] : $position = $_POST['admin_position'];

    $email = strtoupper(str_replace(' ', '', $last_name)) . "." . substr($staff_id, -6) . "@angeles.sti.edu.ph";
    $full_name = ucwords($first_name . " " . $last_name);
    $name_initial = explode(' ', $full_name);

        $initial = "";
        foreach($name_initial as $n){
            $initial .= $n[0];
        }

    // $position = $_POST['academic_position'] || $_POST['admin_position'];
    $password = $initial . substr($staff_id, -6);
    $status = "Active";
    $role = "2";

    // $image = $_FILES['image']['name'];
    // $temp_name = $_FILES['image']['tmp_name'];
    // move_uploaded_file($temp_name, "img/student/$image");

    $add_staff = "INSERT INTO users (`id_number`, `last_name`, `first_name`, `middle_name`, `address`, `contact`, `department`, " .
        "`position`, `status`, `email`, `password`, `role`) " .
        "VALUES ('$staff_id','$last_name','$first_name','$middle_name','$address','$contact','$department', " .
        "'$position','$status','$email','$password','$role')";
    $query_run = $con->query($add_staff) or die($con->error);

    if ($query_run) {
        // echo "Saved";
        $_SESSION['status'] = "Profile Added";
        $_SESSION['status_code'] = "success";
        header('Location: gc___all-staff.php');
    } else {
        // echo "Not saved";
        $_SESSION['status'] = "Profile Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: gc___all-staff.php');
    }
}







if (isset($_POST['register_gc_staff-btn'])) {

    $Gc_id = $_POST['gc_id'];
    $Gc_fname = $_POST['gc_fname'];
    $Gc_lname = $_POST['gc_lname'];
    $Gc_mname = $_POST['gc_mname'];
    $Gc_address = $_POST['gc_address'];
    $Gc_contact = $_POST['gc_contact'];
    // $staff_position = $_POST['staff_position'];
    // $user_role = $_POST['usertype'];


    $query = "INSERT INTO gc_tbl (GC_ID, GC_FNAME, GC_LNAME, GC_MNAME, GC_ADDRESS, GC_CONTACT)
    VALUES ('$Gc_id','$Gc_fname','$Gc_lname', '$Gc_mname', '$Gc_address', '$Gc_contact')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        // echo "Saved";
        $_SESSION['status'] = "Profile Added";
        $_SESSION['status_code'] = "success";
        header('Location: gc___main-all-gc.php');
    } else {
        // echo "Not saved";
        $_SESSION['status'] = "Profile Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: gc___main-all-gc.php');
    }
}

}
?>