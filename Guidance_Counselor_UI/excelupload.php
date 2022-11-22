<?php
session_start();

include_once("../connections/connection.php");

if (!isset($_SESSION['UserEmail'])) {

    echo "<script>window.open('../homepage___login.php','_self')</script>";
} else {

    $con = connection();

require 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['add_stud_data'])) {
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if(in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];

        /** Load $inputFileName to a Spreadsheet object **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        
        foreach($data as $row) {
            // if($count > 0)
            // {
                $stud_id = $row[0];
                $last_name = $row[1];
                $first_name = $row[2];
                $middle_name = $row[3];
                $address = $row[4];
                $contact = $row[5];
                $program = $row[6];
                $level = $row[7];

            $email = strtoupper(str_replace(' ', '', $last_name)) . "." . substr($stud_id, -6) . "@angeles.sti.edu.ph";
            $full_name = ucwords($first_name . " " . $last_name);
            $name_initial = explode(' ', $full_name);

                $initial = "";
                foreach($name_initial as $n) {
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
            // $msg = true;
        }

        if(isset($query_run))
        {
            $_SESSION['message'] = "Successfully imported";
            $_SESSION['status_code'] = "success";
            header('Location: gc___all-students.php');
            // exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not imported";
            $_SESSION['status_code'] = "error";
            header('Location: gc___all-students.php');
            // exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        $_SESSION['status_code'] = "warning";
        header('Location: gc___all-students.php');
        // exit(0);
    }
}

}

?>