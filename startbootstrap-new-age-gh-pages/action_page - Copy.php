<?php

$servername = "xxxxxxxxxxxxxxxxx";
$username = "xxxxxxxxxxxxxxxxx";
$password = "xxxxxxxxxxxxxxxxx";
$dbname = "xxxxxxxxxxxxxxxxx";
$datetime = new DateTime('today');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO user (firstname, lastname, email, password, type, balance, registrationDate, address, phone, licenseplate, paypalEmail)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)"


$stmt = mysqli_prepare($sql);
$stmt->bind_param($_POST["firstnameinput"], $_POST["lastnameinput"], $_POST["emailinput"],$_POST["passwordinput"],"SHIPPER","0.0", $datetime, $_POST["addressinput"], $_POST["phonenumberinput"],$_POST["licenseplateinput"],$_POST["paypalinput"]);
$stmt->execute();

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
