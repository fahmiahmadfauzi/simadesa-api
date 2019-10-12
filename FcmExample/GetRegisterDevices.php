<?php
require_once 'DbOperation.php';

$db=new DbOperation();

$devices = $db->getAllDevices();

$response=array();

$response['error']=false;
$response['device']=array();

while($device=$devices->fetch_assoc())
{
	$temp=array();
	$temp['id']=$device['id'];
	$temp['nik']=$device['nik'];
	$temp['token']=$device['token'];
	array_push($response['device'],$temp);
}
echo json_encode($response);