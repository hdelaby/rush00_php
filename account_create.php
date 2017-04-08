<?PHP

session_start();

if ($_POST['submit'] === 'OK')
{
	include("request/users.php");
	$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
	if (check_login($link, $_POST['login']))
	{
		header("Location: account_create.php?error=1");
		return ;
	}
	create_user($link, $_POST['login'], hash("whirlpool", $_POST['passwd']));
	header("Location: index.php");
}
?>
<html>
	<head>
		<title>Creer un compte</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Creer un compte</h1>
		
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
		<!-- FORMATER CA */ -->
		<?PHP if ($_GET['error'] == 1) echo "<p>Identifiant deja utilise</p>"; ?>
	</body>
</html>
