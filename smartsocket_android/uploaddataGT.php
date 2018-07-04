<?php	

include('koneksi.php');

		$id_gateway= $_GET['id_gateway'];
		$suhu= $_GET['suhu'];
		$kelembaban=$_GET['kelembaban'];
		$gas= $_GET['gas'];
		$query = mysql_query("insert into tb_datagt values ('','$id_gateway', '$suhu','$kelembaban', '$gas')") or die(mysql_error());
		
		if ($query) {
		echo "Sukses Create";
	}
	else {
		echo "Gagal Create";
	}


?>	