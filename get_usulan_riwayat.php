<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...

$nik =$_POST['nik'];

	require_once 'connect.php';

	$sql = "select * from tbl_usulan where nik='$nik' ORDER BY id_usulan asc";

	$response = mysqli_query($connn,$sql);

	$json = '{"usulan": [';

	// bikin looping dech array yang di fetch
	while ($row = mysqli_fetch_array($response)){

	//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
	//strip_tag berfungsi untuk menghilangkan tag-tag html pada string 
		$char ='"';

		$json .= 
		'{
			"id_usulan":"'.str_replace($char,'`',strip_tags($row['id_usulan'])).'", 
			"nik":"'.str_replace($char,'`',strip_tags($row['nik'])).'",
			"usulan":"'.str_replace($char,'`',strip_tags($row['usulan'])).'",
			"status":"'.str_replace($char,'`',strip_tags($row['status'])).'"
			
			
		},';
	}

	// buat menghilangkan koma diakhir array
	$json = substr($json,0,strlen($json)-1);

	$json .= ']}';

	// print json
	echo $json;
	
	mysqli_close($connn);

}

?>