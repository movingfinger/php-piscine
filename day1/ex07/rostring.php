#!/usr/bin/php
<?php

if ($argc > 1 && isset($argv))
{
	$res = preg_replace('/\s+/', ' ', $argv[1]);
	$str = preg_split('/\s/', $res);
	for ($i = 1; $i < count($str); $i++)
		echo "$str[$i] ";
	echo "$str[0]\n";
}
?>