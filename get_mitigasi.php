<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...

	

	require_once 'connect.php';

	$sql = "SELECT * FROM tbl_mitigasi ORDER BY id_mitigasi asc";

	$query=mysqli_query($connn,$sql);

	$json = '{"mitigasi": [';

	// bikin looping dech array yang di fetch
	while ($row = mysqli_fetch_array($query)){

	//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
	//strip_tag berfungsi untuk menghilangkan tag-tag html pada string 
		$char ='"';

		$json .= 
		'{
			"id_mitigasi":"'.str_replace($char,'`',strip_tags($row['id_mitigasi'])).'", 
			"nama_lokasi":"'.str_replace($char,'`',strip_tags($row['nama_lokasi'])).'",
			"lat":"'.str_replace($char,'`',strip_tags($row['lat'])).'",
			"lng":"'.str_replace($char,'`',strip_tags($row['lng'])).'",
			"keterangan":"'.str_replace($char,'`',strip_tags($row['keterangan'])).'"
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