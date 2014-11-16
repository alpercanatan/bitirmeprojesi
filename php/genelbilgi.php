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
	echo "<b>Firmalar:</b> " . $mesaj['COUNT(ID)'] . "<br>";
	
	$mesaj2 = $sorgu2->fetch_assoc();
	echo "<b>Kullanıcılar:</b> " . $mesaj2['COUNT(ID)'] . "<br>";

	$mesaj3 = $sorgu3->fetch_assoc();
	echo "<b>Teklifler:</b> " . $mesaj3['COUNT(ID)'] . "<br>";

	$mesaj4 = $sorgu4->fetch_assoc();
	echo "<b>Ürünler:</b> " . $mesaj4['COUNT(ID)'];



$baglanti->close();

?>