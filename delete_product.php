<?php
// Function to delete a product record
function deleteProduct($productId) {
    global $conn;
    include_once('db.connection.php');

    // SQL DELETE Query
    $sql = "DELETE FROM products WHERE product_id = $productId";

    if (mysqli_query($conn, $sql)) {
        return true; // Deletion successful
    } else {
        error_log("Error deleting product: " . mysqli_error($conn));
        return false; // Deletion failed
    }
}
?>