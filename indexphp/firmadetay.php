<?php
header('Content-Type: text/html; charset=utf-8');
$firma = $_GET['f'];
include( "turkce.php" );
include( "config.php" );
$response["sonuc"] = array();
if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}
$baglanti->query("SET NAMES utf8");
$baglanti->query("SET CHARACTER SET utf8");
$sorgu = $baglanti->query("SELECT `firmatel`, `firmaadres`, `firmayetkili` FROM `firmalar` WHERE `firmaadi` LIKE '$firma'");

while($mesaj = $sorgu->fetch_array())
{
	$sonuclar = array();
	$sonuclar["firmatel"] = $mesaj['firmatel'];
	$sonuclar["firmaadres"] = $mesaj['firmaadres'];
    $sonuclar["firmayetkili"] = $mesaj['firmayetkili']; 
	

	array_push($response["sonuc"], $sonuclar);
}
	echo turkce(json_encode($response));

$baglanti->close();

?>