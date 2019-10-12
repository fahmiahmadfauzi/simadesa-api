<?php

$id_alat =$_POST['id_alat'];
$nik =$_POST['nik'];
$created =date("Y-m-d");
require_once 'connect.php';

$insert ="insert into tbl_regis_alat(id_alat,nik, created_at) value ('$id_alat','$nik','$created')";



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