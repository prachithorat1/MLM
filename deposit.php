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

    <title>Deposit</title>

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

        <!-- <div style="flex: 1;">
            <div class="header">
                <div class="header-icon">🔔</div>
                <div class="header-icon">👤</div>
            </div>
            
            <div class="content">
                <?php //if (!empty($success)): ?>
                <div class="alert" style="background-color: #e8f5e9; border-color: #c8e6c9; border-left-color: #4caf50; color: #2e7d32;">
                    <?php //echo $success; ?>
                </div>
                <?php //endif; ?>
                
                <?php //if (!empty($error)): ?>
                <div class="alert">
                    <?php //echo $error; ?>
                </div>
                <?php //endif; ?> -->
                
                <div class="step-container">
                    <div class="step-content">
                        <div class="payment-method">
                            <img src="https://th.bing.com/th/id/OIP.suGvdvu-m8RGVEuPpxs3sQHaGT?rs=1&pid=ImgDetMain" width="50px" alt="PhonePe">
                            <br>
                            <div style="font-weight: bold;">PhonePe</div>
                            <br>
                            <div style="font-size: 12px; color: #666;">ACCEPTED HERE</div>
                            
                            <!-- <div style="font-size: 13px; margin-top: 10px;">Scan & Pay Using PhonePe App</div> -->
                            <div class="qr-code">
                                <img src="https://res.cloudinary.com/mighil/image/upload/v1589876497/phonepe_jtv6mp.png" width="150px" alt="QR Code">
                            </div>
                            <br>
                            <!-- <div style="font-size: 12px; color: #666;">PAWAR</div> -->
                        </div>
                        
                        <div class="bank-details">
                            <div><strong>Bank Name:</strong> THE PATAN URBAN CO-OP. BANK LTD</div>
                            <div><strong>Account Name:</strong> PAWAR TUKARAM RAMCHANDRA</div>
                            <div><strong>Branch:</strong> PATAN</div>
                            <div><strong>Account No.:</strong> 1001014000385</div>
                            <div><strong>IFSC Code:</strong> HDFC0CPUBLP</div>
                        </div>
                    </div>
                </div>
                
                <div class="step-container">
                    <div class="step-header">
                        <br>
                        <div style="font-weight: normal; font-size: 14px; margin-top: 5px;">
                            Submit Fund Deposit request here
                        </div>
                    </div>
                    <div class="step-content">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="amount">Amount <span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="amount" name="amount" value="<?php echo htmlspecialchars($amount); ?>" required>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label for="transactionid">Transaction ID <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="transactionid" name="transactionid" value="<?php echo htmlspecialchars($transactionid); ?>" required>
                            </div>
                             -->
                            <div class="form-group">
                                <label for="attachment">Attachment <span style="color: red;">*</span></label>
                                <div style="flex: 1; display: flex;">
                                    <div style="position: relative; overflow:hidden; display: inline-block;">
                                        <button type="button" class="btn" style="background-color: #7700b3; display: inline-block;"><span style="color: white;">Choose File</span></button>
                                        <input type="file" name="attachment" id="attachment" style="position: absolute; left: 0; top: 0; opacity: 0; width: 100%; height: 100%; cursor: pointer;" required>
                                    </div>
                                    <span id="file-name" style="line-height: 40px; margin-left: 10px; color: #777;">No file chosen</span>
                                </div>
                            </div>
                            
                            <div class="alert" style="text-align: left;">
                                <strong>Note:</strong> Fake upload may lead to account termination.
                            </div>
                            
                            <div style="text-align: center; margin-top: 30px;">
                                <button type="submit" class="btn">Request</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>

    <script>
        // Show selected filename
        document.getElementById('attachment').addEventListener('change', function() {
            var fileName = this.files[0].name;
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
    
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>