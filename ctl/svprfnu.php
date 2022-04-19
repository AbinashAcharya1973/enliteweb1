<?php
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Accept: application/json;charset=UTF-8');
include 'dbconfig.php';$conn= new mysqli($hostname,$username,$pwd,$databasename) or die("Could not connect to mysql".mysqli_error($con));
/*$FirstName=$_REQUEST['FirstName'];
$LastName=$_REQUEST['LastName'];
$StoreName=$_REQUEST['StoreName'];
$MobileNo=$_REQUEST['MobileNo'];
$UserType=$_REQUEST['UserType'];
$WhatsappNo=$_REQUEST['WhatsappNo'];
$EmailID=$_REQUEST['EmailID'];
$Address1=$_REQUEST['Address1'];
$Address2=$_REQUEST['Address2'];
$PINCode=$_REQUEST['PINCode'];
$GSTNo=$_REQUEST['GSTNo'];
$Password=$_REQUEST['Password'];
$UType=$_REQUEST['UserType'];*/
//echo "insert into users (FirstName,LastName,StoreName,MobileNO,WhatsappNO,EmailID,Address1,Address2,PINCode,GSTNo,UserType,Password,AccID) values('".$FirstName."','".$LastName."','".$StoreName."','".$MobileNo."','".$WhatsappNo."','".$EmailID."','".$Address1."','".$Address2."','".$PINCode."','".$GSTNo."','".$UserType."','".$Password."',".$lastid.")";
/*$rec1=$conn->query("select * from groups where GroupName='Sundry Debtor'");
if($rec1->num_rows>0){
	if($res=$rec1->fetch_assoc()){
		$temp_tran_type = $res["GroupNature"];
		$groupid=$res["GroupID"];
	}
}*/
$result=$conn->query("select * from users where MobileNO='".$MobileNo."'");
if($result->num_rows>0){
	echo "NO";
}else{
	if($UType=='s'){
			$conn->query("insert into users (FirstName,LastName,StoreName,MobileNO,WhatsappNO,EmailID,Address1,Address2,PINCode,GSTNo,UserType,Password) values('".$FirstName."','".$LastName."','".$StoreName."','".$MobileNo."','".$WhatsappNo."','".$EmailID."','".$Address1."','".$Address2."','".$PINCode."','".$GSTNo."','".$UserType."','".$Password."')"); 
			$lastid=$conn->insert_id;
			$r="insert into users (FirstName,LastName,StoreName,MobileNO,WhatsappNO,EmailID,Address1,Address2,PINCode,GSTNo,UserType,Password) values('".$FirstName."','".$LastName."','".$StoreName."','".$MobileNo."','".$WhatsappNo."','".$EmailID."','".$Address1."','".$Address2."','".$PINCode."','".$GSTNo."','".$UserType."','".$Password."')";
			error_log(print_r($r,true));
	}
	if($UType=='k'){
			$conn->query("insert into users (FirstName,LastName,StoreName,MobileNO,WhatsappNO,EmailID,Address1,Address2,PINCode,GSTNo,UserType,Password) values('".$FirstName."','".$LastName."','".$StoreName."','".$MobileNo."','".$WhatsappNo."','".$EmailID."','".$Address1."','".$Address2."','".$PINCode."','".$GSTNo."','".$UserType."','".$Password."')"); 
			$lastid=$conn->insert_id;
			
	}
}

/*if($result){
	$lastid=$conn->insert_id;	
	$conn->query("INSERT INTO stock (Category, Subcategory, Itemname,brand,barcode,size,MRP,PRate,Qty,ProductID,Tax,Lose,UnitType,SaleRate,HSN,Taxslab) values('".$category."','".$subcategory."','".$temp_pname."','".$brandname."','','size',".$temp_mrp.",".$pprice.",".$temp_oqty.",".$lastid.",".$temp_tax.",0,'".$unit."',".$sprice.",'".$hsn."','N')");*/

$filename = $_FILES['file']['name'];
	// Valid file extensions
	$valid_extensions = array("jpg","jpeg","png","pdf");
	// File extension
	$extension = pathinfo($filename, PATHINFO_EXTENSION);
	// Check extension
	if(in_array(strtolower($extension),$valid_extensions) ) {
		$newfile=$lastid.".".$extension;
		if(move_uploaded_file($_FILES['file']['tmp_name'], "../profileimg/".$newfile)){
			$conn->query("update users set Proimg='profileimg/".$newfile."' where UserID=".$lastid);
		}
	}
echo($lastid);	
/*}
else{	
}*/	
//echo $_FILES['file']['tmp_name'];
?>
