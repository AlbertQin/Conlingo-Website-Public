
<?php
session_start();
echo $_SESSION['email'];

$sql= "SELECT id FROM client WHERE email=\"albertqin2000@gmail.com\"";

$servername = "xxxxxxxxxxxxxxxxx";
$username = "xxxxxxxxxxxxxxxxx";
$password = "xxxxxxxxxxxxxxxxx";
$dbname = "xxxxxxxxxxxxxxxxx";

$connection = mysql_connect($servername,$username,$password);
mysql_select_db($dbname,$connection);

/* show tables */
$result = mysql_query($sql,$connection) or die('cannot show tables');

$tableName = mysql_fetch_row($result);
echo $tableName[0];

?>
