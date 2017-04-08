<?PHP
if (!isset($id))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
include("request/product.php");
?>

<a href=#>Ajouter un produit</a>

<table>
	<tr>
		<th>Label</th>
		<th>Prix</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	</tr>

<?PHP
$products = get_all_product($link);
if (!$products)
	echo "<p>Pas de produit a afficher</p>";
foreach ($products as $product)
	echo "<tr>
	<td>".$product['label']."</td>
	<td>".$product['price']."</td>
	<td><a href=#>Modifier</a></td>
	<td><a href=#>Supprimer</a></td>
	</tr>";
?>
</table>
