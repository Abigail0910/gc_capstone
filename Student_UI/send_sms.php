<?php 
include 'vendor/autoload.php';

DB::$user = 'root';
DB::$password = '';
DB::$dbName = 'guidance_and_counseling';
DB::$encoding = 'utf8';

$reciever = $_POST['reciever'];

$sender = $_POST['sender'];
$text = $_POST['text'];

$newreciever = DB::query("SELECT reciever FROM sms WHERE sender='$sender'");

DB::insert('sms', [
  'sender' => $sender,
  'reciever' => $newreciever[0]['reciever'],
  'text_sms' => $text,
  'group_sms' => $sender
]);

date_default_timezone_set('Asia/Manila');

echo json_encode(["response" => "success", "date"=>date("g:i a | F j", strtotime(date("F j, Y, g:i a")))]);

?>