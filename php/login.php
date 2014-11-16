<?php
$kullanici = $_GET['k'];
$sifre = $_GET['s'];
include( "config.php" );
$response["sonuc"] = array();
if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$sorgu = $baglanti->query("SELECT * FROM `kullanicilar` WHERE `kullanici` LIKE \"$kullanici\" AND `sifre` LIKE \"$sifre\"");


if($sorgu->num_rows == 1)
{
	$sonuc["cevap"] = 1;
	echo json_encode($sonuc);

}
else if($sorgu->num_rows == 0)
{
	$sonuc["cevap"] = 0;
	echo json_encode($sonuc);
}
	
$baglanti->close();

?>