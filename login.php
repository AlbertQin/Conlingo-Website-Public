<?php
ob_start();
session_start();
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<html lang = "en">

   <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Conlingo - Client Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via  -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

  <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                       </div>

					    <?php
if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  $servername = "xxxxxxxxxxxxxxxxx";
  $username = "xxxxxxxxxxxxxxxxx";
  $password = "xxxxxxxxxxxxxxxxx";
  $dbname = "xxxxxxxxxxxxxxxxx";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $msg = 'Connection Error';
    }

    $user_email = $_POST['email'];
    $user_pass  = $_POST['password'];
    $check_user = "select * from client WHERE email='$user_email'AND password='$user_pass'";
    $run        = mysqli_query($conn, $check_user);
    if (mysqli_num_rows($run)) {
        $_SESSION['email'] = $user_email; //here session is used and value of $user_email store in $_SESSION.
        header("Location:index.php");
    } else {
        $msg = 'Wrong username or password';
    }
}

?>
       <div class="panel-body">
         <form role="form" method="post">
		 <fieldset>
			<div class="form-group">
            <input type = "text" class = "form-control"
               name = "email" placeholder = "Email"
               required autofocus></br>

            <input type = "password" class = "form-control"
               name = "password" placeholder = "Password" required>
			   </div>
			   <div class="form-group">
            <button class = "btn btn-success" type = "submit"
               name = "login">Login</button>
			   </div>
			   <div class="form-group">
			   <body><?php echo $msg; ?></body>
			   </div>
         </form>
                    </div>
                </div>
            </div>
        </div>
    </div

   </body>
</html>
