<?php
session_start();

if ($_GET && isset($_GET['submit']) && $_GET['submit'] == 'OK')
{
	if (isset($_GET['login']) && !empty($_GET['login']))
		$_SESSION['login'] = $_GET['login'];
	if (isset($_GET['passwd']) && !empty($_GET['passwd']))
		$_SESSION['passwd'] = $_GET['passwd'];
}

$login = '';
$passwd = '';
if (isset($_SESSION) && $_SESSION['login'])
	$login = $_SESSION['login'];
if (isset($_SESSION) && $_SESSION['passwd'])
	$passwd = $_SESSION['passwd'];
?>

<!DOCTYPE html>
<html>
<head>
	<form action="" method="get">
		username: <input type='text' name='login' value="<?= $login ?>"><br>
		password: <input type='text' name='passwd' value='<?= $passwd ?>'><br>
		<button name='submit' type='submit' value='OK'>SUBMIT</button>
	</form>
</body>
</html>