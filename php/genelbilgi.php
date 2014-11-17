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
	echo '<div class="group"><h2>FİRMALAR</h2><ul><li id="li_server_info">' . '<b>Kayıtlı Firma Sayısı:</b> '. $mesaj['COUNT(ID)'] . '</li></ul></div>';
	
	$mesaj2 = $sorgu2->fetch_assoc();
	echo '<div class="group"><h2>KULLANICILAR</h2><ul><li id="li_server_info">' . '<b>Kayıtlı Kullanıcı Sayısı:</b> ' . $mesaj2['COUNT(ID)'] . '</li></ul></div>';

	$mesaj3 = $sorgu3->fetch_assoc();
	echo '<div class="group"><h2>TEKLİFLER</h2><ul><li id="li_server_info">' . '<b>Kayıtlı Teklif Sayısı:</b> ' . $mesaj3['COUNT(ID)'] . '</li></ul></div>';

	$mesaj4 = $sorgu4->fetch_assoc();
	echo '<div class="group"><h2>ÜRÜNLER</h2><ul><li id="li_server_info">' . '<b>Kayıtlı Ürün Sayısı:</b> ' . $mesaj4['COUNT(ID)'] . '</li></ul></div>';



$baglanti->close();

?>