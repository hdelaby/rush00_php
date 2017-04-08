<?PHP

session_start();

if ($_POST['submit'] == "OK")
{
	include("request/users.php");
	$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
	if (($key = check_user($link, $_POST['login'], $_POST['passwd'])) !== FALSE);
	{
		$_SESSION['logged_in_user'] = $key;
		header("Location: index.php");
	}
	header("Location: login.php?error=1");
}
?>
<html>
	<head>
		<title>Se connecter</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Se connecter</h1>
		
		<form action="#" method="post">
			Identifiant 
			<br />
			<input type="text" name="login" value="" autofocus/>
			<br />
			Mot de passe
			<br />
			<input type="password" name="passwd" value="" />
			<br />
			<input type="submit" name="submit" value="OK">
		</form>
<?PHP if ($_GET['error'] == 1) echo "<p>Mauvais identifiants</p>"; ?>
	</body>
</html>
