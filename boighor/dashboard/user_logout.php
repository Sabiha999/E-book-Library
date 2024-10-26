<?php
session_start();
session_destroy();
header('location: ../dashboard/user_signup.php');

exit();

?>