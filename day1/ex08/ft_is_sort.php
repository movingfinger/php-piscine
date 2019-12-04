#!/usr/bin/php
<?php
function ft_is_sort($tab)
{
	if (isset($tab))
	{
		$res = $tab;
		sort($tab);
		for ($i = 0; $i < count($tab); $i++)
			if (strcmp($tab[$i], $res[$i]))
				return 0;
		return 42;
	}
}
?>