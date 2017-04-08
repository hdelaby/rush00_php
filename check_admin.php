<?PHP
session_start();

include("request/users.php");
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
$id = is_admin($link, $_SESSION['logged_in_user']);
if ($id == FALSE)
{
	header('HTTP/1.0 403 Forbidden');
	echo 'You are forbidden!';
	exit;
}
?>
