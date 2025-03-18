<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sponsor_id = $_POST['sponsor_id'];
    $position = $_POST['position']; // 'left' or 'right'

    try {
        // Start transaction
        $pdo->beginTransaction();

        // Insert new user
        $stmt = $pdo->prepare("INSERT INTO users (user_id, password, sponsor_id, position) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $password, $sponsor_id, $position]);

        // Create binary tree entry
        $stmt = $pdo->prepare("INSERT INTO binary_tree (user_id) VALUES (?)");
        $stmt->execute([$user_id]);

        // Update sponsor's binary tree
        if ($sponsor_id) {
            $stmt = $pdo->prepare("UPDATE binary_tree SET {$position}_child = ? WHERE user_id = ?");
            $stmt->execute([$user_id, $sponsor_id]);
        }

        $pdo->commit();
        $_SESSION['success'] = "Registration successful!";
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        $error = "Registration failed: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - MLM Binary</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Register New Member</h2>
        <form method="POST">
            <div class="form-group">
                <label>User ID</label>
                <input type="text" name="user_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Sponsor ID</label>
                <input type="text" name="sponsor_id" class="form-control">
            </div>
            <div class="form-group">
                <label>Position</label>
                <select name="position" class="form-control">
                    <option value="left">Left</option>
                    <option value="right">Right</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>