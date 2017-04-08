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
        echo ("<div class='product'><h2>".$product['label']."</h2>");
        if ($product['img'] != '')
          echo ("<img src='".$product['img']."'>");
        echo ("<p>".$product['description']."</p><p>Prix : ".($product['price'] / 100)."</p><p>Stock : ".$product['stock']."</p>");
        echo ("<form action='upd_basket.php' metho='POST'><button name='add' value='".$product['id_product']."'>+</button><button name='less' value='".$product['id_product']."'>-</button></form></div><hr \>");
      }
    ?>
