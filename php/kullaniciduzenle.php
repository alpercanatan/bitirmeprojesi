<?php

$kullanici = $_GET['k'];
$sifre = $_GET['s'];
$tur = $_GET['t'];
$ID = $_GET['i'];

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
	$stmt = $baglanti->prepare ("UPDATE `kullanicilar` SET `kullanici` = ? , `sifre` = ? ,`tur` = ?   WHERE `ID` = ?");
	$stmt->bind_param("ssss",$kullanici,$sifre,$tur,$ID);
	$stmt->execute();
	echo "OK";
}



$baglanti->close();
?>

