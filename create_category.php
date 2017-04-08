<?PHP
include("check_admin.php");
include("request/category.php");

if ($_POST['submit'] === "OK")
{
	if (!create_category($link, $_POST['label']))
	{
		echo "ERROR\n";
		exit;
	}
	header("Location: admin_panel.php?menu=category");
}
?>

<html>
	<head>
		<title>Ajouter une categorie (ADMIN)</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Ajouter une categorie (ADMIN)</h1>
		
		<form action="create_category.php" method="post">
			Nom de la categorie
			<br />
			<input type="text" name="label" value="" autofocus/>
			<br />
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>
