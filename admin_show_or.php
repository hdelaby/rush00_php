<?PHP
if (!isset($id))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}

include("request/orders.php");
include("request/product.php");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
<?PHP
$order = get_order($link, $_GET['id']);
if ($order)
{
  $basket = unserialize($order['content']);
	foreach($basket as $val)
	{
		$product = get_product($link, $val['id_product']);
		echo ("<h2>".$product['label']."</h2>");
		echo ("<p>".$product['description']."</p>");
		echo ("<p>Quantite: ".$val['quantity']."</p>");
	}
}
?>
</body>
</html>
