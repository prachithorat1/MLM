<?php
require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];
?>
<?php
//pin request 
if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['pin_request'])){
	$amount = mysqli_real_escape_string($con,$_GET['amount']);
	$date = date("y-m-d");
    $cost_per_pin = 5;
    $total_cost = $amount*$cost_per_pin;
	
	
	// if($amount!=''){
    if(amount > 0){
		//Inset the value to pin request
		//$query = mysqli_query($con,"insert into pin_request(`email`,`amount`,`date`) values('$email','$amount','$date')");
        $query = mysqli_query($con, "INSERT INTO pin_request(`email`, `amount`, `total_cost`, `date`, `status`) 
                                     VALUES('$email', '$amount', '$total_cost', '$date', 'pending')");
        //if ($query) {
		if($query){
			echo '<script>alert("Pin request sent successfully");window.location.assign("pin-request.php");</script>';
		}
		else{
			//echo mysqli_error($con);
			echo '<script>alert("Unknown error occur.");window.location.assign("pin-request.php");</script>';
		}
	}
	else{
		echo '<script>alert("Please fill all the fields");</script>';
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mlm Website  - Pin Request</title>

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

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pin Request</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                    	<form method="post">	
                        	<div class="form-group">
                            	<label for="amount">Number of pins</label>
                                <input type="number" name="amount" class="form-control" required min="1">
                            </div>
                            <div class="form-group">
                            	<input type="submit" name="pin_request" class="btn btn-primary" value="Pin Request">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                	<div class="col-lg-6">
                    	<br><br>
                    	<table class="table table-bordered table-striped">
                        	<tr>
                            	<th>S.n.</th>
                                <th>Amount</th>
                                <th>Datet</th>
                                <th>Status</th>
                                <th>total_cost</th>
                            </tr>
                            <?php 
							$i=1;
							$query = mysqli_query($con,"select * from pin_request where email='$email' order by id desc");
							if(mysqli_num_rows($query)>0){
								while($row=mysqli_fetch_array($query)){
									$amount = $row['amount'];
									$date = $row['date'];
									$status = $row['status'];
                                    $total_cost = $row['total_cost'];
								?>
                                	<tr>
                                    	<td><?php echo $i; ?></td>
                                        <td><?php echo $amount; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><?php echo $total_cost; ?></td>
                                    </tr>
                                <?php
									$i++;
								}
							}
							else{
							?>
                            	<tr>
                                	<td colspan="4">You have no pin request yet.</td>
                                </tr>
                            <?php
							}
							?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
