<?php

$UrunKod = $_GET['ukod'];
$BirimFiyat = $_GET['bfiy'];
$Tarih = $_GET['tar'];
$UrunAdi = $_GET['uadi'];

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}


	$stmt = $baglanti->prepare ("INSERT INTO `urunler`(`UrunKod`, `BirimFiyat`,`Tarih`,`UrunAdi`) VALUES (?,?,?,?)");
	$stmt->bind_param("ssss",$UrunKod,$BirimFiyat,$Tarih,$UrunAdi);
	$stmt->execute();




$baglanti->close();
?>