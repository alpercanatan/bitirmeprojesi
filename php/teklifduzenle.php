<?php

$dtarih = date("Y-m-d"); 
$durum = 1 ;
$ID = $_GET['i'];

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}
	echo $dtarih;
	$stmt = $baglanti->prepare ("UPDATE `teklifler` SET `DTarihi` = $dtarih , `Durum` = $durum WHERE `ID` = ?");
	$stmt->bind_param("s",$ID);
	$stmt->execute();


$baglanti->close();
?>