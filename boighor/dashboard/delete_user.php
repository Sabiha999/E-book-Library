
<?php
session_start();
include 'config.php';
$user_id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM user_deatail WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->close();

header("Location: user.php");
exit();
?>