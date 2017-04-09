<?PHP
include("check_admin.php");
include("request/product.php");

if ($_POST['submit'] === "OK")
{
	if (!create_product($link, $_POST['label'], $_POST['description'], $_POST['img'], $_POST['price'], $_POST['stock']))
	{
		echo "ERROR\n";
		exit;
	}
	header("Location: admin_panel.php?menu=product");
}
?>
<?PHP

include("request/category.php");

$cats = get_all_category($link);

?>
<html>
	<head>
		<title>Ajouter un produit (ADMIN)</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Ajouter un produit (ADMIN)</h1>
		
		<form action="create_product.php" method="post">
			Nom du produit
			<br />
			<input type="text" name="label" value="" autofocus/>
			<br />
			Description
			<br />
			<input type="text" name="description" value="" />
			<br />
			Photo
			<br />
			<input type="text" name="img" value="" />
			<br />
			Prix
			<br />
			<input type="text" name="price" value=""/>
			<br />
			Stock
			<br />
			<input type="text" name="stock" value="" />
			<br />
			CATEGORIES <br />
<?PHP
foreach($cats as $cat)
	echo "<input type='checkbox' name='categories' value='".$cat['id_category']."'> ".$cat['label']."<br \>";

?>
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>
