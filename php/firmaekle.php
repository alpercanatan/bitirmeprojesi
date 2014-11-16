<?php
header('Content-Type: text/html; charset=utf-8');
$firmaadi = $_GET['fadi'];
$firmatel = $_GET['ftel'];
$firmaadres = $_GET['fadr'];
$firmayetkili = $_GET['fyet'];
include( "config.php" );
$response["sonuc"] = array();
if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}
$baglanti->query("SET NAMES utf8");
$baglanti->query("SET CHARACTER SET utf8");
$sorgu = $baglanti->query("SELECT * FROM `firmalar` WHERE `firmaadi` LIKE '$firmaadi'");


	if($sorgu->num_rows == 1)
	{
		$sonuc["cevap"] = 0;
	}
	else if($sorgu->num_rows == 0)
	{	
		$stmt = $baglanti->prepare ("INSERT INTO `firmalar` (`firmaadi`, `firmatel`, `firmaadres`, `firmayetkili`) VALUES (?,?,?,?);");
		$stmt->bind_param("ssss",$firmaadi,$firmatel,$firmaadres,$firmayetkili);
		$stmt->execute();
		$sonuc["cevap"] = 1;
	}


	echo json_encode($sonuc);

$baglanti->close();

?>