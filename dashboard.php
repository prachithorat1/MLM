<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
     header("Location: login.php");
     exit();
    }

$user_id = $_SESSION['user_id'];

// // Get binary tree information
$stmt = $pdo->prepare("SELECT * FROM binary_tree WHERE user_id = ?");
$stmt->execute([$user_id]);
$tree = $stmt->fetch();

// Get commission information
$stmt = $pdo->prepare("SELECT SUM(amount) as total FROM commissions WHERE user_id = ?");
$stmt->execute([$user_id]);
$commission = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - MLM Binary</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo htmlspecialchars($user_id); ?></h2>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Binary Tree Structure
                    </div>
                    <div class="card-body">
                        <p>Left Member: <?php echo $tree['left_child'] ?? 'Empty'; ?></p>
                        <p>Right Member: <?php echo $tree['right_child'] ?? 'Empty'; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Commission Details
                    </div>
                    <div class="card-body">
                        <p>Total Commission: $<?php echo number_format($commission['total'] ?? 0, 2); ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="genealogy.php" class="btn btn-primary">View Genealogy</a>
            <a href="commission_history.php" class="btn btn-success">Commission History</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>