<?PHP
include("check_admin.php");

if ($_POST['submit'] === "OK")
{
	if (check_login($link, $_POST['login']))
		exit;
	if (!create_user($link, $_POST['login'], hash("whirlpool", $_POST['passwd'])))
	{
		echo "ERROR\n";
		exit;
	}
	set_admin($link, check_login($link, $_POST['login']), $_POST['is_admin']);
	header("Location: admin_panel.php");
}
?>

<html>
	<head>
		<title>Ajouter un utilisateur (ADMIN)</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Ajouter un utilisateur (ADMIN)</h1>

		<form action="#" method="post">
			Identifiant
			<br />
			<input type="text" name="login" value="" autofocus/>
			<br />
			Mot de passe
			<br />
			<input type="password" name="passwd" value="" />
			<br />
			<input type="radio" name="is_admin" value="1">Admin<br />
			<input type="radio" name="is_admin" value="0" checked>Pas admin<br />
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>
