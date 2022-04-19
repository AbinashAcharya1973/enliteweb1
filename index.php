<?php
require "AltoRouter.php";
$rout1=new AltoRouter();
//$rout1->setBasePath('/enliteweb1');
$rout1->map("GET","/",function(){
	require __DIR__.'/views/index.php';
});
$rout1->map("GET","/r8eg",function($id){
	require __DIR__.'/views/reg.php';	
},"registrationform");
$rout1->map("GET","/maddmem",function(){
	require __DIR__.'/m/addmem.php';	
},"mregistrationform");
$rout1->map("GET","/mpanel",function($id){
	require __DIR__.'/m/index.php';	
},"mpanel");
$rout1->map("GET","/login",function(){
	require __DIR__.'/views/login.html';	
},"mlogin");
$rout1->map("POST","/logout",function(){
	$_POST = json_decode(file_get_contents('php://input'), true);
	$temploginid=$_POST['sdf'];
	require __DIR__.'/views/logout.php';	
});
$rout1->map("POST","/checklogin",function(){
	$uid=$_POST['userid'];
	$pwd1=$_POST['password'];
	require __DIR__.'/ctl/checklogin.php';	
},"mchecklogin");
$rout1->map("POST","/gtls",function(){		
	$_POST = json_decode(file_get_contents('php://input'), true);
	$temploginid=$_POST['expt'];
	require __DIR__.'/ctl/gtls.php';	
});
$rout1->map("GET","/companyprofile",function(){
	require __DIR__.'/views/companyprofile.php';	
});
$rout1->map("GET","/users",function(){
	require __DIR__.'/views/users.php';	
});
$rout1->map("POST","/guf",function(){
	require __DIR__.'/ctl/guf.php';	
});
$rout1->map("POST","/gcm",function(){
	require __DIR__.'/ctl/gcm.php';	
});
$rout1->map("GET","/addu",function(){
	require __DIR__.'/views/add_u.php';	
});
$rout1->map("POST","/usermodules",function(){
	require __DIR__.'/ctl/getmodules.php';	
});
$rout1->map("POST","/getusermod",function(){
	$_POST = json_decode(file_get_contents('php://input'), true);
	$temp_pid=$_POST['id'];
	require __DIR__.'/ctl/getmod.php';	
});
$rout1->map("GET","/edituser",function(){
	require __DIR__.'/views/edit_u.php';	
});
$rout1->map("POST","/updateuser",function(){
	$_POST = json_decode(file_get_contents('php://input'), true);
	$FirstName=$_POST['FirstName'];
	$LastName=$_POST['LastName'];
	$StoreName=$_POST['StoreName'];
	$MobileNo=$_POST['MobileNo'];
	$UserType=$_POST['UserType'];
	$WhatsappNo=$_POST['WhatsappNo'];
	$EmailID=$_POST['EmailID'];
	$Address1=$_POST['Address1'];
	$Address2=$_POST['Address2'];
	$PINCode=$_POST['PINCode'];
	$GSTNo=$_POST['GSTNo'];
	$Password=$_POST['Password'];
	$UType=$_POST['UserType'];
	$uid=$_POST['uid'];
	require __DIR__.'/ctl/uprf.php';	
});
$rout1->map("POST","/userinfo",function(){
	$_POST = json_decode(file_get_contents('php://input'), true);
	$temploginid=$_POST['expt'];
	require __DIR__.'/ctl/gtuinfo.php';	
});
$rout1->map("POST","/getulog",function(){
	$_POST = json_decode(file_get_contents('php://input'), true);
	$userid=$_POST['ulid'];
	require __DIR__.'/ctl/getulog.php';	
});
$rout1->map("GET","/userlog",function(){		
	require __DIR__.'/views/userlog.php';	
});
$rout1->map("POST","/saveuser",function(){
	$FirstName=$_POST['FirstName'];
	$LastName=$_POST['LastName'];
	$StoreName=$_POST['StoreName'];
	$MobileNo=$_POST['MobileNo'];
	$UserType=$_POST['UserType'];
	$WhatsappNo=$_POST['WhatsappNo'];
	$EmailID=$_POST['EmailID'];
	$Address1=$_POST['Address1'];
	$Address2=$_POST['Address2'];
	$PINCode=$_POST['PINCode'];
	$GSTNo=$_POST['GSTNo'];
	$Password=$_POST['Password'];
	$UType=$_POST['UserType'];
	require __DIR__.'/ctl/svprfnu.php';	
});
$rout1->map("POST","/permission",function(){
	$req=$_POST['pdata'];
	$uid=$_POST['uid'];
	require __DIR__.'/ctl/upermission.php';	
});
$rout1->map("GET","/backup",function(){	
	require __DIR__.'/ctl/dbbackup.php';	
});
$rout1->map("GET","/category",function(){	
	require __DIR__.'/views/category.php';	
});
$rout1->map("GET","/subcategory",function(){	
	require __DIR__.'/views/subcategory.php';	
});
$rout1->map("GET","/unitm",function(){	
	require __DIR__.'/views/unitm.php';	
});
$rout1->map("GET","/newunit",function(){	
	require __DIR__.'/views/newunit.php';	
});
$rout1->map("POST","/unitlist",function(){	
	require __DIR__.'/ctl/units.php';	
});
$rout1->map("GET","/brands",function(){	
	require __DIR__.'/views/brands.php';	
});
$rout1->map("POST","/getpcategory",function(){	
	require __DIR__.'/ctl/cg.php';	
});
$rout1->map("POST","/psubcategory",function(){	
	require __DIR__.'/ctl/scg.php';	
});
$rout1->map("POST","/brandlist",function(){	
	require __DIR__.'/ctl/bdns.php';	
});
$rout1->map("POST","/unitgroups",function(){	
	require __DIR__.'/ctl/gtunitgroup.php';	
});
$rout1->map("POST","/productlist",function(){	
	require __DIR__.'/ctl/pg.php';	
});
$rout1->map("POST","/getunits",function(){	
	$_POST = json_decode(file_get_contents('php://input'), true);
	$gname=$_POST['g'];
	require __DIR__.'/ctl/gtgunits.php';	
});
$rout1->map("POST","/scategorylist",function(){	
	$_POST = json_decode(file_get_contents('php://input'), true);
	$cid=$_POST['stext'];
	require __DIR__.'/ctl/scg1.php';	
});
$rout1->map("POST","/saveunit",function(){		
	$unitname=$_POST['unitname'];
	$groupname=$_POST['groupname'];
	$cvalue=$_POST['cvalue'];
	$parentid=$_POST['punit'];	
	require __DIR__.'/ctl/saveunit.php';	
});
$rout1->map("POST","/deleteunit",function(){		
	$_POST = json_decode(file_get_contents('php://input'), true);
	$cid=$_POST['cid'];	
	require __DIR__.'/ctl/dunit.php';	
});

