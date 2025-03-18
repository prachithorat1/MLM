<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Product Form</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 
</head>
<body>
    <div class="wrapper">

    <?php include('php-includes/menu.php'); ?>

    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">

                    <h2>Manage Product Form</h2>
                    <form method="POST" action="">
                        <br>
                        <label for="">Name:</label>
                        <input type="text" name="name" required><br><br>
                        <!-- Manage Product: <input type="text" name="product"><br><br> -->
                        <label for="">Email:</label>
                        <input type="email" name="email"  required><br><br>
                        <label for="">Mobile:</label>
                        <input type="text" name="mobile"  required><br><br>
                        <label for="">Address:</label>
                        <textarea name="address" required></textarea><br><br>
                        <input type="submit" name="submit" class="btn btn-primary" value="Save">
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        // $product = $_POST['product'];
                        $email = $_POST['email'];
                        $mobile = $_POST['mobile'];
                        $address = $_POST['address'];

                        // Database connection
                        $conn = new mysqli('localhost', 'root', '', 'mlm');

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "INSERT INTO profile(name, email, mobile, address) 
                                VALUES ('$name', '$email', '$mobile', '$address')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<p>Record saved successfully!</p>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                    }
                    ?>
    </div>
</body>
</html>
