<?PHP
if (!isset($id))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
?>

<a class="add-button" href="create_user.php">Ajouter un utilisateur</a>

<table class="admin-table">
	<tr>
		<th>Login</th>
		<th>Admin</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	</tr>

<?PHP
$users = get_all_user($link);
if (!$users)
	echo '<h2 class="error-empty">Pas d\'utilisateur a afficher</h2>';
foreach ($users as $user)
	echo "<tr>
	<td>".$user['login']."</td>
	<td>".$user['is_admin']."</td>
	<td><a href=modify_user.php?id=".$user['id_user'].">Modifier</a></td>
	<td><a href=delete_user.php?id=".$user['id_user'].">Supprimer</a></td>
	</tr>";
?>
</table>
