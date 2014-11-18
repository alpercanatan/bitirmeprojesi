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
$sorgu = $baglanti->query("SELECT * FROM `urunler`");
$sorgu2 = $baglanti->query("SHOW COLUMNS FROM `urunler`");
$sorgu3 = $baglanti->query("SHOW COLUMNS FROM `urunler`");
	
echo '<div class="panel panel-primary"><div class="panel-heading">FİRMALAR</div><table class="table"><tr>';

while($sutun = $sorgu2->fetch_assoc())
{
	echo '<th>'.$sutun['Field'].'</th>';
}
echo '</tr>';
	
while($mesaj = $sorgu->fetch_assoc())
{
	echo '<tr><td>'.$mesaj['ID'].'</td>';
	echo '<td>'.$mesaj['UrunKod'].'</td>';
	echo '<td>'.$mesaj['BirimFiyat'].'</td>';
	echo '<td>'.$mesaj['Tarih'].'</td>';
	echo '<td>'.$mesaj['UrunAdi'].'</td>';

	echo '<td><span class="glyphicon glyphicon-pencil"  onclick="urunduzenle('."'".$mesaj['ID']."'".",'".$mesaj['UrunKod']."'".",'".$mesaj['BirimFiyat']."'".",'".$mesaj['Tarih']."'".",'".$mesaj['UrunAdi']."'".');" "aria-hidden="true"></span></td>';
	echo '<td><span class="glyphicon glyphicon-trash" onclick="urunsil('."'".$mesaj['ID']."'".');" aria-hidden="true"></span></td></tr>';

	}
echo '</table></div>';


echo '<div class="panel panel-primary"><div class="panel-heading">URUN KAYIT FORMU</div><table class="table"><tr>';

while($sutun2 = $sorgu3->fetch_assoc())
{
	if ($sutun2['Field'] != "ID")
		{
			echo '<th>'.$sutun2['Field'].'</th>';
		}
	
}
echo '</tr>';

echo '<tr><td><input type="text" class="form-control" id="UrunKod" ></td>';
echo '<td><input type="text" class="form-control" id="BirimFiyat" ></td>';
echo '<td><input type="text" class="form-control" id="Tarih" ></td>';
echo '<td><input type="text" class="form-control" id="UrunAdi" ></td>';
	
echo '<td><span class="glyphicon glyphicon-floppy-saved" onclick="urunkaydet();" aria-hidden="true"></span></td></tr>';

	
echo '</table></div>';
	
$baglanti->close();

?>