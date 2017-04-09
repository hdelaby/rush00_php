<?PHP
session_start();
?>

<html>
<head>
	<title>Mon panier</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
<?PHP
include("navbar.php");
include("request/product.php");

if ($_SESSION['basket'])
{
	$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
	foreach($_SESSION['basket'] as $val)
	{
		$product = get_product($link, $val['id_product']);
		echo ("<h2>".$product['label']."</h2>");
		echo ("<p>".$product['description']."</p>");
		echo ("<p>Quantite: ".$val['quantity']."</p>");
	}
}

?>
<form action='valid_basket.php'>
	<button name="submit" value="ok">Valider le panier</button>
</form>
</body>
</html>
