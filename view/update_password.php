<?php
require $_SERVER['DOCUMENT_ROOT'].'/PROJETWEB/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Cin and new password from the form
    $enteredCin = $_POST["cin"];
    $newPassword = $_POST["new_password"];

    // Validate and sanitize input if needed

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the database with the new password
    $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE cin = :cin");
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':cin', $enteredCin);
    $stmt->execute();

    // Redirect to a login page or any other appropriate page
    header("Location: login.php");
    exit();
}
?>