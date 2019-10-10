<?php

$nik =$_POST['nik'];
$usulan =$_POST['usulan'];
require_once 'connect.php';

$insert ="insert into tbl_usulan(nik,usulan, status) value ('$nik','$usulan','Menunggu')";


$sql = mysqli_query($connn, $insert);


$response=array();

if ($sql) {

		
		$response['code']=1;
	 	$response['message']="succes, data ditambahkan";
	
	 
	# code...
}else{
	 $response['code']=0;
	 $response['message']="gagal, data gagal ditambahkan";
}

echo json_encode($response);


?>