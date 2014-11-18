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
$sorgu = $baglanti->query("SELECT  *  FROM `teklifler` order by `OTarihi` desc ");
$sorgu2 = $baglanti->query("SHOW COLUMNS FROM `teklifler`");
$sorgu3 = $baglanti->query("SHOW COLUMNS FROM `teklifler`");
	
	echo '<div class="panel panel-primary"><div class="panel-heading">FİRMALAR</div><table class="table"><tr>';

while($sutun = $sorgu2->fetch_assoc())
{
	echo '<th>'.$sutun['Field'].'</th>';
}
echo '</tr>';

while($mesaj = $sorgu->fetch_assoc())
{
	echo '<tr><td>'.$mesaj['ID'].'</td>';
	echo '<td>'.$mesaj['OTarihi'].'</td>';
	echo '<td>'.$mesaj['DTarihi'].'</td>';
	if($mesaj['Durum'] == 1)
	{
		echo '<td><span class="glyphicon glyphicon-ok"  "aria-hidden="true"></span></td>';
	}
	else {
		echo '<td><span class="glyphicon glyphicon-remove"  onclick="teklifonayla('."'".$mesaj['ID']."'".');" "aria-hidden="true"></span></td>';
	}
	echo '<td>'.$mesaj['Olusturan'].'</td>';
	echo '<td>'.$mesaj['Icerik'].'</td>';
	echo '<td>'.$mesaj['Firma'].'</td>';
	echo '<td>'.$mesaj['Tutar'].'</td>';
	echo '<td><span class="glyphicon glyphicon-trash" onclick="teklifsil('."'".$mesaj['ID']."'".');" aria-hidden="true"></span></td></tr>';

	
}
echo '</table></div>'.'*Onaylanmamış teklifin iconuna tıklayarak onaylama işlemi yapabilirsiniz.';

	
$baglanti->close();

?>