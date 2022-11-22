<?php

session_start();

include_once("../connections/connection.php");

$con = connection();                

if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $stmt = $con->prepare("select * from appointments where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row['timeslot'];
            }
            $stmt->close();
        }
    }
}

if (isset($_GET['ref_id'])) {
    $ref_id = $_GET['ref_id'];
    $ref_query = "SELECT * FROM refferals WHERE ref_id = '$ref_id'";
    $ref_con = $con->query($ref_query) or die ($con->error);
    $row_ref = $ref_con->fetch_assoc();
    
    $reffered_user = $row_ref['reffered_user'];
    $reason = $row_ref['reason'];
    $actions = $row_ref['actions'];
    $remarks = $row_ref['remarks'];

    if($row_ref > 0) {
        $user_query = "SELECT id_number FROM users WHERE user_id = '$reffered_user'";
        $user_con = $con->query($user_query) or die ($con->error);
        $row_user = $user_con->fetch_assoc();
        $user_id_number = $row_user['id_number'];
    }
}

// for type radio button
$type = isset($_POST['type']);

// this code is for the booked time slot cannot be doubled or validation
if (isset($_POST['submit'])) {
    $timeslot = $_POST['timeslot'];
    $user_type = $_POST['user_type'];
    $id_number = $_POST['id_number'];
    $subject = $_POST['subject'];
    $type = $_POST['type'];
    $info = $_POST['info'];
    $status = "In Review";

    $search_query = "SELECT * FROM `users` WHERE id_number = '$id_number'";
    $get_s_id = $con->query($search_query) or die ($con->error);
    $row_student = $get_s_id->fetch_assoc();

    if($row_student > 0) {

        $stmt = $con->prepare("select * from appointments where date = ? AND timeslot=?");
        $stmt->bind_param('ss', $date, $timeslot);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {

                // $msg = "<div class='alert alert-danger'>Already Booked</div>";
                $_SESSION['status'] = "Already Booked";
                $_SESSION['status_code'] = "warning";
                header('Location: gc___all-appointment.php');

            } else {
                if (isset($_GET['ref_id'])) {
                    $stmt = $con->prepare("INSERT INTO appointments (date, timeslot, user_type, ref_id, id_number, subject, appointment_type, info, app_status) VALUES (?,?,?,?,?,?,?,?,?)");
                    $stmt->bind_param('sssssssss', $date, $timeslot, $user_type, $ref_id, $id_number, $subject, $type, $info, $status);
                } else {
                    $stmt = $con->prepare("INSERT INTO appointments (date, timeslot, user_type, id_number, subject, appointment_type, info, app_status) VALUES (?,?,?,?,?,?,?,?)");
                    $stmt->bind_param('ssssssss', $date, $timeslot, $user_type, $id_number, $subject, $type, $info, $status);
                }
                $stmt->execute();
                
                // Change referral status to In review after pushing to appointments table
                $stmt2 = "select * from appointments where ref_id = '$ref_id'";
                $get_stmt2 = $con->query($stmt2) or die ($con->error);
                $row_stmt2 = $get_stmt2->fetch_assoc();

                $update_ref_status = $row_stmt2['ref_id'];
                
                if($row_stmt2 > 0) {
                    $ref_query_status = "UPDATE refferals SET ref_status = '$status' WHERE ref_id = '$update_ref_status'";
                    $con->query($ref_query_status) or die ($con->error);
                }

                $_SESSION['status'] = "Booking Successful";
                $_SESSION['status_code'] = "success";
                header('Location: gc___all_appointment.php');
                // header('Location: gc___all-students.php');

                // $msg = "<div class='alert alert-success'>Booking Successfull</div>";
                $bookings[] = $timeslot;
                $stmt->close();
                $con->close();
            }
        }

    } else {
        
        echo "<script>alert('Student is not existing.')</script>";
        // echo header('Location: 404.php');
    }
}


$duration = 30;
$cleanup = 0;
$start = "08:00";
$end = "17:00";

function timeslots($duration, $cleanup, $start, $end)
{
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod > $end) {
            break;
        }

        $slots[] = $intStart->format("h:iA") . " - " . $endPeriod->format("h:iA");
    }

    return $slots;
}


?>


