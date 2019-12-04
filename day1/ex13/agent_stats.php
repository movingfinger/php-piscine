#!/usr/bin/php
<?php
function remove_first($str)
{
	$arr = [];
	for ($i = 1; $i < count($str); $i++)
		array_push($arr, $str[$i]);
	return ($arr);
}

function grade($str)
{
	$res = [];
	$count = 0;
	$avg = 0;
	$std = explode(':', $str[0]);
	for ($i = 0; $i < sizeof($str); $i++)
	{
		$line = explode(':', $str[$i]);
		if (!strcmp($std[0], $line[0]))
		{
			$avg += (int)$line[1];
			$count++;
		}
		else
		{
			array_push($res, $std[0].':'.($avg / $count));
			$std[0] = $line[0];
			$avg = 0;
			$avg += (int)$line[1];
			$count = 1;
		}
		if ($i == sizeof($str) - 1)
		{
			$avg += (int)$line[1];
			$count++;
			array_push($res, $std[0].':'.($avg / $count));
		}
	}
	return ($res);
}

function print_avg($user)
{
	$val = 0;
	for ($i = 0; $i < sizeof($user); $i++)
	{
		$user_res = explode(":", $user[$i]);
		$val += $user_res[1];
	}
	$val /= (sizeof($user) + 1);
	echo "$val\n";
}

function print_user($str)
{
	for ($i = 0; $i < sizeof($str); $i++)
		echo "$str[$i]\n";
}

function print_moul($user, $moul)
{
	for ($i = 0; $i < sizeof($user); $i++)
	{
		$user_res = explode(":", $user[$i]);
		$moul_res = explode(":", $moul[$i]);
		$val = $user_res[1] - $moul_res[1];
		echo "$user_res[0]:$val\n";
	}
}

$user = [];
$moul = [];
$user_res = [];
$moul_res = [];
$tab = file('php://stdin');
$file = remove_first($tab);
foreach($file as $line)
{
	$str = explode(';', $line);
	if (!empty ($str[1]))
	{
		if (strcmp($str[2], "moulinette"))
			array_push($user, $str[0].':'.$str[1]);
		else
			array_push($moul, $str[0].':'.$str[1]);

	}
}
sort($user);
sort($moul);
if ($argc == 1)
	return ;
if (!strcmp($argv[1], "average"))
{
	print_avg($user);
}
else
if (!strcmp($argv[1], "average_user"))
{
	$user_res = grade($user);
	print_user($user_res);
}
else if (!strcmp($argv[1], "moulinette_variance"))
{
	$user_res = grade($user);
	$moul_res = grade($moul);
	print_moul($user_res, $moul_res);
}
?>