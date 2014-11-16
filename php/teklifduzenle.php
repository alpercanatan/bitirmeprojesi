<?php

$dtarih = $_GET['dtar'];
$ID = $_GET['i'];

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}


	$stmt = $baglanti->prepare ("UPDATE `teklifler` SET `DTarihi` = ? WHERE `ID` = ?");
	$stmt->bind_param("ss",$dtarih,$ID);
	$stmt->execute();




$baglanti->close();
?>


