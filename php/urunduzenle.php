<?php

$UrunKod = $_GET['ukod'];
$BirimFiyat = $_GET['bfiy'];
$Tarih = $_GET['tar'];
$UrunAdi = $_GET['uadi'];
$ID = $_GET['i'];

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}


	$stmt = $baglanti->prepare ("UPDATE `urunler` SET `UrunKod` = ? , `BirimFiyat` = ? ,`Tarih` = ? ,`UrunAdi` = ? WHERE `ID` = ?");
	$stmt->bind_param("sssss",$UrunKod,$BirimFiyat,$Tarih,$UrunAdi,$ID);
	$stmt->execute();




$baglanti->close();
?>

