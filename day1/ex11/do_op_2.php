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

if ($argc != 2)
	echo "Incorrect Parameters\n";
else
{
	$str = trim($argv[1]);
	$n1 = (int)$str;
	$hay = strpos($str, (string)$n1);
	$count = strlen($str) - strlen((string)$n1) - $hay;
	$left = substr($str, $hay + strlen((string)$n1) + 1, $count - 1);
	$op = $left[0];
	if (!preg_match('/\+|\-|\*|\/|\%/', $op))
	{
		echo "Syntax Error\n";
		return ;
	}
	$n2 = (int)substr($left, 1);
	do_op($n1, $n2, $op);
}
?>