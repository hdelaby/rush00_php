<?php
  include('request/product.php');
  if (!function_exists('create_category'))
    include('request/category.php');

  $link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
  if ($_GET['category'] != '')
    $products = get_product_from_category($link, get_id_category($link, $_GET['category']));
  else
    $products = get_all_product($link);
      foreach($products as $product)
      {
        echo ("<div class='product'><h2>".$product['label']." (".((int)$product['price'] / 100)."€)</h2>");
		echo ("<p>Description: ".$product['description']."</p>");
		// Gerer le cas ou stock = 0;
		echo ("<p>Encore <b>".$product['stock']."</b> en stock.</p>");
		echo ("<form action='upd_basket.php' method='post'>
			<button name='add' value='".$product['id_product']."'>Ajouter au panier</button>
			</form></div>");
		// Else echo "plus de stock dispo"
      }
    ?>
