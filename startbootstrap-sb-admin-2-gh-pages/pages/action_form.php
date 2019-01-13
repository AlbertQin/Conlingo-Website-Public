
<?php 
$servername = "23.227.178.112";
$username = "conlingo";
$password = "yyyy44334455";
$dbname = "conlingo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$status1 = "LISTED";

$id=$_POST['id'];
$nickname=$_POST['nickname'];
$item=$_POST['item'];
$description=$_POST['description'];
$recievername=$_POST['reciever'];
$recieverphone=$_POST['phonenumber'];
$dateinput = time();

$pickupaddress=$_POST['pickupaddress'];
$Address1 = urlencode($pickupaddress);
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address1."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $Lat1 = $xml->result->geometry->location->lat;
      $Lon1 = $xml->result->geometry->location->lng;
      $LatLng1 = "$Lat,$Lon";
	  $pickupaddress=$xml->result->formatted_address;
 } else {
 echo "Pickup Address is incorrect";
echo "<br>";
$submit = false;
 }
  
  $dropoffaddress=$_POST['dropoffaddress'];
$Address2 = urlencode($dropoffaddress);
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address2."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $Lat2 = $xml->result->geometry->location->lat;
      $Lon2 = $xml->result->geometry->location->lng;
      $LatLng2 = "$Lat,$Lon";
	  $dropoffaddress=$xml->result->formatted_address;
 } else {
 echo "Pickup Address is incorrect";
echo "<br>";
$submit = false;
 }

$payment=$_POST['payment'];
$terms=$_POST['terms'];
$submit = true;

//CHECKING
if ($nickname == null) {
echo "Nickname field cannot be blank";
echo "<br>";
$submit = false;
}

if ($item == null) {
echo "Item field cannot be blank";
echo "<br>";
$submit = false;
}

if ($description == null) {
echo "Description field cannot be blank";
echo "<br>";
$submit = false;
}

if ($recievername == null) {
echo "Reciever Name field cannot be blank";
echo "<br>";
$submit = false;
}

if ($recieverphone == null) {
echo "Reciever Phone field cannot be blank";
echo "<br>";
$submit = false;
}

if ($pickupaddress == null) {
echo "Pickup Address field cannot be blank";
echo "<br>";
$submit = false;
}

if ($dropoffaddress == null) {
echo "Dropoff Address Field cannot be blank";
echo "<br>";
$submit = false;
}

if ($payment == null) {
echo "Payment field cannot be blank";
echo "<br>";
$submit = false;
}

if ($submit == true) {

//INSERT
$sql = "UPDATE job SET (nickname=?, item=?, `description=?, `recievername=?, `recieverphone=?, `fromLat=?, `fromLng=?, `fromAddress=?, `fromPassword=?, `toLat=?, `toLng=?, `toAddress=?, `toPassword=?, `payout=?, `postedDate=?, `status=?, WHERE id=?";

if (!($stmt = $conn->prepare($sql))) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}

if (!$stmt->bind_param("ssssssddsiddsisis", $id, $nickname, $item, $description, $recievername, $recieverphone, $Lat1, $Lon1, $pickupaddress, $frompassword, $Lat2, $Lon2, $dropoffaddress, $topassword, $payment, $dateinput, $status1)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

echo "Task Created Successfully.";
}

$stmt->close();
$conn->close(); 
?>