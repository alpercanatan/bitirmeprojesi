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
$sorgu = $baglanti->query("SELECT * FROM `firmalar`");
$sorgu2 = $baglanti->query("SHOW COLUMNS FROM `firmalar`");
$sorgu3 = $baglanti->query("SHOW COLUMNS FROM `firmalar`");
	
echo '<div class="panel panel-primary"><div class="panel-heading">FİRMALAR</div><table class="table"><tr>';

while($sutun = $sorgu2->fetch_assoc())
{
	echo '<th>'.$sutun['Field'].'</th>';
}
echo '</tr>';

while($mesaj = $sorgu->fetch_assoc())
{
	echo '<tr><td>'.$mesaj['ID'].'</td>';
	echo '<td>'.$mesaj['firmaadi'].'</td>';
	echo '<td>'.$mesaj['firmatel'].'</td>';
	echo '<td>'.$mesaj['firmaadres'].'</td>';
	echo '<td>'.$mesaj['firmayetkili'].'</td>';
	echo '<td><span class="glyphicon glyphicon-pencil"  onclick="firmaduzenle('."'".$mesaj['ID']."'".",'".$mesaj['firmaadi']."'".",'".$mesaj['firmatel']."'".",'".$mesaj['firmaadres']."'".",'".$mesaj['firmayetkili']."'".');" "aria-hidden="true"></span></td>';
	echo '<td><span class="glyphicon glyphicon-trash" onclick="firmasil('."'".$mesaj['ID']."'".');" aria-hidden="true"></span></td></tr>';
}
echo '</table></div>';


echo '<div class="panel panel-primary"><div class="panel-heading">FİRMA KAYIT FORMU</div><table class="table"><tr>';

while($sutun2 = $sorgu3->fetch_assoc())
{
	if ($sutun2['Field'] != "ID")
		{
			echo '<th>'.$sutun2['Field'].'</th>';
		}
	
}
echo '</tr>';

echo '<tr><td><input type="text" class="form-control" id="firmaadi" ></td>';
echo '<td><input type="text" class="form-control" id="firmatel" ></td>';
echo '<td><input type="text" class="form-control" id="firmaadres" ></td>';
echo '<td><input type="text" class="form-control" id="firmayetkili" ></td>';
	
echo '<td><span class="glyphicon glyphicon-floppy-saved" onclick="firmakaydet();" aria-hidden="true"></span></td></tr>';

	
echo '</table></div>';

$baglanti->close();

?>