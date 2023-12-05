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
        ?>
        <script>alert("Your password: <?php echo $user['mdp_user']; ?>");</script>
        <?php
    } else {
        // User not found, display an error message
        $show = 0;
        ?>
        <script>alert("This CIN is not registered");</script>
        <?php
    }
}


if ($show == 1)
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Password Recovery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: #ff0000;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <form method="POST" action="forget_password.php">
        <h2>Password Recovery</h2>
        <?php
        if ($show == 0) {
            echo '<p class="error">';
            echo $user ? 'Your password: ' . $user['mdp_user'] : 'CIN not registered on this site';
            echo '</p>';
        }
        ?>
        <label for="cin">Enter your CIN:</label>
        <input type="text" name="cin" required>
        <button type="submit">Submit</button>
    </form>
</body>

</html>


<?php
}
?>