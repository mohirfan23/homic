<?php	

include('koneksi.php');

$id_gateway = $_GET['id_gateway'];
$id_socket = $_GET['id_socket'];
$ip_socket=$_GET['ip_socket'];
$ip_gateway=$_GET['ip_gateway'];
$akses=$_GET['akses'];
$gol_daya=$_GET['gol_daya'];
	$q = mysql_query("SELECT id_gateway,id_socket,ip_gateway,ip_socket,akses,gol_daya FROM tb_reggt where id_gateway='$id_gateway'and id_socket='$id_socket'");
	$rows = array();
	while($r = mysql_fetch_array($q))
	{
		$rows[] = $r;
	}
print json_encode($rows);
?>