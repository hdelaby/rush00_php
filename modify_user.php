<?PHP
include("check_admin.php");

if ($_POST['submit'] === "OK")
{
	if (check_login($link, $_POST['login']))
		exit;
	set_login($link, $_GET['id'], $_POST['admin));
	set_login($link, $_GET['id']);
	set_login($link, $_GET['id']);
	header("Location: admin_panel.php");
}
$login = get_login($link, $_GET['id']);
?>

<html>
	<head>
		<title>Modifier un utilisateur (ADMIN)</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Modifier un utilisateur (ADMIN)</h1>

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
	</body>
</html>
