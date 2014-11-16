<?php
header('Content-Type: text/html; charset=utf-8');
$firmaadi = $_GET['f'];
include( "turkce.php" );
include( "config.php" );
$response["sonuc"] = array();
if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$baglanti->query("SET NAMES utf8");
$baglanti->query("SET CHARACTER SET utf8");
$sorgu = $baglanti->query("SELECT  `OTarihi` , `Tutar` , `Durum`  FROM `teklifler` WHERE `Firma` LIKE '$firmaadi' order by `OTarihi` desc ");


while($mesaj = $sorgu->fetch_array())
{
	$sonuclar = array();
	$sonuclar["OTarihi"] = $mesaj['OTarihi'];
	$sonuclar["Tutar"] = $mesaj['Tutar'];
	$sonuclar["Durum"] = $mesaj['Durum'];

	
	

	array_push($response["sonuc"], $sonuclar);
}
	echo turkce(json_encode($response));

	
$baglanti->close();

?>