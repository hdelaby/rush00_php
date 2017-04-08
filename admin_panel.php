<?PHP
include("check_admin.php");
?>
<html>
<head>
	<title>Panneau d'administration</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
<?PHP include("admin_navbar.php"); ?>
<?PHP 
if ($_GET['menu'] === "category")
	include("admin_show_categories.php");
else if ($_GET['menu'] === "product")
	include("admin_show_products.php");
else
	include("admin_show_users.php");
?>
</body>
</html>
