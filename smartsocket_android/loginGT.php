<?php	

include('koneksi.php');

$username = $_GET['username'];
$password = $_GET['password'];
	$q = mysql_query("SELECT username,password FROM tb_reggt where username='$username'and password='$password'");
	$rows = array();
	while($r = mysql_fetch_array($q))
	{
		$rows[] = $r;
	}
print json_encode($rows);
?>