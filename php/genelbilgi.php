<?php
include( "config.php" );
$response["sonuc"] = array();
if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$sorgu = $baglanti->query("SELECT COUNT(ID) FROM `firmalar`");
$sorgu2 = $baglanti->query("SELECT COUNT(ID) FROM `kullanicilar`");
$sorgu3 = $baglanti->query("SELECT COUNT(ID) FROM `teklifler`");
$sorgu4 = $baglanti->query("SELECT COUNT(ID) FROM `urunler`");


	$mesaj = $sorgu->fetch_assoc();
	echo $mesaj['COUNT(ID)'];
	
	$mesaj2 = $sorgu2->fetch_assoc();
	echo $mesaj2['COUNT(ID)'];

	$mesaj3 = $sorgu3->fetch_assoc();
	echo $mesaj3['COUNT(ID)'];

	$mesaj4 = $sorgu4->fetch_assoc();
	echo $mesaj4['COUNT(ID)'];



$baglanti->close();

?>