<?php
// session_start();
// require_once 'config.php';

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// function getDownline($user_id) {
//     global $pdo;
//     $stmt = $pdo->prepare("SELECT * FROM binary_tree WHERE user_id = ?");
//     $stmt->execute([$user_id]);
//     return $stmt->fetch();
// }

// $user_id = $_SESSION['user_id'];
// $network = getDownline($user_id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Genealogy - MLM Binary</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .tree {
            text-align: center;
        }
        .level {
            margin: 20px 0;
        }
        .member {
            display: inline-block;
            margin: 0 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Binary Tree Genealogy</h2>
        
        <div class="tree">
            <!-- Level 1 -->
            <div class="level">
                <div class="member">
                    <?php echo htmlspecialchars($user_id); ?>
                </div>
            </div>
            
            <!-- Level 2 -->
            <div class="level">
                <div class="member">
                    <?php echo $network['left_child'] ?? 'Empty'; ?>
                </div>
                <div class="member">
                    <?php echo $network['right_child'] ?? 'Empty'; ?>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>