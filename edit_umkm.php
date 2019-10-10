<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...
	$id_umkm=$_POST['id_umkm'];
	$nik=$_POST['nik'];
	$nama_usaha=$_POST['nama_usaha'];
	$deskripsi=$_POST['deskripsi'];
	
	require_once 'connect.php';

	$sql ="update tbl_umkm set nama_usaha='$nama_usaha', deskripsi='$deskripsi' where id_umkm='$id_umkm'";

	if (mysqli_query($connn,$sql)) {
		# code...
		$result["success"] = "1";
		$result["message"] = "success";

		echo json_encode($result);
		mysqli_close();

	}
}else {
	# code...
	$result["success"] ="0";
	$result["message"] ="gagal";
	echo json_encode($result);

	mysqli_close();
}

?>