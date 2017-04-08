<?PHP
include("check_admin.php");
include("request/product.php");

if (!del_product($link, $_GET['id']))
{
	echo "ERROR\n";
	exit;
}
header("Location: admin_panel.php?menu=product");
?>
