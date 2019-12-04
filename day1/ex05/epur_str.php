#!/usr/bin/php
<?php
if (isset($argc))
{
	$str = trim($argv[1]);
	$res = preg_replace('/\s+/', ' ', $str);
	echo "$res\n";
}
?>