<?php

$kullanici = $_GET['k'];
$sifre = $_GET['s'];
$tur = $_GET['t'];

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$sorgu = $baglanti->query("SELECT * FROM `kullanicilar` WHERE `kullanici` LIKE \"$kullanici\" ");


if($sorgu->num_rows == 1)
{
	echo "NO";
}
else if($sorgu->num_rows == 0)
{
	$stmt = $baglanti->prepare ("INSERT INTO `kullanicilar`(`kullanici`, `sifre`,`tur`) VALUES (?,?,?)");
	$stmt->bind_param("sss",$kullanici,$sifre,$tur);
	$stmt->execute();
	echo "OK";
}



$baglanti->close();
?>