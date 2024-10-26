<?php
session_start();
include 'config.php';
$book_id = $_GET['book_id'];

// Check for associated orders
$orderCheck = $conn->prepare("SELECT COUNT(*) FROM orders WHERE book_id = ?");
$orderCheck->bind_param("i", $book_id);
$orderCheck->execute();
$orderCheck->bind_result($orderCount);
$orderCheck->fetch();
$orderCheck->close();

if ($orderCount > 0) {
    // Handle the case where orders exist
    echo "Cannot delete the book. There are associated orders.";
    exit();
} else {
    // Proceed with deletion
    $stmt = $conn->prepare("DELETE FROM book_details WHERE book_id = ?");
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $stmt->close();
    header("Location: books.php");
    exit();
}
?>
