<?php

session_start();

unset($_SESSION['UserEmail']);
unset($_SESSION['UserId']);
unset($_SESSION['UserRole']);

echo header("Location: homepage___index.php");