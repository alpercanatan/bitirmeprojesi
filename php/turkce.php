	<?php
	function turkce($php)
	{
	$php = str_replace("\u0131","ı",$php);
	$php = str_replace("\u0130","İ",$php);
    $php = str_replace("\u00fc","ü",$php);
	$php = str_replace("\u00dc","Ü",$php);
	$php = str_replace("\u011f","ğ",$php);
    $php = str_replace("\u011e","Ğ",$php);
	$php = str_replace("\u00f6","ö",$php);
	$php = str_replace("\u00d6","Ö",$php);
	$php = str_replace("\u015f","ş",$php);
	$php = str_replace("\u015e","Ş",$php);
	$php = str_replace("\u00e7","ç",$php);
	$php = str_replace("\u00c7","Ç",$php);
	return $php;
	}
	?>