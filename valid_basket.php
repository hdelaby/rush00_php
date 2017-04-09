<?PHP
session_start();
if (!$_SESSION['logged_in_user'])
	header("Location: index.php");
include('request/users.php');
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
// SERIALIZE THE BASKET BEFORE PUTTING IN IN DB
set_basket($link, $_SESSION['logged_in_user'], $_SESSION['basket']);
?>

<html>
<head>
	<title>Mon panier</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
<?PHP
include("navbar.php");
?>
<h2>Votre panier a ete valide</h2>
<form action='buy.php'>
	<button name="submit" value="ok">Payer</button>
</form>
</body>
</html>
