<?php
if ($_SERVER['REQUEST_METHOD'] =='POST') {
	# code...

	
	$id=$_POST['id_umkm'];
	


	
	
	require_once 'connect.php';

	

	$sql ="delete from tbl_umkm where id_umkm='$id'";


	if (mysqli_query($connn,$sql)) {
		# code...

		
			# code...
			$result["success"] = "1";
			$result["message"] = "success";

			echo json_encode($result);
			mysqli_close($connn);

		
	}
}

?>

