<?php
session_start();
if($_SESSION['email'] == null){
   header("Location:login.php");
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

    <title>Conlingo - Client Control Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via  -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Conlingo Client Control Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="tasks.php"><i class="fa fa-table fa-fw"></i> Tasks</a>
                        </li>
                        <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create New Task</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Insert Shipment Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div>
                                    <form action="action_form.php" method="post">
                                        <div class="form-group">
                                            <label>Task Nickname</label>
                                            <input class="form-control" placeholder="Ex: Jason's Computer" name="nickname">
                                            <p class="help-block">Name your task for ease of access</p>
                                        </div>
                                        <div class="form-group">
                                            <label>What you're shipping</label>
                                            <input class="form-control" placeholder="Ex: Computer" name="item">
                                            <p class="help-block">For our reference. Will not be disclosed to shipper.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Brief Description of the Item</label>
                                            <textarea class="form-control" rows="3" name="description" placeholder="Ex: Height: 12cm"></textarea>
                                            <p class="help-block">For our reference. Will not be disclosed to shipper.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Pickup Address</label>
                                            <input class="form-control" placeholder="Ex: 1 Wellington St, Ottawa, ON K1A 0A4" name="pickupaddress">
                                            <p class="help-block">Have your Conlingo Control Panel ready at this location to hand off the item. Please enter a full address.</p>
                                        </div>
										
										
                                        <div class="form-group">
                                            <label>Reciever's Full Name</label>
                                            <input class="form-control" placeholder="Ex: Jason Smith" name="reciever">
                                            <p class="help-block">If you are sending to an organisation, put name of the organisation.</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Reciever's Cell Phone Number</label>
                                            <input class="form-control" placeholder="Ex: 1234567890" name="phonenumber">
                                            <p class="help-block">Ask the reciever for permission to use their cellphone number. We will be sending the password to through SMS them.</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Reciever's Address</label>
                                            <input class="form-control" placeholder="Ex: 1 Wellington St, Ottawa, ON K1A 0A4" name="dropoffaddress">
											<p class="help-block">If you are sending to an organisation, put name of the organisation. Please enter a full address.</p>
                                        </div>				
										
                                        <div class="form-group">
                                            <label>Payment Amount</label>
                                            <select class="form-control" name="payment">
                                                <option>5.00</option>
                                                <option>10.00</option>
                                                <option>15.00</option>
                                            </select>

                                            <p class="help-block">Larger amounts will most likely result in faster delivery times.</p>
                                        </div>

                                        <div class="form-check">
    <div class="form-check">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="terms" value="value1">
    I Agree to the Terms & Conditions
  </label>
</div>
</div>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Restart Form</button>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>