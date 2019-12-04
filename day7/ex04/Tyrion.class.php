<?php
class Tyrion
{
	public function sleepWith($who)
	{
		if ($who instanceof Stark)
			print("Let's do this." . PHP_EOL);
		else
			print("Not even if I'm drunk !" . PHP_EOL);
	}
}
?>
