<?php
// Function to write errors to a text file
function logSystemError($message) {
    $timestamp = date("Y-m-d H:i:s");
    $logEntry = "[$timestamp] $message" . PHP_EOL;
    // Save to a file named system_errors.log in your folder
    file_put_contents('system_errors.log', $logEntry, FILE_APPEND);
}
?>