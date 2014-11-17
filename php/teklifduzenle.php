<?php

$dtarih = $_GET['dtar'];
$ID = $_GET['i'];
$durum = 1 ;

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}


	$stmt = $baglanti->prepare ("UPDATE `teklifler` SET `DTarihi` = ? `Durum` = ? WHERE `ID` = ?");
	$stmt->bind_param("sss",$dtarih,$durum,$ID);
	$stmt->execute();




$baglanti->close();
?>


