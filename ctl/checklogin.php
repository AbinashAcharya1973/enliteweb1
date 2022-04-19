<?php

include 'dbconfig.php';
$conn= new mysqli($hostname,$username,$pwd,$databasename) or die("Could not connect to mysql".mysqli_error($con));

//$uid=$_POST['InputMobile'];
//$pwd=$_POST['InputPassword'];
$rip=$_SERVER['REMOTE_ADDR'];
$myObj=new stdClass();
$res=$conn->query("select * from users where MobileNO='".$uid."' and Password='".$pwd1."' and UStatus='Active'");

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
				if($rec['UserType']=='k')
				$myObj->ptx="karigar_h.html";
				if($rec['UserType']=='s')
				$myObj->ptx="/";
				if($rec['UserType']=='a')
				$myObj->ptx="/";
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
				$myObj->ptx="/";
				if($rec['UserType']=='a')
				$myObj->ptx="/";
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
			$myObj->ptx="/";
			if($rec['UserType']=='a')
			$myObj->ptx="/";
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
//$myJson=json_encode($myObj,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
header("Content-Type: application/json");
echo json_encode($myObj,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
//echo $myJson
?>
