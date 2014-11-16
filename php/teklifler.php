<?php
header('Content-Type: text/html; charset=utf-8');
include( "turkce.php" );
include( "config.php" );
$response["sonuc"] = array();
if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$baglanti->query("SET NAMES utf8");
$baglanti->query("SET CHARACTER SET utf8");
$sorgu = $baglanti->query("SELECT  *  FROM `teklifler` order by `OTarihi` desc ");


while($mesaj = $sorgu->fetch_array())
{
	$sonuclar = array();
	$sonuclar["ID"] = $mesaj['ID'];
	$sonuclar["OTarihi"] = $mesaj['OTarihi'];
	$sonuclar["DTarihi"] = $mesaj['DTarihi'];
	$sonuclar["Durum"] = $mesaj['Durum'];
	$sonuclar["Olusturan"] = $mesaj['Olusturan'];
	$sonuclar["Icerik"] = $mesaj['Icerik'];
	$sonuclar["OTarihi"] = $mesaj['OTarihi'];
	$sonuclar["Firma"] = $mesaj['Firma'];
	$sonuclar["Tutar"] = $mesaj['Tutar'];

	
	

	array_push($response["sonuc"], $sonuclar);
}
	echo turkce(json_encode($response));

	
$baglanti->close();

?>