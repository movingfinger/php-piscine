#!/usr/bin/php
<?php
function detect_href($str, $i)
{
	$save=[];
	if ($i)
		$str = substr($str, $i, strlen($str));
	$href = strstr($str, '<a href=');
	$href_pos = strpos($str, '<a href=') + $i;
	$check = strpos(substr($str, $href_pos, sizeof($str) - $href_pos), '>') + $href_pos;
	$title_pos = strpos($href, 'title="') + 7;
	if ($title_pos < $check)
	{
		$href_1 = strstr($href, 'title="');
		$href_pos += $title_pos;
		$href = substr($str, $href_pos, strlen($str));
		$end = strpos($href, '">');
		$href = substr($href, $end, strlen($href));
		array_push($save, $href_pos);
		array_push($save, $href_pos + $end);
	}
	$href_pos = strpos($str, '">') + 2 + $i;
	$end = strpos($str, '</a>') + $i;
	$test = substr($str, $end, strlen($str));
	array_push($save, $href_pos);
	array_push($save, $end);
	return $save;
}

function detect_href1($str, $i)
{
	$save=[];
	if ($i)
		$str = substr($str, $i, strlen($str) - $i);
	$href_pos = strpos($str, '<a href=');
	$str = substr($str, $href_pos, sizeof($str) - $href_pos);
	$href_pos += 7;
	$str = substr($str, 7, sizeof($str) - 7);
	$check = strpos($str, '>') + $href_pos;
	$title_pos = strpos($str, 'title="') + 7;
	if ($title_pos < $check)
	{
		$href_1 = strstr($href, 'title="');
		$href_pos += $title_pos;
		$href = substr($str, $href_pos, strlen($str));
		$end = strpos($href, '">');
		$href = substr($href, $end, strlen($href));
		array_push($save, $href_pos + $i);
		array_push($save, $href_pos + $end + $i);
	}
	$href_pos2 = strpos($str, '>') + 2;
	$end = strpos($str, '<');
	array_push($save, $href_pos2 + $i + $href_pos);
	array_push($save, $end + $i + $href_pos);
	return $save;
}

function detect_href2($str, $i)
{
	$save=[];
	if ($i)
		$str = substr($str, $i, strlen($str) - $i);
	$href_pos = strpos($str, '<img');
	$str = substr($str, $href_pos, strlen($str) - $href_pos);
	$href_pos += 4;
	$str = substr($str, 4, strlen($str) - 4);
	$check = strpos($str, '>');
	$title_pos = strpos($str, 'title="') + 4;
	if ($title_pos < $check)
	{		
		$href_pos += $title_pos - 1;
		$href = substr($str, $href_pos, strlen($str));
		$end = strpos($href, '">');
		$href = substr($href, 0, $end);
		echo $href."\n";
		array_push($save, $href_pos + $i + 4);
		array_push($save, $href_pos + $end + $i + 4);
	}
	$href_pos2 = strpos($str, '>') + 2;
	$end = strpos($str, '<');
	array_push($save, $href_pos2 + $i + $href_pos);
	array_push($save, $end + $i + $href_pos);
	return $save;
}
function replace_str($str, $arr)
{
	for ($i = 0; $i < sizeof($arr) / 2; $i++)
	{
		$begin = (int)$arr[$i * 2 + 0];
		$end = (int)$arr[$i * 2 + 1];
		$target = substr($str, $begin, ($end - $begin));
		$target = strtoupper($target);
		$str = substr_replace($str, $target, $begin, $end - $begin);
	}
	echo $str."\n";
}

$save=[];
if ($argc == 2)
{
	$str = file_get_contents($argv[1]);
	$i = (empty($save)) ? 0 : $save[sizeof()($save) - 1];
	$save = detect_href($str, $i);
	$i = (empty($save)) ? 0 : $save[sizeof($save) - 1];
	$save1 = detect_href1($str, $i);
	$save = array_merge($save, $save1);
	$i = (empty($save)) ? 0 : $save[sizeof($save) - 1];
	$save2 = detect_href2($str, $i);
	$save = array_merge($save, $save2);
	replace_str($str, $save);
}
?>
