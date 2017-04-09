<?PHP
include("check_admin.php");
include("request/orders.php");
include("request/product.php");
include("total_basket.php");

if ($_POST['submit'] === "OK")
{
	if (!create_order($link, $_POST['name'], serialize($_SESSION['basket']), total_basket($_SESSION['basket'])))
	{
		echo "ERROR\n";
		exit;
	}
	header("Location: admin_panel.php?menu=order");
}
$clients = get_all_user($link);
?>

<html>
	<head>
		<title>Ajouter une commande (ADMIN)</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Ajouter une commande (ADMIN)</h1>

		<form action="create_order.php" method="post">
			Client :
			<br />
      <select name="name">
        <?php
          foreach ($clients as $value)
          {
              echo ('<option value="'.$value['login'].'">'.$value['login'].'</option>');
          }
        ?>
      </select>
			<br />
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>
