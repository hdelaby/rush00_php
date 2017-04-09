		<div class="navbar">
			<a href="index.php">Accueil</a>
<?PHP
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
include("request/users.php");

	echo ('<a href="basket.php" style="float: right;">Mon panier</a>');
if (!isset($_SESSION['logged_in_user']))
	echo (' <a href="login.php" style="float: right;">Se connecter</a>
			<a href="account_create.php" style="float: right;">Creer un compte</a>');
else
	echo('  <a href=#>'.get_login($link, $_SESSION['logged_in_user']).'</a>
			<a href="logout.php" style="float: right;">Se deconnecter</a>
			<a href="account_delete.php" style="float: right;">Supprimer le compte</a>');
?>
		</div>
