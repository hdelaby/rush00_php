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
if ($_GET['error'] == 1)
	echo "<h2 class='error-empty'>Derniere action non effectuee</h2>";
if ($_SESSION['basket'])
{
	$total_price = 0;
	$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
	foreach($_SESSION['basket'] as $val)
	{
		$product = get_product($link, $val['id_product']);
		$total_price += ((int)$product['price'] * (int)$val['quantity']);
        echo ("<div class='product'><h2>".$product['label']." (".((int)$product['price'] / 100)."€)</h2>");
		echo ("<p>Description: ".$product['description']."</p>");
		echo ("<p>Quantite <b>".$val['quantity']."</b></p>");
		echo ("<form action='upd_basket.php' method='post'>
			<button name='add' value='".$product['id_product']."'>+</button>
			<button class='lessbutton' name='less' value='".$product['id_product']."'>-</button>
			</form></div>");
	}
	echo "<h2 style='text-align: right;'>Total: ".($total_price / 100)."€</h2>";
}
if ($_SESSION['logged_in_user'])
{
	echo "<form action='valid_basket.php'>
		<button name='submit' value='ok'>Valider le panier</button>
	</form>";
}
?>
</body>
</html>
