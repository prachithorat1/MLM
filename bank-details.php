<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bank details</title>

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
                <h1 class="page-header">Bank</h1>
            </div>
                <!-- /.col-lg-12 -->
        </div>
            <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">
            <h2>Bank Details</h2>
            <div>
            <form method="POST" action="">
                <br>
                <label for="">Account Holder Name:</label>
                <input type="text" name="name">
                <br><br>
                <label for="">Bank Name:</label>
                <input type="text" name="bankname">
                <br><br>
                <label for="">Branch Name:</label>
                <input type="text" name="branch">
                <br><br>
                <label for="">Account Number:</label>
                <input type="text" name="accno">
                <br><br>
                <label for="">IFSC:</label>
                <input type="text" name="ifsc">
                <br><br>
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
            </form>

            <?php

            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $bankname = $_POST['bankname'];
                $branch = $_POST['branch'];
                $accno = $_POST['accno'];
                $ifsc = $_POST['ifsc'];

                $conn = new mysqli('localhost', 'root', '', 'mlm');

                if($conn->connect_error){
                    die("Connection failed:" .$conn->connect_error);
                }

                $sql = "INSERT INTO bankdetails(name,bankname,branch,accno,ifsc)VALUES('$name','$bankname','$branch','$accno','$ifsc')";

                if($conn->query($sql) === TRUE){
                    echo"<p> Record saved successfully</p>";
                }else{
                    echo"Error:" . $sql . "<br>" .$conn->error;
                }
                $conn->close();
            }
            ?>
</div>
</body>
</html>