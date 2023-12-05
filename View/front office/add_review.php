<?php
require_once'../../config.php';
$conn = config::getConnexion();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id_post = $_GET["id"];
    $username = $_POST["name_user"];
    $review = $_POST["review_data"];
    
    // Insert data into the database
    $sql = "INSERT INTO review (id_post, name_user, review_data) VALUES (:id, :name_user, :review_data)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_post);
    $stmt->bindParam(':name_user', $username);
    $stmt->bindParam(':review_data', $review);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>window.location.href = 'product_details.php?id=$id_post';</script>";
        exit;

    } else {
        echo "Error adding review: " . $stmt->errorInfo()[2];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

.add-review-form {
    width: 100%;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.add-review-form label {
    display: block;
    margin-bottom: 5px;
}

.add-review-form input[type="text"], .add-review-form textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    margin-bottom: 15px;
}

.add-review-form button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.add-review-form button[type="submit"]:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
<form class="add-review-form" method="POST">
        <label for="name_user">Username:</label>
        <input type="text" id="name_user" name="name_user" >
        <br>
        <label for="review_data">Review:</label>
        <textarea id="review_data" name="review_data" ></textarea>
        <br>
        <button type="submit">Ajouter</button>
        <a href="index.html">Retourner</button></a>
    </form>
</body>
</html>