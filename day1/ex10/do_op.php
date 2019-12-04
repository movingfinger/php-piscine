#!/usr/bin/php
<?php
function do_op($n1, $n2, $op)
{
	switch ($op)
	{
		case "+":
			echo ($n1 + $n2) . "\n";
			break;
		case "-":
			echo ($n1 - $n2) . "\n";
			break;
		case "*":
			echo ($n1 * $n2) . "\n";
			break;
		case "/":
			echo ($n1 / $n2) . "\n";
			break;
		case "%":
			echo ($n1 % $n2) . "\n";
			break;
		default:
			break;
	}
}

if ($argc != 4)
	echo "Incorrect Parameters\n";
else
{
	$n1 = intval($argv[1]);
	$n2 = intval($argv[3]);
	$op = trim($argv[2]);
	do_op($n1, $n2, $op);
}
?>