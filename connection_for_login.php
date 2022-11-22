<?php

$conn = mysqli_connect("localhost", "root", "", "content");

if($conn){
    echo "Connection Successfull";
}
else{
    echo "Connection is not Successfull";
}


?>