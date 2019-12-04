<?php
$action = $_GET['action'];
switch($action)
{
	case 'set':
		if ($_GET['name'] && $_GET['value'])
			setcookie($_GET['name'], $_GET['value'], time() + 86400);
		break;
	case 'get':
		if ($_GET['name'] && $_COOKIE[$_GET['name']])
			echo $_COOKIE[$_GET['name']]."\n";
		break;
	case 'del':
		if ($_GET['name'] && !$_COOKIE[$_GET['name']])
			setcookie($_GET['name'], '', time() - 86400);
		break;
	default:
}
?>