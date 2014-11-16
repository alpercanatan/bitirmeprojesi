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
$sorgu = $baglanti->query("SELECT * FROM `kullanicilar`");
	
	while($mesaj = $sorgu->fetch_array())
	{
	$sonuclar = array();
	$sonuclar["ID"] = $mesaj['ID'];
	$sonuclar["kullanici"] = $mesaj['kullanici'];
	if($mesaj['tur'] == 0)
	{
	$sonuclar["tur"] = "mobil";	
	}
	else {
    $sonuclar["tur"] = "web";	
	}


	array_push($response["sonuc"], $sonuclar);
	}
	echo turkce(json_encode($response));

	
$baglanti->close();

?>