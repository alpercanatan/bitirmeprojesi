<?php
header('Content-Type: text/html; charset=utf-8');
include( "turkce.php" );
include( "config.php" );
if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$baglanti->query("SET NAMES utf8");
$baglanti->query("SET CHARACTER SET utf8");
$sorgu = $baglanti->query("SELECT * FROM `kullanicilar`");
$sorgu2 = $baglanti->query("SHOW COLUMNS FROM `kullanicilar`");
$sorgu3 = $baglanti->query("SHOW COLUMNS FROM `kullanicilar`");

echo '<div class="panel panel-primary"><div class="panel-heading">KULLANICILAR</div><table class="table"><tr>';

	while($sutun = $sorgu2->fetch_assoc())
	{
		echo '<th>'.$sutun['Field'].'</th>';
	}
	echo '</tr>';

	while($mesaj = $sorgu->fetch_assoc())
	{
		echo '<tr><td>'.$mesaj['ID'].'</td>';
		echo '<td>'.$mesaj['kullanici'].'</td>';
		echo '<td>'.$mesaj['sifre'].'</td>';
	;
	if($mesaj['tur'] == 0)
	{
		echo '<td>'.'mobil'.'</td>';
	}
	else {
		echo '<td>'.'web'.'</td>';
	}

	echo '<td><span class="glyphicon glyphicon-pencil" onclick="kullaniciduzenle('."'".$mesaj['ID']."'".",'".$mesaj['kullanici']."'".",'".$mesaj['sifre']."'".",'".$mesaj['tur']."'".'); "aria-hidden="true"></span></td>';
	echo '<td><span class="glyphicon glyphicon-trash" onclick="kullanicisil('."'".$mesaj['kullanici']."'".');" aria-hidden="true"></span></td></tr>';

	}
	echo '</table></div><br>';

	




	echo '<div class="panel panel-primary"><div class="panel-heading">KULLANICI KAYIT FORMU</div><table class="table"><tr>';

	while($sutun2 = $sorgu3->fetch_assoc())
	{
		if ($sutun2['Field'] != "ID")
		{
			echo '<th>'.$sutun2['Field'].'</th>';
		}
	}
	echo '</tr>';

	
echo '<tr><td><input type="text" class="form-control" id="kullanici" ></td>';
echo '<td><input type="password" class="form-control" id="sifre" ></td>';
	
echo '<td><select id="tur" class="form-control"><option value = "0">Mobil</option><option value = "1">Web</option></select></td>';
	
echo '<td><span class="glyphicon glyphicon-floppy-saved" onclick="kullanicikaydet();" aria-hidden="true"></span></td></tr>';

	
echo '</table></div>';

	
$baglanti->close();

?>