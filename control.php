<?php
$procedure = $_GET['proc'];
$passWord = $_GET['pass'];
$command = $_GET['com'];

include 'sql.php';

if(!isset($_GET['proc'])){
  $procedure = "";  
}
else{
  $procedure = $_GET['proc'];  
}

if(!isset($_GET['pass'])){
  $passWord = "";  
}
else{
  $passWord = $_GET['pass'];  
}

if(!isset($_GET['com'])){
  $command = "";  
}
else{
  $command = $_GET['com'];  
}

if($procedure != "" && $passWord != ""){
  if ($passWord == "azamSheikh"){ 

/////////////////////////////////////////////////////////////////////////////////////
if($procedure == "commandGet"){

//this part gets command from database. this files is implemented by hardware side

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT command FROM stringlight";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["command"];
  }
} else {
  echo "0 results";
}
$conn->close();
}
/////////////////////////////////////////////////////////////////////////////////
else if($procedure == "commandPut"){
    
   // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

$tostore = " stringLight " .$command;  //////////log parameters
include 'ipcheck.php';            ///logfile exec

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE stringlight SET command='$command' WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close(); 
}

else if($procedure == "getStatus"){
  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT status FROM stringlight";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["status"];
  }
} else {
  echo "0 results";
}
$conn->close();  
}

else if($procedure == "putStatus"){
  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE stringlight SET status='$command' WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();  
}

else if($procedure == "neutral"){
   // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE stringlight SET command='no' WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close(); 
}

else{
    
}
}    
}
