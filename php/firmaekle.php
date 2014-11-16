<?php

$firmaadi = $_GET['fadi'];
$firmatel = $_GET['ftel'];
$firmaadres = $_GET['fadr'];
$firmayetkili = $_GET['fyet'];

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}


	$stmt = $baglanti->prepare ("INSERT INTO `firmalar`(`firmaadi`, `firmatel`,`firmaadres`,`firmayetkili`) VALUES (?,?,?,?)");
	$stmt->bind_param("ssss",$firmaadi,$firmatel,$firmaadres,$firmayetkili);
	$stmt->execute();




$baglanti->close();
?>