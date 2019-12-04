#!/usr/bin/php
<?php
function month($str, $year)
{
	$jan = 31;
	$feb = ($year % 4 == 0) ? 29 : 28;
	$mar = 31;
	$apr = 30;
	$may = 31;
	$jun = 30;
	$jul = 31;
	$aug = 31;
	$sep = 30;
	$oct = 31;
	$nov = 30;
	$dec = 31;

	switch ($str)
	{
		case "Janvier":
			$month = 0;
			break;
		case "Fevrier":
			$month = $jan;
			break;
		case "Mars":
			$month = $jan + $feb;
			break;
		case "Avril":
			$month = $jan + $feb + $mar;
			break;
		case "Mai":
			$month = $jan + $feb + $mar + $apr;
			break;
		case "Juin":
			$month = $jan + $feb + $mar + $apr + $may;
			break;
		case "Juillet":
			$month = $jan + $feb + $mar + $apr + $may + $jun;
			break;
		case "Aout":
			$month = $jan + $feb + $mar + $apr + $may + $jun + $jul;
			break;
		case "Septembre":
			$month = $jan + $feb + $mar + $apr + $may + $jun + $jul + $aug;
			break;
		case "Octobre":
			$month = $jan + $feb + $mar + $apr + $may + $jun + $jul + $aug + $sep;
			break;
		case "Novembre":
			$month = $jan + $feb + $mar + $apr + $may + $jun + $jul + $aug + $sep + $oct;
			break;
		case "Décembre":
			$month = $jan + $feb + $mar + $apr + $may + $jun + $jul + $aug + $sep + $oct + $nov;
			break;
		default:
			$month = 0;		
	}
	return ($month);
}

function month_num($str)
{
	switch (strtolower($str))
	{
		case "janvier":
			$month = 1;
			break;
		case "fevrier":
			$month = 2;
			break;
		case "mars":
			$month = 3;
			break;
		case "avril":
			$month = 4;
			break;
		case "mai":
			$month = 5;
			break;
		case "juin":
			$month = 6;
			break;
		case "juillet":
			$month = 7;
			break;
		case "aout":
			$month = 8;
			break;
		case "septembre":
			$month = 9;
			break;
		case "octobre":
			$month = 10;
			break;
		case "novembre":
			$month = 11;
			break;
		case "décembre":
			$month = 12;
			break;
		default:
			$month = 0;		
	}
	return ($month);
}

function sec_calc($day, $month, $year, $hour, $min, $sec)
{
	$year = ($year - 1970) * 365 * 24 * 60 * 60;
	$month = $month * 24 * 60 * 60;
	$day = ($day - 1) * 24 * 60 * 60;
	$hour = $hour * 60 * 60;
	$min = $min * 60;
	$total = ($year + $month + $day + $hour + $min + $sec);
	return ($total);
}

if ($argc == 1)
{
	echo "\n";
	return ;	
}
else if ($argc == 2)
{
	$time = preg_split('/\s+/', $argv[1]);
	$size = sizeof($time);
	if ($size != 5)
	{
		echo "Wrong Format\n";
		return ;
	}
	else
	{
		$day = (int)$time[1];
		$year = (int)$time[3];
		$month = month($time[2], $year);
		$hms = preg_split('/:/', $time[4]);
		$hour = (int)$hms[0];
		$min = (int)$hms[1];
		$sec = (int)$hms[2];
		$total = sec_calc($day, $month, $year, $hour, $min, $sec);
		//echo "$total\n";
		$date = $year.-month_num($time[2]).-$time[1]." ".$hms[0].":".$hms[1].":".$hms[2];
		//echo "$date\n";
		$d = new DateTime($date, new DateTimeZone('Europe/Paris'));
		echo $d->getTimestamp()."\n";
	}
}
?>