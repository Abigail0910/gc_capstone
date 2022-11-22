<?php 
include 'vendor/autoload.php';

DB::$user = 'root';
DB::$password = '';
DB::$dbName = 'guidance_and_counseling';
DB::$encoding = 'utf8';






$pos = $_POST['pos'];

$fetchData = DB::query("SELECT * from users where position='$pos' ");

$data = array();

foreach ($fetchData as $row) {
    
   $data[] = array(

    'id' => $row['user_id'] ,
    'studid' => $row['id_number'],
    'position' => $row['position'],
    'program' => $row['program'],
    'level' => $row['level'],
    'department' => $row['department'],
    'text' => $row['last_name'].", ".$row['first_name'],

    );
}

echo json_encode(["users" => $data]);


?>