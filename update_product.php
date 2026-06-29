<?php
// Function to update an existing product record
function updateProduct($productId, $productData) {
    global $conn; // Assuming database connection is established in 'db.connection.php'
    include_once('db.connection.php');

    $product_name = mysqli_real_escape_string($conn, $productData['product_name']);
    $price        = mysqli_real_escape_string($conn, $productData['price']); // Kenya Shillings
    $description  = mysqli_real_escape_string($conn, $productData['description']);
    $stock        = mysqli_real_escape_string($conn, $productData['stock']);

    // SQL UPDATE Query
    $sql = "UPDATE products SET
            product_name = '$product_name',
            price        = '$price',
            description  = '$description',
            stock        = '$stock'
            WHERE product_id = $productId";

    if (mysqli_query($conn, $sql)) {
        return true; // Update successful
    } else {
        error_log("Error updating product: " . mysqli_error($conn));
        return false; // Update failed
    }
}
?>  