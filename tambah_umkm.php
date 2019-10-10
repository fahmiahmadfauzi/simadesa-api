<?php

$nik =$_POST['nik'];
$nama_usaha =$_POST['nama_usaha'];
$deskripsi =$_POST['deskripsi'];
require_once 'connect.php';

$insert ="insert into tbl_umkm(nik,nama_usaha, deskripsi) value ('$nik','$nama_usaha','$deskripsi')";


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