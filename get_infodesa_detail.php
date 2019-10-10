<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...

	$id = $_POST['id_info'];

	require_once 'connect.php';

	$sql = "select * from tbl_info where id_info='$id'";

	$response = mysqli_query($connn,$sql);

	$result = array();
	$result['read']=array();

	if (mysqli_num_rows($response) === 1) {
		# code...
		if ($row=mysqli_fetch_assoc($response)) {

			# code...
			$index['judul'] = $row['judul'];
			$index['deskripsi'] = $row['deskripsi'];
			$index['image'] = $row['image'];
			$index['created_at'] = $row['created_at'];
			
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