<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Guidance and Counseling - STI College Angeles</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- logo angeles_sti
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/sti_logo.png">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->

    <!-- this is for the tables -->
    <!-- modals CSS
            ============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- x-editor CSS
    		============================================ -->
    <link rel="stylesheet" href="css/editor/select2.css">
    <link rel="stylesheet" href="css/editor/datetimepicker.css">
    <link rel="stylesheet" href="css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="css/editor/x-editor-style.css">

    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">

    <!-- this is for the profile -->
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">

    <!-- modal CSS
		============================================ -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" > -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    
    <!-- <script>
        
    function get_student_id() {
        var form_element = document.getElementByClassName('search_student');
        var search_student = new SearchStudent();

        for(var i = 0; i < form_element.length; i++) {
            search_student.append(form_element[i].name, form_element[i].value);
        }

        document.getElementById('search').disabled = true;

        var ajax_request = new XMLHttpRequest();

        ajax_request.open('POST', 'search_student.php');

        ajax_request.send(search_student);

        ajax_request.onreadystatechange = function() {
            if(ajax.request.readyState == 4 && ajax.request.status == 200) {
                document.getElementById('search').disabled = false;
                document.getElementById('s_id_form').reset();
                document.getElementById('search_success_message').innerHTML = ajax_request.responseText;
                setTimeout(function() {
                    document.getElementById('search_success_message').innerHTML = '';
                }, 2000);

            }
        }
    }
    </script> -->

    <!-- <style>
        @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            /* Force table to not be like tables anymore */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;

            }

            .empty {
                display: none;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
                Label the data
            */
            td:nth-of-type(1):before {
                content: "Sunday";
            }

            td:nth-of-type(2):before {
                content: "Monday";
            }

            td:nth-of-type(3):before {
                content: "Tuesday";
            }

            td:nth-of-type(4):before {
                content: "Wednesday";
            }

            td:nth-of-type(5):before {
                content: "Thursday";
            }

            td:nth-of-type(6):before {
                content: "Friday";
            }

            td:nth-of-type(7):before {
                content: "Saturday";
            }


        }

        .today {
            background: yellow;
        }
    </style> -->
</head>

