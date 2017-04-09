<?PHP
session_start();
include('request/users.php');
include('request/orders.php');
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
set_basket($link, $_SESSION['logged_in_user'], '');
if ($_SESSION['basket'] != '')
{
  create_order($link, get_login($link, $_SESSION[logged_in_user]), serialize($_SESSION['basket']), 0);
}
$_SESSION['basket'] = '';
header("Location: index.php?buy=1");
?>