$rout1->map("POST","/savesubcategory",function(){	
	$_POST = json_decode(file_get_contents('php://input'), true);
	$rtype=$_POST['stext'];
	$subcategory=$_POST['sc'];
	require __DIR__.'/ctl/scs.php';	
});
$rout1->map("POST","/savebrand",function(){	
	$_POST = json_decode(file_get_contents('php://input'), true);
	$rtype=$_POST['btext'];	
	require __DIR__.'/ctl/bdnq.php';	
});
$rout1->map("POST","/deletebrand",function(){	
	$_POST = json_decode(file_get_contents('php://input'), true);
	$cid=$_POST['cid'];
	require __DIR__.'/ctl/dbrand.php';	
});
$rout1->map("POST","/savepcategory",function(){	
	$_POST = json_decode(file_get_contents('php://input'), true);
	$rtype=$_POST['stext'];
	require __DIR__.'/ctl/cs.php';	
});
$rout1->map("POST","/saveproduct",function(){	
	//$_POST = json_decode(file_get_contents('php://input'), true);
	$temp_mrp=$_POST['mrp'];
	$temp_cid=$_POST['Cid'];
	$temp_sid=$_POST['Sid'];
	$temp_pname=$_POST['pname'];
	$temp_hsn=$_POST['hsn'];
	$temp_tax=$_POST['tax'];
	$temp_oqty=$_POST['oqty'];
	$sprice=$_POST['salerate'];
	$unit=$_POST['unit'];
	$brandid=$_POST['Brandid'];
	$pprice=$_POST['printingcharge'];
	$sku=$_POST['sku'];
	$rno=$_POST['rackno'];
	$weight=$_POST['weight'];
	$pcolor=$_POST['TColor'];
	require __DIR__.'/ctl/ps.php';	
});
$rout1->map("POST","/deletesubcategory",function(){	
	$_POST = json_decode(file_get_contents('php://input'), true);
	$cid=$_POST['cid'];
	require __DIR__.'/ctl/dsubcg.php';	
});
$rout1->map("POST","/deletepcategory",function(){	
	$_POST = json_decode(file_get_contents('php://input'), true);
	$cid=$_POST['cid'];
	require __DIR__.'/ctl/deletepcategory.php';	
});
$rout1->map("POST","/svcmpup",function(){
	//$_POST = json_decode(file_get_contents('php://input'), true);
	$CompanyID=$_POST['CompanyID'];
	$CompanyName=$_POST['CompanyName'];
	$ContactNo=$_POST['ContactNo'];
	$Address1=$_POST['Address1'];
	$Address2=$_POST['Address2'];
	$State=$_POST['State'];
	$pin=$_POST['pin'];
	$gstno=$_POST['gstno'];
	$EmailID=$_POST['EmailID'];
	$Website=$_POST['Website'];
	$jurisdiction=$_POST['jurisdiction'];
	$bankname=$_POST['bankname'];
	$bankno=$_POST['bankno'];
	$ifsc=$_POST['ifsc'];
	$Dealin=$_POST['Dealin'];
	$Description=$_POST['Description'];
	$Password=$_POST['Password'];
	require __DIR__.'/ctl/svcmpup.php';	
},"mtransaction");
$rout1->map("GET","/admin",function(){
	require __DIR__.'/a/index.php';	
},"admin");
$rout1->map("POST","/chkath",function(){
	$_POST = json_decode(file_get_contents('php://input'), true);
	$md=$_POST['m'];
	$act=$_POST['ta'];
	$uid=$_POST['id'];
	require __DIR__.'/ctl/chkath.php';	
});
$rout1->map("GET","/mtransaction",function(){
	require __DIR__.'/m/tranc.php';	
},"mtranc");
$rout1->map("GET","/productmaster",function(){
	require __DIR__.'/views/itementry.php';	
});

