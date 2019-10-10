<?php

$nik =$_POST['nik'];
$nama =$_POST['nama'];
$alamat =$_POST['alamat'];
$tempat_lahir=$_POST['tempat_lahir'];
$tgl_lahir =$_POST['tgl_lahir'];
$jk =$_POST['jk'];
$agama =$_POST['agama'];
$status =$_POST['status'];
$pekerjaan =$_POST['pekerjaan'];
$kontak =$_POST['kontak'];
$username =$_POST['username'];
$password =$_POST['password'];

require_once 'connect.php';

$insert ="insert into tbl_penduduk(nik, nama, alamat, tempat_lahir,tgl_lahir, jk, agama, status_kawin, pekerjaan, kontak) value ('$nik','$nama','$alamat','$tempat_lahir','$tgl_lahir','$jk','$agama','$status','$pekerjaan','$kontak')";
$insert2 ="insert into tbl_akun (nik, username, password, level) value ('$nik','$username','$password','warga')";


$sql = mysqli_query($connn, $insert);
$sql2 = mysqli_query($connn, $insert2);


$response=array();

if ($sql) {

	if ($sql2) {
		# code...
		$response['code']=1;
	 	$response['message']="succes, data ditambahkan";
	}
	 
	# code...
}else{
	 $response['code']=0;
	 $response['message']="gagal, data gagal ditambahkan";
}

echo json_encode($response);


?>