<?php
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Accept: application/json;charset=UTF-8');
include 'dbconfig.php';$conn= new mysqli($hostname,$username,$pwd,$databasename)or die("Could not connect to mysql".mysqli_error($con));
$searchkey=$_REQUEST['pid'];
$sql = "delete FROM ItemMaster where ProductID=".$searchkey;
$result = $conn->query($sql);
$conn->query("delete FROM stock where ProductID=".$searchkey);

echo "Product Deleted Successfully";

?>