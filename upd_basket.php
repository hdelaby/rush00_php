<?php
include('request/users.php');
include('request/product.php');

session_start();

function	find_product_key($basket, $id_product)
{
	foreach ($basket as $key => $val)
		if ($val['id_product'] == $id_product)
			return $key;
	return FALSE;
}

function	add_basket($basket, $id_product)
{
	if (($key = find_product_key($basket, $id_product)) != FALSE)
		$basket[$key]['quantity'] += 1;
	else
		$basket[] = array('id_product' => $id_product, 'quantity' => (int)1);
	return $basket;
}

$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
if ($_POST['add'] != '')
{
	$product = get_product($link, $_POST['add']);
	if ($product['stock'] > 0)
	{
		set_stock($link, $_POST['add'], ($product['stock'] - 1));
		$_SESSION['basket'] = add_basket($_SESSION['basket'], $product['id_product']);
		header("Location: basket.php");
	}
else
	header("Location: basket.php?error=1");
}
header("Location: basket.php?error=1");
/* if ($_GET['less'] != '') */
/* { */
/*   $product = get_product($link, $_GET['less']); */
/*   set_stock($link, $_GET['less'], ($product['stock'] + 1)); */
/*   header("Location: basket.php"); */
/* } */
?>
