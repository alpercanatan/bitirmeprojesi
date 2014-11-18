<?php
include( "config.php" );
$response["sonuc"] = array();
if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$sorgu = $baglanti->query("SELECT COUNT(ID) FROM `firmalar`");
$sorgu2 = $baglanti->query("SELECT COUNT(ID) FROM `kullanicilar`");
$sorgu3 = $baglanti->query("SELECT COUNT(ID) FROM `teklifler`");
$sorgu4 = $baglanti->query("SELECT COUNT(ID) FROM `urunler`");


	$mesaj = $sorgu->fetch_assoc();
	echo '<div class="panel panel-primary"><div class="panel-heading">FİRMALAR</div><div class="panel-body"><b>Kayıtlı Firma Sayısı:</b> '. $mesaj['COUNT(ID)'] . '</div></div>';

	$mesaj2 = $sorgu2->fetch_assoc();
	echo '<div class="panel panel-primary"><div class="panel-heading">KULLANICILAR</div><div class="panel-body"><b>Kayıtlı Kullanıcı Sayısı:</b> ' . $mesaj2['COUNT(ID)'] . '</div></div>';

	$mesaj3 = $sorgu3->fetch_assoc();
	echo '<div class="panel panel-primary"><div class="panel-heading">TEKLİFLER</div><div class="panel-body"><b>Kayıtlı Teklif Sayısı:</b> ' . $mesaj3['COUNT(ID)'] . '</div></div>';

	$mesaj4 = $sorgu4->fetch_assoc();
	echo '<div class="panel panel-primary"><div class="panel-heading">ÜRÜNLER</div><div class="panel-body"><b>Kayıtlı Ürün Sayısı:</b> ' . $mesaj4['COUNT(ID)'] . '</div></div>';



$baglanti->close();

?>