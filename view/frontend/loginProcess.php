<?php
require $_SERVER['DOCUMENT_ROOT'].'/PROJETWEB/controller/UserC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $userC = new UserC();
    $user = $userC->getUserByEmail($email);

    if ($user && $password == $user['mdp_user']) {
        // Login successful, redirect to a new page or perform other actions
        header('Location:index.html');
        echo "Login successful!";
    } else {
        // Login failed, display an error message
        echo "Wrong email or password";
        ?>
        <a href = "login.php">Ressayer</a>
        <?php
    }
}
?>
