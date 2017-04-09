<?PHP
if (!isset($id))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
include("request/orders.php");
?>

<a class="add-button" href="create_order.php">Ajouter une commande</a>

<table class="admin-table">
	<tr>
    <th>Client</th>
		<th>Prix</th>
		<th>Panier</th>
    <th>Modifier</th>
		<th>Supprimer</th>
	</tr>

<?PHP
$orders = get_all_orders($link);
if (!$orders)
	echo "<h2 class=\"error-empty\">Pas de commandes a afficher</h2>";
foreach ($orders as $ord)
	echo "<tr>
  <td>".$ord['name']."</td>
	<td>".($ord['total'] / 100)."</td>
	<td><a href=admin_panel.php?menu=or&id=".$ord['id_order'].">Panier</a></td>
  <td><a href=modify_order.php?id=".$ord['id_order'].">Modifier</a></td>
	<td><a href=delete_order.php?id=".$ord['id_order'].">Supprimer</a></td>
	</tr>";
?>
</table>
