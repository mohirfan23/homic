<?php	

include('koneksi.php');

	    $id_gateway=$_GET['id_gateway'];
		$id_socket= $_GET['id_socket'];
		$ip_gateway=$_GET['ip_gateway'];
		$ip_socket= $_GET['ip_socket'];
		$akses=$_GET['akses'];
		$username=$_GET['username'];
		$password=$_GET['password'];
		$query = mysql_query("update tb_reggt set ip_gateway='$ip_gateway',ip_socket='$ip_socket',akses='$akses' where id_gateway='$id_gateway' and id_socket='$id_socket'") or die(mysql_error());
		
		if ($query) {
		echo "Sukses Create";
	}
	else {
		echo "Gagal Create";
	}


?>	