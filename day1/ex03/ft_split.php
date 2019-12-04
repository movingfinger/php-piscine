#!/usr/bin/php
<?php
function ft_split($string)
{
	$string = preg_split('/\s+/', $string);
	sort($string);
	return ($string);
}
?>