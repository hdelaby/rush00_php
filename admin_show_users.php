<?PHP
if (!isset($id))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
?>

<a href="create_user.php">Ajouter un utilisateur</a>

<table>
	<tr>
		<th>Login</th>
		<th>Admin</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	</tr>

<?PHP
$users = get_all_user($link);
if (!$users)
	echo "<p>Aucun utilisateur a afficher</p>";
foreach ($users as $user)
	echo "<tr>
	<td>".$user['login']."</td>
	<td>".$user['is_admin']."</td>
	<td><a href=modif_user.php?id=".$user['id_user'].">Modifier</a></td>
	<td><a href=delete_user.php?id=".$user['id_user'].">Supprimer</a></td>
	</tr>";
?>
</table>
