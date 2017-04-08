<?PHP
include("check_admin.php");
include("request/category.php");

if (!del_category($link, $_GET['id']))
{
	echo "ERROR\n";
	exit;
}
header("Location: admin_panel.php?menu=category");
?>
