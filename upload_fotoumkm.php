<?php
if ($_SERVER['REQUEST_METHOD'] =='POST') {
	# code...

	
	$id=$_POST['nik'];
	$photo=$_POST['photo'];


	
	
	require_once 'connect.php';

	$path = "image/$id.jpg";
	$finalPath="http://192.168.43.157/simadesa/apps/".$path;

	$sql ="update tbl_umkm set image='$finalPath' where nik='$id'";


	if (mysqli_query($connn,$sql)) {
		# code...

		if (file_put_contents( $path, base64_decode($photo))) 
		{
			# code...
			$result["success"] = "1";
			$result["message"] = "success";

			echo json_encode($result);
			mysqli_close($connn);

		}
		
	}
}

?>

