<?PHP
session_start();

include("request/users.php");
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
if (!is_admin($link, $_SESSION['logged_in_user'], 1))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
?>

<html>
<head>
	<title>Panneau d'administration</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
<?PHP include("admin_navbar.php"); ?>
</body>
</html>
