<?PHP
session_start();

include("request/users.php");
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
if (!is_admin($login
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
