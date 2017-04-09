<?PHP
include("check_admin.php");
include("request/orders.php");
include("request/product.php");
include("total_basket.php");

$ord = get_order($link, $_GET['id']);

if ($_POST['submit'] === "OK")
{
	if (!update_order($link, $_GET['id'], $_POST['name'], serialize($_SESSION['basket']), total_basket($_SESSION['basket'])))
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
		<title>Modifier une commande (ADMIN)</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>

	<body>
		<h1 style="text-align: center;">Modifier une commande (ADMIN)</h1>

		<form action="modify_order.php?id=<?PHP echo $_GET['id'] ?>" method="post">
      Client :
			<br />
      <select name="name">
        <?php
          foreach ($clients as $value)
          {
            if ($value['login'] == $ord['name'])
              echo ('<option value="'.$value['login'].'" selected>'.$value['login'].'</option>');
            else
              echo ('<option value="'.$value['login'].'">'.$value['login'].'</option>');
          }
        ?>
      </select>
			<br />
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>
