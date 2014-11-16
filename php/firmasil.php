<?php

$ID = $_GET['i'];

include( "config.php" );

if($baglanti->connect_errno)
{
 die('Connect Error: ' . $baglanti->connect_errno);
}

$sorgu = $baglanti->query("SELECT * FROM `firmalar` WHERE `ID` LIKE \"$ID\" ");


if($sorgu->num_rows == 0)
{
	echo "NO";
}
else if($sorgu->num_rows == 1)
{
	$stmt = ("DELETE FROM `firmalar` WHERE `ID` = \"$ID\"");
	if ($baglanti->query($stmt) === TRUE) {
    echo "OK";
}	 else {
    echo "NO" ;
}
}



$baglanti->close();
?>