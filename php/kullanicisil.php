<?php

$kullanici = $_GET['k'];

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$sorgu = $baglanti->query("SELECT * FROM `kullanicilar` WHERE `kullanici` LIKE \"$kullanici\" ");


if($sorgu->num_rows == 0)
{
	echo "NO";
}
else if($sorgu->num_rows == 1)
{
	$stmt = ("DELETE FROM `kullanicilar` WHERE `kullanici` = \"$kullanici\"");
	if ($baglanti->query($stmt) === TRUE) {
    echo "OK";
}	 else {
    echo "NO" ;
}
}



$baglanti->close();
?>