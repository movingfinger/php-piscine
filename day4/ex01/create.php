<?php
session_start();

if (!$_POST || !isset($_POST['submit']) || $_POST['submit'] !== "OK")
	exit("ERROR\n");
if (!isset($_POST['login']) || empty($_POST['login']))
	exit("ERROR\n");
if (!isset($_POST['passwd']) || empty($_POST['passwd']))
	exit("ERROR\n");
$users = file_get_contents('../private/passwd');
if (!$users)
{
	$users = '';
	mkdir('../private');
}
else
	$arr = unserialize($users);

foreach ($arr as $val)
{
	if ($val['login'] == $_POST['login'])
	{
		echo "ERROR\n";
		return ;
	}
}
$tab['login'] = $_POST['login'];
$tab['passwd'] = hash('sha256', $_POST['passwd']);
$arr[] = $tab;
file_put_contents("../private/passwd", serialize($arr));
    echo "OK\n";
?>