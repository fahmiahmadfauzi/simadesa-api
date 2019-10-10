<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...
	$username = $_POST['username'];
	$password = $_POST['password'];

	require_once 'connect.php';

	$sql = "select * from tbl_akun where username='$username'";
	$response = mysqli_query($connn,$sql);
	//$result = array();
	$result['login'] = array();

	if ( mysqli_num_rows($response) === 1) {

		# code...

		$row = mysqli_fetch_assoc($response);

		if ($password == $row['password']) {
			$index['id_akun'] = $row['id_akun'];
			$index['nik'] = $row['nik'];
			
			

			array_push($result['login'], $index);

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
	}
}


?>