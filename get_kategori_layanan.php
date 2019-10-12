<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...


	require_once 'connect.php';

	$sql = "select * from tbl_kategori_layanan ORDER BY id_kategori asc";

	$response = mysqli_query($connn,$sql);

	$json = '{"layanan": [';

	// bikin looping dech array yang di fetch
	while ($row = mysqli_fetch_array($response)){

	//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
	//strip_tag berfungsi untuk menghilangkan tag-tag html pada string 
		$char ='"';

		$json .= 
		'{
			"id_kategori":"'.str_replace($char,'`',strip_tags($row['id_kategori'])).'", 
			"nama_pelayanan":"'.str_replace($char,'`',strip_tags($row['nama_pelayanan'])).'",
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