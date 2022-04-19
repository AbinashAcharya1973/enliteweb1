<?php
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Accept: application/json;charset=UTF-8');
include 'dbconfig.php';$conn= new mysqli($hostname,$username,$pwd,$databasename) or die("Could not connect to mysql".mysqli_error($con));


$jdetails=json_decode($req);
$countRecords=count($jdetails);
$RC=0;
//echo "insert into UserPermission (ModuleID,UserID,PEdit,PSave,PPrint,PDelete) values(".$jdetails[$RC]->ModuleID.",".$uid.",".$jdetails[$RC]->Edit.",".$jdetails[$RC]->Save.",".$jdetails[$RC]->Print.",".$jdetails[$RC]->Delete.")";
while($RC<$countRecords){
	$result=$conn->query("select * from UserPermission where ModuleID=".$jdetails[$RC]->ModuleID." and UserID=".$uid);
	if($result->num_rows>0){
	$conn->query("update UserPermission set PEdit=".(int)$jdetails[$RC]->Edit.",PSave=".(int)$jdetails[$RC]->Save.",PPrint=".(int)$jdetails[$RC]->Print.",PDelete=".(int)$jdetails[$RC]->Delete." where ModuleID=".$jdetails[$RC]->ModuleID." and UserID=".$uid);	
	}else{
		$conn->query("insert into UserPermission (ModuleID,UserID,PEdit,PSave,PPrint,PDelete) values(".$jdetails[$RC]->ModuleID.",".$uid.",".(int)$jdetails[$RC]->Edit.",".(int)$jdetails[$RC]->Save.",".(int)$jdetails[$RC]->Print.",".(int)$jdetails[$RC]->Delete.")");
	}
	$RC++;
}


?>
