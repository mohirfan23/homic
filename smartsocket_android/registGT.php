<?php	

include('koneksi.php');

	    $id_gateway=$_GET['id_gateway'];
		$id_socket= $_GET['id_socket'];
		$ip_gateway=$_GET['ip_gateway'];
		$ip_socket= $_GET['ip_socket'];
		$akses=$_GET['akses'];
		$username=$_GET['username'];
		$password=$_GET['password'];
		$gol_daya=$_GET['gol_daya'];
		$query1 = mysql_query("insert into tb_reggt values ('','$id_gateway', '$id_socket','$ip_gateway','$ip_socket', '$akses','$username', '$password','$gol_daya')") or die(mysql_error());

		
		if ($query1) {
		echo "Sukses Create";
	}
	else {
		echo "Gagal Create";
	}

	
?>	