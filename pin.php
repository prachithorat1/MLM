
<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');

if (!isset($_SESSION['userid'])) {
    die("User ID is not set. Please log in.");
}

$userid = $_SESSION['userid'];
$records_per_page = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get current page
$offset = ($page - 1) * $records_per_page; // Calculate offset

// Count total records
$total_records_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM pin_list WHERE userid='$userid'");
$total_records_row = mysqli_fetch_assoc($total_records_query);
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $records_per_page);

// Fetch records with pagination
$query = mysqli_query($con, "SELECT * FROM pin_list WHERE userid='$userid' LIMIT $offset, $records_per_page");

// Check for query errors
if (!$query) {
    die("Query Failed: " . mysqli_error($con));
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

    <title>Mlm Website  - Pin</title>

    <!-- Bootstrap Core CSS  -->
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
                        <h1 class="page-header">Pin</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                        	<table class="table table-bordered table-striped">
                            	<tr>
                                	<th>S.n.</th>
                                    <th>Pin</th>
                                    <!-- <th>Status</th>  -->
                                    
                                </tr>
                                <?php
                                $i = $offset + 1; // Serial number starts from offset
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_array($query)) {
                                        $pin = $row['pin'];
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $pin; ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2">Sorry, you have no pin.</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>

                        <tr>
                                    <td colspan="2">
                                        <div style="text-align:center; margin-top:10px;">
                                            <?php if ($page > 1) : ?>
                                                <a href="?page=1"class="btn btn-primary">First</a>
                                                <!-- <a href="?page=<?php //echo ($page=1); ?>"class="btn btn-primary">First</a> -->
                                                <a href="?page=<?php echo ($page - 1); ?>" class="btn btn-primary">Previous</a>
                                            <?php endif; ?>

                                            <?php 
                                            $range = 2; // Number of pages to show before and after the current page
                                            for ($i = max(1, $page - $range); $i <= min($total_pages, $page + $range); $i++) : 
                                            ?>
                                                <a href="?page=<?php echo $i; ?>" class="btn <?php echo ($i == $page) ? 'btn-danger' : 'btn-secondary'; ?>">
                                                    <?php echo $i; ?>
                                                </a>
                                            <?php endfor; ?>

                                            <?php if ($page < $total_pages) : ?>
                                                <!-- <a href="?page=<?php echo ($page + 1); ?>"class="btn btn-primary">First</a> -->
                                                <a href="?page=<?php echo ($page + 1); ?>"class="btn btn-primary">Next</a>
                                                <a href="?page=<?php echo $total_pages; ?>"class="btn btn-primary">Last</a>
                                            <?php endif; ?>
                                       
                    
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    

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
























<!-- ================================ -->
<!-- <?php
// include('php-includes/connect.php');
// include('php-includes/check-login.php');
// $userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mlml Website  - Pin</title>

     Bootstrap Core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- MetisMenu CSS -->
    <!-- <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <!-- <link href="dist/css/sb-admin-2.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <!-- <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

 
<!-- 
</head>

<body> -->

    <!-- <div id="wrapper"> -->

        <!-- Navigation -->
        <?php// include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <!-- <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pin</h1>
                    </div> -->
                    <!-- /.col-lg-12 -->
                <!-- </div> -->
                <!-- /.row -->
                <!-- <div class="row">
                	<div class="col-lg-12">
                    	<div class="table-responsive">
                        	<table class="table table-bordered table-striped">
                            	<tr>
                                	<th>S.n.</th>
                                    <th>Pin</th>
                                </tr> -->
                                <?php
									// $i=1;
									// $query = mysqli_query($con,"select * from pin_list where userid='$userid' and status='open'");
									// if(mysqli_num_rows($query)>0){
									// 	while($row=mysqli_fetch_array($query)){
									// 		$pin = $row['pin'];
									// 	?>
                                    <!-- //     	<tr>
                                    //         	<td><?php //echo $i ?></td>
                                    //             <td><?php //echo $pin ?></td>
                                    //         </tr> -->
                                        <?php
									// 		$i++;
									// 	}
									// }
									// else{
									?>
                                    	<!-- <tr>
                                        	<td colspan="2">Sorry you have no pin.</td>
                                        </tr> -->
                                    <?php
									// }
								?>
                            <!-- </table> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div>/.row -->
            <!-- </div> -->
            <!-- /.container-fluid -->
        <!-- </div> -->
        <!-- /#page-wrapper -->

    <!-- </div> -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->

    <!-- Metis Menu Plugin JavaScript -->
    <!-- <script src="vendor/metisMenu/metisMenu.min.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <!-- <script src="dist/js/sb-admin-2.js"></script> -->

<!-- </body>

</html> --> 