<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...


	require_once 'connect.php';

	$sql = "select * from tbl_umkm a JOIN tbl_penduduk b ON b.nik=a.nik ORDER BY id_umkm DESC";

	$response = mysqli_query($connn,$sql);

	$json = '{"umkm": [';

	// bikin looping dech array yang di fetch
	while ($row = mysqli_fetch_array($response)){

	//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
	//strip_tag berfungsi untuk menghilangkan tag-tag html pada string 
		$char ='"';

		$json .= 
		'{
			"id_umkm":"'.str_replace($char,'`',strip_tags($row['id_umkm'])).'", 
			"nik":"'.str_replace($char,'`',strip_tags($row['nik'])).'",
			"nama_usaha":"'.str_replace($char,'`',strip_tags($row['nama_usaha'])).'",
			"deskripsi":"'.str_replace($char,'`',strip_tags($row['deskripsi'])).'",
			"kontak":"'.str_replace($char,'`',strip_tags($row['kontak'])).'",
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