<?PHP
if (!isset($id))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
include("request/category.php");
?>

<a href=#>Ajouter une categorie</a>

<table>
	<tr>
		<th>Label</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	</tr>

<?PHP
$cats = get_all_category($link);
if (!$cats)
	echo "<p>Aucune categorie a afficher</p>";
foreach ($cats as $cat)
	echo "<tr>
	<td>".$cat['label']."</td>
	<td><a href=#>Modifier</a></td>
	<td><a href=#>Supprimer</a></td>
	</tr>";
?>
</table>
