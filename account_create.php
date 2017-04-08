<?PHP

include("request/users.php");
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
create_user($link, 'toto', 'vache');
print_r(check_connect($link, 'toto', 'vache'));
/* header("Location: index.php"); */
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
	</body>
</html>