<body>

    <?php
    include('includes/gc___left-menu-area.php');
    include('includes/gc___top-menu-area.php');
    include('includes/gc___mobile_menu.php');
    ?>

    <!----------------------------------------- THIS IS THE MODAL FORM OF ADDING STUDENT MANUALLY ---------------------------------------------->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div id="ADD_APPOINTMENT" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Add Appointment to : <?php echo date('m/d/Y', strtotime($date)); ?></h4>
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </div>

                    <form action="" method="post">
                        <div class="modal-body">

                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Time Slot</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-inner data-custon-pick">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
                                        <label class="login2 pull-right" style="font-weight: bold;">Date</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input readonly type="text" class="form-control" value="<?php echo date('m/d/Y', strtotime($date)); ?>" name="date">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Name</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input required type="text" class="form-control" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Email</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input required type="email" class="form-control" name="email">
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">User Type</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="form-select-list">
                                            <select id="mySelect" class="form-control custom-select-value" name="user_type" onchange="changeDropdown(this.value);">
                                                <option value="Student">Student</option>
                                                <option value="Staff">Staff</option>
                                                <option value="Faculty">Faculty</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                        <label class="login2 pull-right pull-right-pro">Student ID</label>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-group">
                                            <?php if (isset($_GET['ref_id'])) { ?>
                                                <input type="text" class="form-control" placeholder="Search Student" value="<?= $user_id_number ?>" disabled />
                                                <input type="hidden" class="form-control" placeholder="Search Student" name="id_number" value="<?= $user_id_number ?>" />
                                            <?php } else {  ?>
                                                <input type="text" class="form-control" placeholder="Search Student ID" name="id_number" required/>
                                            <?php } ?>
                                            <!-- <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-primary btn-md" type="button" data-toggle="modal" data-target="#SEARCH_STUDENT">Search</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Student Name</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
                                        <input type="text" readonly class="form-control" placeholder="Enter Student Name" name="stud_name" />
                                    </div>

                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Program</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" readonly class="form-control" placeholder="Student Program" name="stud_program" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Level</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" readonly class="form-control" placeholder="Student Level" name="stud_level" />
                                    </div>
                                </div>
                            </div> -->


                            <!-- <div class="form-group-inner" id="STAFF_ID" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Staff ID</label>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Staff" name="staff_id">
                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-primary btn-md" type="button" data-toggle="modal" data-target="#SEARCH_STAFF">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner" id="STAFF_NAME" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Staff Name</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" readonly class="form-control" placeholder="Enter Staff Name" name="staff_name" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner" id="STAFF_POSITION" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Position</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" readonly class="form-control" placeholder="Staff Position" name="staff_position" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-inner" id="FACULTY_ID" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Faculty ID</label>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Faculty" name="faculty_id">
                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-primary btn-md" type="button" data-toggle="modal" data-target="#SEARCH_FACULTY">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner" id="FACULTY_NAME" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Faculty Name</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" readonly class="form-control" placeholder="Faculty Name" name="faculty_name" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner" id="FACULTY_POSITION" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Position</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" readonly class="form-control" placeholder="Faculty Position" name="faculty_position" />
                                    </div>
                                </div>
                            </div> -->

                            
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Subject</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Enter Appointment Subject" name="subject" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <label class="login2 pull-right pull-right-pro"><span class="basic-ds-n">Type</span></label>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-9 col-xs-9">
                                        <div class="bt-df-checkbox">
                                            <label for="APPOINT_OP1" style="margin-right: 15px;">
                                                <input class="pull-left radio-checked" type="radio" value="Walk-in" name="type" <?php echo ($type=='Walk-in')?'checked':'' ?> >
                                                Walk-In
                                            </label>

                                            <label for="APPOINT_OP2">
                                                <input class="pull-left radio-checked" type="radio" value="Online" name="type" <?php echo ($type=='Online')?'checked':'' ?> >
                                                Online
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right">Information</label>
                                    </div>
                                    <div class="form-group res-mg-t-15 col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <?php if (isset($_GET['ref_id'])) { ?>
                                        <textarea placeholder="Description of Appointment" disabled><?= $reason ?>, <?= $actions ?>, <?= $remarks ?></textarea>
                                        <textarea style="display: none;" placeholder="Description of Appointment" name="info"><?= $reason ?>, <?= $actions ?>, <?= $remarks ?></textarea>
                                    <?php } else {  ?>
                                        <textarea placeholder="Description of Appointment" name="info" required></textarea>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-primary btn-md">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="gc___dashboard.php">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Calendar</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- <?php echo $newurl ?> -->

    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd"><br>
                                <h1 class="text-center">Book<span class="table-project-n"> for</span> Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
                            </div>
                        </div>

                        <div class="col-lg-12"><br>

                            <?php echo (isset($msg)) ? $msg : ""; ?>
                            <br>
                            <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                            foreach ($timeslots as $ts) {
                            ?>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?php if (in_array($ts, $bookings)) { ?>
                                            <button class="btn btn-danger"><?php echo $ts; ?></button>
                                        <?php } else { ?>
                                            <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                        <?php }  ?>
                                    </div>
                                    <br><br>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->




    </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>

    <script>
        $(".book").click(function() {
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#ADD_APPOINTMENT").modal("show");
            // $("#myModal").modal("show");

        });
    </script>

    <script>
        function changeDropdown() {
            var state = document.getElementById("mySelect").value;
            // alert(state);
            if (state == "student") {
                document.getElementById("STUD_ID").style.display = "block";
                document.getElementById("STUD_NAME").style.display = "block";
                document.getElementById("STUD_PROGRAM").style.display = "block";
                document.getElementById("STUD_LEVEL").style.display = "block";

                document.getElementById("STAFF_ID").style.display = "none";
                document.getElementById("STAFF_NAME").style.display = "none";

                document.getElementById("FACULTY_ID").style.display = "none";
                document.getElementById("FACULTY_NAME").style.display = "none";

            } else if (state == "staff") {
                document.getElementById("STUD_ID").style.display = "none";
                document.getElementById("STUD_NAME").style.display = "none";
                document.getElementById("STUD_PROGRAM").style.display = "none";
                document.getElementById("STUD_LEVEL").style.display = "none";

                document.getElementById("STAFF_ID").style.display = "block";
                document.getElementById("STAFF_NAME").style.display = "block";

                document.getElementById("FACULTY_ID").style.display = "none";
                document.getElementById("FACULTY_NAME").style.display = "none";

            } else if (state == "faculty") {
                document.getElementById("STUD_ID").style.display = "none";
                document.getElementById("STUD_NAME").style.display = "none";
                document.getElementById("STUD_PROGRAM").style.display = "none";
                document.getElementById("STUD_LEVEL").style.display = "none";

                document.getElementById("STAFF_ID").style.display = "none";
                document.getElementById("STAFF_NAME").style.display = "none";

                document.getElementById("FACULTY_ID").style.display = "block";
                document.getElementById("FACULTY_NAME").style.display = "block";

            } else {
                document.getElementById("STUD_ID").style.display = "none";
                document.getElementById("STUD_NAME").style.display = "none";
                document.getElementById("STUD_PROGRAM").style.display = "none";
                document.getElementById("STUD_LEVEL").style.display = "none";

                document.getElementById("STAFF_ID").style.display = "none";
                document.getElementById("STAFF_NAME").style.display = "none";

                document.getElementById("FACULTY_ID").style.display = "none";
                document.getElementById("FACULTY_NAME").style.display = "none";


            }
        }
    </script>

</body>

</html>