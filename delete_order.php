<?PHP
include("check_admin.php");
include("request/orders.php");

if (!del_order($link, $_GET['id']))
{
	echo "ERROR\n";
	exit;
}
header("Location: admin_panel.php?menu=order");
?>
