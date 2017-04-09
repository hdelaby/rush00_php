<?PHP

function	total_basket($basket)
{
	$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
	$total = 0;
	if (!$basket)
		return 0;
	foreach($basket as $val)
	{
		$product = get_product($link, $val['id_product']);
		$total += ($product['price'] * $val['quantity']);
	}
	return ($total);
}

?>
