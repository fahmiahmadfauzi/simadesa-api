<?php


$id_kategori =$_POST['id_kategori'];
$nik =$_POST['nik'];
$created =$_POST['created'];
$ket_layanan =$_POST['ket_layanan'];

require_once 'connect.php';

$insert ="insert into tbl_layanan(id_kategori,nik,created_at,ket_layanan,status) value ('$id_kategori','$nik','$created','$ket_layanan','proses')";


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