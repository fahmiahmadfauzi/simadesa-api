<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...
	$id_alat=$_POST['id_alat'];
	$lat=$_POST['lat'];
	$lng=$_POST['lng'];
	
	
	require_once 'connect.php';

	$sql ="update tbl_alat set lat='$lat', lng='$lng', status='Aktif' where id_alat='$id_alat'";

	if (mysqli_query($connn,$sql)) {
		# code...
		$result["success"] = "1";
		$result["message"] = "success";

		echo json_encode($result);
		//mysqli_close();

	}
}else {
	# code...
	$result["success"] ="0";
	$result["message"] ="gagal";
	echo json_encode($result);

	mysqli_close();
}

?>