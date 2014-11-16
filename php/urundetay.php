<?php
header('Content-Type: text/html; charset=utf-8');
$urunkod = $_GET['uk'];
include( "turkce.php" );
include( "config.php" );
$response["sonuc"] = array();
if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$baglanti->query("SET NAMES utf8");
$baglanti->query("SET CHARACTER SET utf8");
$sorgu = $baglanti->query("SELECT `BirimFiyat`, `UrunAdi` FROM `urunler` WHERE `UrunKod` LIKE '$urunkod'");
	
	while($mesaj = $sorgu->fetch_array())
	{
	$sonuclar = array();
	$sonuclar["BirimFiyat"] = $mesaj['BirimFiyat'];
	$sonuclar["UrunAdi"] = $mesaj['UrunAdi'];

	array_push($response["sonuc"], $sonuclar);
	}
	echo turkce(json_encode($response));

	
$baglanti->close();

?>