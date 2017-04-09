<?PHP

session_start();
unset($_SESSION['logged_in_user']);
unset($_SESSION['basket']);
header("Location: index.php");

?>
