<?php	

include('koneksi.php');
	   
		$id_socket= $_GET['id_socket'];
		$id_gateway= $_GET['id_gateway'];
		
		$gol_daya= $_GET['gol_daya'];
		$ip_socket= $_GET['ip_socket'];
		
		$query1 = mysql_query("insert into tb_regsocket values ('','$id_socket', '$id_gateway','$gol_daya','$ip_socket')") or die(mysql_error());

		
		if ($query1) {
		echo "Sukses Create";
	}
	else {
		echo "Gagal Create";
	}

	
?>	