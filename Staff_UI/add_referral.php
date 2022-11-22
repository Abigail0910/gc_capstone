<?php 

session_start();

include_once("../connections/connection.php");

if(!isset($_SESSION['UserEmail'])){
        
    echo "<script>window.open('../homepage___login.php','_self')</script>";
    
} else {

  $con = connection();

if (isset($_POST['add_refferal'])) {

$UserId = $_SESSION['UserId'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$level = $_POST['level'];
$program = $_POST['program'];

$get_student = "SELECT * from users WHERE last_name LIKE '$last_name' AND first_name LIKE '$first_name' AND level LIKE '$level' AND program LIKE '$program'";
$find_id = $con->query($get_student) or die ($con->error);
$stud_id = $find_id->fetch_assoc();

if ($stud_id > 0) {
$reffered_user = $stud_id['user_id'];
$source = $_POST['source'];
// $reffered_by = $_POST['reffered_by'];
$reffered_date = $_POST['reffered_date'];
$nature = $_POST['nature'];
$reason = $_POST['reason']; 
$actions = $_POST['actions'];
$remarks = $_POST['remarks'];
$status = "Pending";

$add_query = "INSERT INTO `refferals` (`reffered_user`,`source`, `reffered_by`, `reffered_date`, `nature`, `reason`, `actions`, `remarks`, `ref_status`) ".
        "VALUES ('$reffered_user','$source','$UserId','$reffered_date','$nature','$reason','$actions','$remarks','$status')";
$con->query($add_query) or die ($con->error);
header("Location: staff___set_referral.php");

} else {
    echo "Student is not existed.";
}

}

}