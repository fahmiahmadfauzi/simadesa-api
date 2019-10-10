<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...


	require_once 'connect.php';

	$sql = "select * from tbl_investor ORDER BY id_investor asc";

	$response = mysqli_query($connn,$sql);

	$json = '{"investor": [';

	// bikin looping dech array yang di fetch
	while ($row = mysqli_fetch_array($response)){

	//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
	//strip_tag berfungsi untuk menghilangkan tag-tag html pada string 
		$char ='"';

		$json .= 
		'{
			"id_investor":"'.str_replace($char,'`',strip_tags($row['id_investor'])).'", 
			"nama_investor":"'.str_replace($char,'`',strip_tags($row['nama_investor'])).'",
			"keterangan":"'.str_replace($char,'`',strip_tags($row['keterangan'])).'",
			"kontak":"'.str_replace($char,'`',strip_tags($row['kontak'])).'"
			
			
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