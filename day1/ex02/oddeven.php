#!/usr/bin/php
<?php
while (1)
{
	echo "Enter a number: ";
	$line = trim(fgets(STDIN));
	if (feof(STDIN))
	{
		echo "\n";
		return ;
	}
	if (is_numeric($line))
	{
		$n = intval($line);
		if ($n % 2 == 0)
			echo "$n is even\n";
		else
			echo "$n is odd\n";
	}
	else
		echo "'$line' is not a number\n";
}
?>
