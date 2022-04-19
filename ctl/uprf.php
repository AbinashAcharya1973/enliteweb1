<?php
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Accept: application/json;charset=UTF-8');
include 'dbconfig.php';$conn= new mysqli($hostname,$username,$pwd,$databasename) or die("Could not connect to mysql".mysqli_error($con));

$conn->query("update users set FirstName='".$FirstName."',LastName='".$LastName."',StoreName='".$StoreName."',MobileNO='".$MobileNo."',WhatsappNO='".$WhatsappNo."',EmailID='".$EmailID."',Address1='".$Address1."',Address2='".$Address2."',PINCode='".$PINCode."',GSTNo='".$GSTNo."',UserType='".$UserType."',Password='".$Password."' where UserID=".$uid);
echo $uid;

?>
