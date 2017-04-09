<?PHP
include("check_admin.php");
include("request/category.php");

$cat = get_category($link, $_GET['id']);

if ($_POST['submit'] === "OK")
{
	if (!set_category($link, $_GET['id'], $_POST['label']))
	{
		echo "ERROR\n";
		exit;
	}
	header("Location: admin_panel.php?menu=category");
}
?>

<html>
	<head>
		<title>Modifier une categorie (ADMIN)</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Modifier une categorie (ADMIN)</h1>

		<form action="modify_category.php?id=<?PHP echo $_GET['id'] ?>" method="post">
			Nom de la categorie
			<br />
			<input type="text" name="label" value="<?PHP echo $cat ?>" autofocus/>
			<br />
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>
