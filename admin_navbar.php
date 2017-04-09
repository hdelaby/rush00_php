<?PHP
if (!isset($id))
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
?>

	<div class="navbar">
		<a href="index.php">Accueil</a>
		<a href="admin_panel.php?menu=order" style="float: right;">Commandes</a>
		<a href="admin_panel.php?menu=product" style="float: right;">Produits</a>
		<a href="admin_panel.php?menu=category" style="float: right;">Categories</a>
		<a href="admin_panel.php" style="float: right;">Utilisateurs</a>
	</div>
