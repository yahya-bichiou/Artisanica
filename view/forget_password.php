<?php
require $_SERVER['DOCUMENT_ROOT'].'/PROJETWEB/controller/UserC.php';

$show = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cin = $_POST["cin"];

    $userC = new UserC();
    $user = $userC->getUserByCin($cin);

    if ($user) {
        // User found, display the password
        $show = 0;
        echo "Your password: " . $user['mdp_user'];
    } else {
        // User not found, display an error message
        $show = 0;
        echo "CIN not registered on this site";
    }
}


if ($show == 1)
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your head content here -->
</head>

<body>
    <form method="POST" action="forget_password.php">
        <label for="cin">Enter your CIN:</label>
        <input type="text" name="cin" required>
        <button type="submit">Submit</button>
    </form>
</body>

</html>

<?php
}
?>