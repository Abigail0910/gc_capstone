<?php 
include 'vendor/autoload.php';

DB::$user = 'root';
DB::$password = '';
DB::$dbName = 'guidance_and_counseling';
DB::$encoding = 'utf8';

$group = $_POST['group'];



$name = DB::query("SELECT first_name, last_name FROM users WHERE user_id='$group'");

$messages = DB::query("SELECT * FROM sms WHERE seen_status='0' AND delete_status='0' AND group_sms='$group'");



$data = [];

foreach ($messages as $row) {
$data[] = ["sms" => $row['text_sms'],
			"group" => $row['group_sms'],
		   "sender" => $row['sender'],
		   "date" => date("g:i a | F j", strtotime( $row['date_sent'] ))];
}

DB::query("UPDATE sms SET seen_status=%i WHERE reciever=%i", 1, $group);

echo json_encode(["response" => $data, "name" => $name[0]['first_name']." ".$name[0]['last_name']]);

?>