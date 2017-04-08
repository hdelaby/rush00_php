<?PHP
session_start();
?>

<html>
<head>
	<title>Mon panier</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
<?PHP
include("navbar.php");

$products = array(array(
	"label" => "Carottes",
	"description" => "Ceci est une carotte"
));
$products[] = array(
	"label" => "Haricots",
	"description" => "Ceci est un haricot"
);

foreach($products as $value)
{
	echo ("<h2>".$value['label']."</h2>");
	echo ("<p>".$value['description']."</p>");
}
?>
</body>
</html>
