<?php
include('request/users.php');
include('request/product.php');

session_start();

function	find_product_key($basket, $id_product)
{
	if (!$basket)
		return FALSE;
	foreach ($basket as $key => $val)
	{
		if ($val['id_product'] == $id_product)
			return $key;
	}
	return FALSE;
}

function	add_basket($basket, $id_product)
{
	if (is_integer($key = find_product_key($basket, $id_product)))
		$basket[$key]['quantity'] += 1;
	else
		$basket[] = array('id_product' => $id_product, 'quantity' => (int)1);
	return $basket;
}

function	less_basket($basket, $id_product)
{
	if (is_integer($key = find_product_key($basket, $id_product)))
	{
		$basket[$key]['quantity'] -= 1;
		if (!$basket[$key]['quantity'])
			array_splice($basket, $key, 1);
	}
	return $basket;
}

$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
if ($_POST['add'] != '')
{
	$product = get_product($link, $_POST['add']);
	if ($product['stock'] > 0)
	{
		set_stock($link, $_POST['add'], ($product['stock'] - 1));
		$new_basket = add_basket($_SESSION['basket'], $_POST['add']);
		$_SESSION['basket'] = $new_basket;
		header("Location: basket.php");
	}
	else
		header("Location: basket.php?error=1");
}
else if ($_POST['less'] != '')
{
	$product = get_product($link, $_POST['less']);
	set_stock($link, $_POST['less'], ($product['stock'] + 1));
	$_SESSION['basket'] = less_basket($_SESSION['basket'], $_POST['less']);
	header("Location: basket.php");
}
else
	header("Location: basket.php?error=1");
?>
