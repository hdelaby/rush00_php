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
  if (is_array($basket))
  {
    foreach($basket as $val)
	   {
       $product = get_product($link, $val['id_product']);
        echo ("<div class='product'><h2>".$product['label']." (".((int)$product['price'] / 100)."€)</h2>");
		    echo ("<p>Description: ".$product['description']."</p>");
		    echo ("<p>Quantite <b>".$val['quantity']."</b></p>");
		    echo ("<form action='upd_basket.php' method='post'></form></div>");
	     }
       echo ("<h2 style='text-align: right;'>Total : ".($order['total'] / 100)."</h2>");
  }
  else
  {
    echo ("<h2>Pas de produits dans la commande</h2>");
  }
}
?>
</body>
</html>
