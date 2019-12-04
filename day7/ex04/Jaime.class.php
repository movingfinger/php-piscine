<?php
class Jaime
{
	public function sleepWith($who)
	{
		if ($who instanceof Lannister)
			print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
		else if ($who instanceof Stark)
			print("Let's do this." . PHP_EOL);
		else
			print("Not even if I'm drunk !" . PHP_EOL);
	}
}
?>
