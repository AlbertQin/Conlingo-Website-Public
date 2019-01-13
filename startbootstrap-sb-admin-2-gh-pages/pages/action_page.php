<?php
$servername = "xxxxxxxxxxxxxxxxx";
$username = "xxxxxxxxxxxxxxxxx";
$password = "xxxxxxxxxxxxxxxxx";
$dbname = "xxxxxxxxxxxxxxxxx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//VAR MYSQL INSERTION


$submit = true;
$id=substr(md5(microtime()),0,10);

$firstname=$_POST['firstnameinput'];
$lastname=$_POST['lastnameinput'];
$email=$_POST['emailinput'];
$passwordinput=$_POST['passwordinput'];
$address=$_POST['addressinput'];
$dateinput = date("Y-m-d H:i:s");
$Address1 = urlencode($address);
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address1."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $address=$xml->result->formatted_address;
  } else {
  echo "Pickup Address is incorrect";
echo "<br>";
$submit = false;
}

//VAR OTHER
$passwordconfirm=$_POST['passwordconfirm'];
$terms=$_POST['terms'];

//CHECKING
if ($passwordinput != $passwordconfirm) {
echo "Password do not match";
echo "<br>";
$submit = false;
}

if ($firstname == null) {
echo "First Name field cannot be blank";
echo "<br>";
$submit = false;
}

if ($lastname == null) {
echo "Last Name field cannot be blank";
echo "<br>";
$submit = false;
}

if ($email == null) {
echo "Email field cannot be blank";
echo "<br>";
$submit = false;
}

if ($passwordinput == null) {
echo "Password field cannot be blank";
echo "<br>";
$submit = false;
}

if ($passwordconfirm == null) {
echo "Password Confirmation field cannot be blank";
echo "<br>";
$submit = false;
}

if ($address == null) {
echo "Address field cannot be blank";
echo "<br>";
$submit = false;
}

if ($terms != value1) {
echo "You must accept the terms and conditions";
echo "<br>";
$submit = false;
}

//DUPLICATE EMAIL
$result = $conn->query("SELECT * FROM client WHERE email='$email'");

if ($result->num_rows > 0) {
   echo "Email already in use.";
   echo "<br>";
   $submit = false;
}

if ($submit == true) {

//INSERT
$sql = "INSERT INTO `client` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `registrationDate`, `address`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";

if (!($stmt = $conn->prepare($sql))) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}

if (!$stmt->bind_param("ssssssss", $id, $firstname, $lastname, $email, $passwordinput, $typeinput, $dateinput, $address)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

echo "User Created Successfully.";
}

$stmt->close();
$conn->close();
?>
