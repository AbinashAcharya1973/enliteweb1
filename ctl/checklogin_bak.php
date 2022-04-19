<?php
include 'dbconfig.php';

$conn = new mysqli($hostname_oCn, $username_oCn, $password_oCn, $databasename);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    $error=1;
	}
/*$userid=$_POST['userid'];
$password=$_POST['password'];
$uid=$_POST['InputMobile'];
$pwd=$_POST['InputPassword'];*/
$rip=$_SERVER['REMOTE_ADDR'];
$myObj=new stdClass();
$sql = "select * from users where MobileNO='".$uid."' and Password='".$pwd."' and UStatus='Active'";
$res = $conn->query($sql);

if($res->num_rows>0){
	if($rec=$res->fetch_assoc()){
		//echo $rec['UserType'];

		$result1=$conn->query("select * from userlog where UserID=".$rec['UserID']);
		if($result1->num_rows>0){
			if($row=$result1->fetch_assoc()){
				$lastip=$row['IPAdd'];
			}

			if($rip==$lastip){
				$myObj->UT="";
				$myObj->Status=0;
				$myObj->msg="Already Logged In";
				$myObj->origin=1;				
				if($rec['UserType']=='s')
				$myObj->ptx=" ";
				if($rec['UserType']=='a')
				$myObj->ptx=" ";
				if($rec['UserType']=='r')
				$myObj->ptx="retail_h.html";
			}else{
				$conn->query("delete from userlog where UserID=".$rec['UserID']);
				$conn->query("insert into userlog (UserID,LoginID,IPAdd) values(".$rec['UserID'].",'".$rec['MobileNO']."','".$rip."')");
				$conn->query("insert into userlogbk (UserID,LoginID,IPAdd) values(".$rec['UserID'].",'".$rec['MobileNO']."','".$rip."')");
				$_SESSION["uid"] = $uid;
				$_SESSION["Password"] = $pwd;
				$myObj->UT=$rec['UserType'];
				$myObj->msg="true";
				$myObj->Status=1;
				if($rec['UserType']=='k')
				$myObj->ptx="karigar_h.html";
				if($rec['UserType']=='s')
				$myObj->ptx=" ";
				if($rec['UserType']=='a')
				$myObj->ptx=" ";
				if($rec['UserType']=='r')
				$myObj->ptx="retail_h.html";
				$myObj->origin=0;
			}


		}else{
			$conn->query("insert into userlog (UserID,LoginID,IPAdd) values(".$rec['UserID'].",'".$rec['MobileNO']."','".$rip."')");
			$conn->query("insert into userlogbk (UserID,LoginID,IPAdd) values(".$rec['UserID'].",'".$rec['MobileNO']."','".$rip."')");
			$_SESSION["uid"] = $uid;
			$_SESSION["Password"] = $pwd;
			$myObj->UT=$rec['UserType'];
			$myObj->msg="true";
			$myObj->Status=1;
			if($rec['UserType']=='k')
			$myObj->ptx="karigar_h.html";
			if($rec['UserType']=='s')
			$myObj->ptx="/enliteweb1/";
			if($rec['UserType']=='a')
			$myObj->ptx="/enliteweb1/";
			if($rec['UserType']=='r')
			$myObj->ptx="retail_h.html";
			$myObj->origin=0;

		}


	}
}else{
	$myObj->UT="";
	$myObj->msg="User ID or Password was Incorrect";
	$conn->query("insert into userlogbk (LoginID,IPAdd) values('".$uid."','".$rip."')");
}
header("Content-type:json/text");
echo json_encode($myObj,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>


