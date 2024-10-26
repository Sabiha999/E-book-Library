<?php
session_start();
include 'config.php';
$order_id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$stmt->close();

header("Location: order.php");
exit();
?>
