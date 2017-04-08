<?PHP
session_start();
include('request/users.php');
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
set_basket($link, $_SESSION['logged_in_user'], '');
$_SESSION['basket'] = '';
header("Location: index.php?buy=1");
?>
