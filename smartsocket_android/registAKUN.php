<?php	

include('koneksi.php');

	    $nama=$_GET['nama'];
		$alamat= $_GET['alamat'];
		$no_hp= $_GET['no_hp'];
		$email = $_GET['email'];
		$username = $_GET['username'];
		$password = $_GET['password'];
		$level = 'Pengguna';
		$query = mysql_query("insert into tb_akun values ('','$nama', '$alamat','$no_hp','$username','$password','$level', '$email')") or die(mysql_error());
		
		if ($query) {
		echo "Sukses Create";
	}
	else {
		echo "Gagal Create";
	}


?>	