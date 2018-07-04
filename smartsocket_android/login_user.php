<?php	

include('koneksi.php');

$username = $_GET['username'];
	$q = mysql_query("SELECT username,password FROM tb_akun where username='$username'");
	$rows = array();
	while($r = mysql_fetch_array($q))
	{
		$rows[] = $r;
	}
print json_encode($rows);
?>