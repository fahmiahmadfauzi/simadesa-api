<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...

	$cari = $_POST['cari'];

	require_once 'connect.php';

	$sql = "SELECT * FROM tbl_umkm where concat(nama_usaha, deskripsi) like '%$cari%'";

	$query=mysqli_query($connn,$sql);

	$json = '{"cari": [';

	// bikin looping dech array yang di fetch
	while ($row = mysqli_fetch_array($query)){

	//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
	//strip_tag berfungsi untuk menghilangkan tag-tag html pada string 
		$char ='"';

		$json .= 
		'{
			"id_umkm":"'.str_replace($char,'`',strip_tags($row['id_umkm'])).'", 
			"nik":"'.str_replace($char,'`',strip_tags($row['nik'])).'",
			"nama_usaha":"'.str_replace($char,'`',strip_tags($row['nama_usaha'])).'",
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