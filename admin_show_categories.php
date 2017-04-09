<?PHP
if (!isset($id))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
include("request/category.php");
?>

<a class="add-button" href="create_category.php">Ajouter une categorie</a>

<table class="admin-table">
	<tr>
		<th>Label</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	</tr>

<?PHP
$cats = get_all_category($link);
if (!$cats)
	echo "<h2 class=\"error-empty\">Pas de categorie a afficher</h2>";
foreach ($cats as $cat)
	echo "<tr>
	<td>".$cat['label']."</td>
	<td><a href=modify_category.php?id=".$cat['id_category'].">Modifier</a></td>
	<td><a href=delete_category.php?id=".$cat['id_category'].">Supprimer</a></td>
	</tr>";
?>
</table>
