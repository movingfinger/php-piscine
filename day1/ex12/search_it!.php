#!/usr/bin/php
<?php
# remove first element from array
function remove_first($str)
{
	$arr = [];
	for ($i = 1; $i < count($str); $i++)
		array_push($arr, $str[$i]);
	return ($arr);
}

# after removing 2 element from $argv (first is execute file name, and second is target str),
# split the string by delimeter ":", and compare the key value as target.
# If there is matching, return latest value.
if ($argc > 1)
{
	$target = $argv[1];
	$search = remove_first($argv);
	$search = remove_first($search);
	foreach($search as $val)
	{
		$str = explode(':', $val);
		$key = $str[0];
		$value = $str[1];
		if (!strcmp($key, $target))
			$res = $value;
	}
	if (!empty($res))
		echo "$res\n";
}
?>