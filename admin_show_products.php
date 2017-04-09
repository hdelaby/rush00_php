<?PHP
if (!isset($id))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
?>
<a class="add-button" href="create_product.php">Ajouter un produit</a>

<table class="admin-table">
	<tr>
		<th>Label</th>
		<th>Prix</th>
		<th>Stock</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	</tr>

<?PHP
include("request/product.php");
$products = get_all_product($link);
if (!$products)
	echo '<h2 class="error-empty">Pas de produit a afficher</h2>';
foreach ($products as $product)
{
	$price = (int)$product['price'];
	$price /= 100;
	echo "<tr>
	<td>".$product['label']."</td>
	<td>".$price."€</td>
	<td>".$product['stock']."</td>
	<td><a href=modify_product.php?id=".$product['id_product'].">Modifier</a></td>
	<td><a href=delete_product.php?id=".$product['id_product'].">Supprimer</a></td>
	</tr>";
}
?>
</table>
