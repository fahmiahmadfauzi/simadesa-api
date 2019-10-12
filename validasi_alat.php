<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...
	$key_alat = $_POST['key_alat'];

	require_once 'connect.php';

	$sql = "select * from tbl_alat where key_alat='$key_alat'";
	$response = mysqli_query($connn,$sql);
	//$result = array();
	$result['validate'] = array();

	if ( mysqli_num_rows($response) === 1) {

		# code...

		$row = mysqli_fetch_assoc($response);

		if ($key_alat == $row['key_alat']) {
			$index['id_alat'] = $row['id_alat'];
			
			

			array_push($result['validate'], $index);

			$result['success'] = "1";
			$result['message'] = "success";
			echo json_encode($result);

			mysqli_close($connn);
			# code...
		}else {
			$result['success'] = "0";
			$result['message'] = "error";
			echo json_encode($result);

			mysqli_close($connn);
		}
	}else {
			$result['success'] = "0";
			$result['message'] = "error";
			echo json_encode($result);

			mysqli_close($connn);
}

}
?>