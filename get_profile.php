<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...

	$nik = $_POST['nik'];

	require_once 'connect.php';

	$sql = "select * from tbl_penduduk where nik='$nik'";

	$response = mysqli_query($connn,$sql);

	$result = array();
	$result['read']=array();

	if (mysqli_num_rows($response) === 1) {
		# code...
		if ($row=mysqli_fetch_assoc($response)) {

			# code...
			$index['nik'] = $row['nik'];
			$index['nama'] = $row['nama'];
			$index['alamat'] = $row['alamat'];
			$index['tempat_lahir'] = $row['tempat_lahir'];
			$index['tgl_lahir'] = $row['tgl_lahir'];
			$index['pekerjaan'] = $row['pekerjaan'];
			
			array_push($result["read"], $index);

			$result["success"] = "1";
			echo json_encode($result);
		}

	}else{
		# code...
		$result["success"] ="0";
		$result["message"] ="gagal";
		echo json_encode($result);

		mysqli_close($connn);

	}

}

?>