$rout1->map("POST","/kycupdate",function(){
	$tempname=$_POST['memname'];
	$tempdob=$_POST['dob'];
	$tempgender=$_POST["gender"];
	$tempaddress=$_POST["address"];
	$tempmobileno=$_POST["mobileno"];
	$tempemailid=$_POST["emailid"];
	$tempaadhaarno=$_POST["aadhaarno"];
	$tempbankacno=$_POST["bankacno"];
	$tempifsc=$_POST["ifsc"];
	$temppwd=$_POST['pwd'];
	require __DIR__.'/m/profileupdate.php';	
},"kycupdate");

$rout1->map("POST","/regdata",function($postdata){
	$tempname=$_POST['memname'];
	$tempdob=$_POST['dob'];
	$tempgender=$_POST["gender"];
	$tempaddress=$_POST["address"];
	$tempmobileno=$_POST["mobileno"];
	$tempemailid=$_POST["emailid"];
	$tempaadhaarno=$_POST["aadhaarno"];
	$tempbankacno=$_POST["bankacno"];
	$tempifsc=$_POST["ifsc"];
	$tempsponsorid=$_POST["sponsorid"];
	$tempposition=$_POST["position"];
	$tempside=$_POST['pos'];
	require __DIR__.'/views/savemem.php';	
},"savedata");
$rout1->map("POST","/mregdata",function($postdata){
	$tempname=$_POST['memname'];
	$tempdob=$_POST['dob'];
	$tempgender=$_POST["gender"];
	$tempaddress=$_POST["address"];
	$tempmobileno=$_POST["mobileno"];
	$tempemailid=$_POST["emailid"];
	$tempaadhaarno=$_POST["aadhaarno"];
	$tempbankacno=$_POST["bankacno"];
	$tempifsc=$_POST["ifsc"];
	$tempsponsorid=$_POST["sponsorid"];
	$tempposition=$_POST["position"];
	$tempside=$_POST['pos'];
	require __DIR__.'/m/msavemem.php';	
},"msavedata");
$match = $rout1->match();
//echo $rout1->generate("ledgerview",['id'=>10]);
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
	//require __DIR__.$match['target'];	
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');	
}
?>