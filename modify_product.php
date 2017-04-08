<?PHP
include("check_admin.php");
include("request/product.php");

$prod = get_product($link, $_GET['id']);

if ($_POST['submit'] === "OK")
{
	if (!update_product($link, $_GET['id'], $_POST['label'], $_POST['description'], $_POST['img'], $_POST['price'], $_POST['stock']))
	{
		echo "ERROR\n";
		exit;
	}
	header("Location: admin_panel.php?menu=product");
}
?>

<html>
	<head>
		<title>Modifier un produit (ADMIN)</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Modifier un produit (ADMIN)</h1>
		
		<form action="modify_product.php?id=<?PHP echo $_GET['id'] ?>" method="post">
			Nom du produit
			<br />
			<input type="text" name="label" value="<?PHP echo $prod['label'];?>" autofocus/>
			<br />
			Description
			<br />
			<input type="text" name="description" value="<?PHP echo $prod['description'];?>" />
			<br />
			Photo
			<br />
			<input type="text" name="img" value="<?PHP echo $prod['img'];?>" />
			<br />
			Prix
			<br />
			<input type="text" name="price" value="<?PHP echo $prod['price'];?>"/>
			<br />
			Stock
			<br />
			<input type="text" name="stock" value="<?PHP echo $prod['stock'];?>" />
			<br />
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>
