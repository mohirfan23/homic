<?php	

include('koneksi.php');

	    $id_socket=$_GET['id_socket'];
		$id_gateway= $_GET['id_gateway'];
		$arus= $_GET['arus'];
		$daya=$_GET['daya'];
		$query = mysql_query("insert into tb_datasocket values ('','$id_socket', '$id_gateway','$arus', '$daya')") or die(mysql_error());
		
		if ($query) {
		echo "Sukses Create";
	}
	else {
		echo "Gagal Create";
	}


?>	