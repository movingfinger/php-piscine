<?php
$user = null;
$pass = null;

if (isset($_SERVER['PHP_AUTH_USER']))
{
	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];
	$file = base64_encode(file_get_contents("../img/42.png"));
}

if (($user == 'zaz') && ($pass == 'Ilovemylittleponey'))
{
	echo '<html><body>\n';
	echo 'Hello Zaz<br />\n';
	echo "<img src='data:image/png;base64,$file'>\n";
	echo '</body><html>\n';
}
else
{
	header('WWW-Authenticate: Basoc realm="My Realm"');
	header('HTTP/1.0 401 Unauthorized');
	echo "<html><body>That area is accessible for members only</body></html>\n";
	exit ;
}
?>