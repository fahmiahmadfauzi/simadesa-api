<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...


	require_once 'connect.php';

	$sql = "select * from tbl_info ORDER BY id_info desc";

	$response = mysqli_query($connn,$sql);

	$json = '{"info": [';

	// bikin looping dech array yang di fetch
	while ($row = mysqli_fetch_array($response)){

	//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
	//strip_tag berfungsi untuk menghilangkan tag-tag html pada string 
		$char ='"';

		$json .= 
		'{
			"id_info":"'.str_replace($char,'`',strip_tags($row['id_info'])).'", 
			"judul":"'.str_replace($char,'`',strip_tags($row['judul'])).'",
			"deskripsi":"'.str_replace($char,'`',strip_tags($row['deskripsi'])).'",
			"created_at":"'.str_replace($char,'`',strip_tags($row['created_at'])).'",
			"image":"'.str_replace($char,'`',strip_tags($row['image'])).'"
			
			
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