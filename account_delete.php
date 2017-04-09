<?PHP

session_start();
include("request/users.php");

if ($_SESSION['logged_in_user'])
{
	$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
	del_user($link, $_SESSION['logged_in_user']);
	header("Location: logout.php");
}

?>
