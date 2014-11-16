<?php

$firmaadi = $_GET['fadi'];
$firmatel = $_GET['ftel'];
$firmaadres = $_GET['fadr'];
$firmayetkili = $_GET['fyet'];
$ID = $_GET['i'];

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}


	$stmt = $baglanti->prepare ("UPDATE `firmalar` SET `firmaadi` = ?, `firmatel` = ? ,`firmaadres` = ? ,`firmayetkili` = ? WHERE `ID` = ?");
	$stmt->bind_param("sssss",$firmaadi,$firmatel,$firmaadres,$firmayetkili,$ID);
	$stmt->execute();




$baglanti->close();
?>