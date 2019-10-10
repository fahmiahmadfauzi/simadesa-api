<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...


	require_once 'connect.php';

	$sql = "select * from tbl_potensi ORDER BY id_potensi asc";

	$response = mysqli_query($connn,$sql);

	$json = '{"potensi": [';

	// bikin looping dech array yang di fetch
	while ($row = mysqli_fetch_array($response)){

	//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
	//strip_tag berfungsi untuk menghilangkan tag-tag html pada string 
		$char ='"';

		$json .= 
		'{
			"id_potensi":"'.str_replace($char,'`',strip_tags($row['id_potensi'])).'", 
			"jenis_potensi":"'.str_replace($char,'`',strip_tags($row['jenis_potensi'])).'",
			"nama_potensi":"'.str_replace($char,'`',strip_tags($row['nama_potensi'])).'",
			"deskripsi":"'.str_replace($char,'`',strip_tags($row['deskripsi'])).'",
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