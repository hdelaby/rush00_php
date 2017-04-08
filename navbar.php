<?PHP

session_start();

?>
		<div class="navbar">
			<a href="index.php">Accueil</a>
<?PHP
if (!isset($_SESSION['logged_in_user']))
	echo (' <a href="login.php" style="float: right;">Se connecter</a>
			<a href="account_create.html" style="float: right;">Creer un compte</a>');
else
	echo ('	<a href="basket.php" style="float: right;">Mon panier</a>
			<a href="logout.php" style="float: right;">Se deconnecter</a>
			<a href="account_modif.html" style="float: right;">Modifier le mot de passe</a>
			<a href="account_delete.html" style="float: right;">Supprimer le compte</a>');
?>
		</div>
