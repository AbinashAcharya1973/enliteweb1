<?php
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Accept: application/json;charset=UTF-8');
include 'dbconfig.php';$conn= new mysqli($hostname,$username,$pwd,$databasename)or die("Could not connect to mysql".mysqli_error($con));


$qstatus=$conn->query("UPDATE CompanyMaster SET CompanyName='".$CompanyName."', ContactNo='".$ContactNo."', Address1='".$Address1."', Address2='".$Address2."', pin='".$pin."', State='".$State."',gstno='".$gstno."', EmailID='".$EmailID."', Website='".$Website."', jurisdiction='".$jurisdiction."', bankname='".$bankname."', bankno='".$bankno."', ifsc='".$ifsc."', Dealin='".$Dealin."', Description='".$Description."', Password='".$Password."' WHERE CompanyID=".$CompanyID); 

$filename = $_FILES['file']['name'];
	// Valid file extensions
	$valid_extensions = array("jpg","jpeg","png");
	// File extension
	$extension = pathinfo($filename, PATHINFO_EXTENSION);
	// Check extension
	if(in_array(strtolower($extension),$valid_extensions) ) {
		$newfile=$UserID.".".$extension;
		if(move_uploaded_file($_FILES['file']['tmp_name'], "../img/goldenLogo.png")){
			//$conn->query("update users set ProImg='profileimg/".$newfile."' WHERE UserID=".$UserID);
		}
	}
	else{	
	}
if($qstatus)	
echo "Company Information Updated";
else
echo "Error In Updating the Information";
?>
