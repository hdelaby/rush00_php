<?PHP
session_start();
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
include('request/category.php');
?>
<html>
	<head>
		<title>Site de e-commerce propre</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<?PHP include("navbar.php");
		if ($_GET['buy'] == 1)
			echo ('<h2>Merci de votre achat</h2>');
		?>
	<ul class="category">
		<li>CATEGORIES</li>
		<li><a href="index.php">Tous</a></li>
		<?php
		$category = get_all_category($link);
		foreach ($category as $cat) {
			echo('<li><a href="index.php?category='.$cat['label'].'">'.$cat['label'].'</a></li>');
		}
		?>
	</ul>
	<div class="float">
		<?PHP include("display_product.php"); ?>
	</div>
	</body>
</html>
