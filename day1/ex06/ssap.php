#!/usr/bin/php
<?php
$arr = [];
if ($argc > 1)
{
	for ($i = 1; $i < $argc; $i++)
	{
		if (preg_match('/\s/', $argv[$i]))
		{
			$str = preg_replace('/\s+/', ' ', trim($argv[$i]));
			$str = preg_split('/\s/', $str);
			foreach($str as $val)
				array_push($arr, $val);
		}
		else
		array_push($arr, $argv[$i]);
	}
	sort($arr);
	foreach($arr as $res)
		echo "$res\n";
}
?>
