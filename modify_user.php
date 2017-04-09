<?PHP
include("check_admin.php");

if ($_POST['submit'] === "OK")
{
	set_login($link, $_GET['id'], $_POST['login']);
	if ($_POST['passwd'])
		set_password($link, $_GET['id'], hash("whirlpool", $_POST['password']));
	set_admin($link, $_GET['id'], $_POST['is_admin']);
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
			<input type="text" name="login" value="<?PHP echo $login;?>" autofocus/>
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
