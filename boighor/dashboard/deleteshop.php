<?php
session_start();
include 'config.php'; // Include your database connection file

// Check if shop_id is provided
$shop_id = isset($_GET['shop_id']) ? intval($_GET['shop_id']) : 0;

if ($shop_id > 0) {
    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM shops WHERE shop_id = ?");
    $stmt->bind_param("i", $shop_id);

    if ($stmt->execute()) {
        // Redirect to the shops page after successful deletion
        header("Location: shops.php?message=Shop deleted successfully");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid shop ID.";
}

$conn->close();
?>
