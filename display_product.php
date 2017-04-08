<?php
  include('request/product.php');

  $link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
  $products = get_all_product($link);
  print_r($product);
?>
  <link rel="stylesheet" type="text/css" href="theme.css">
    <?php
      foreach($products as $product)
      {
        echo ("<div class='product'><h2>".$product['label']."</h2>");
        if ($product['img'] != '')
          echo ("<img src='".$product['img']."'>");
        echo ("<p>".$product['description']."</p><p>Prix : ".($product['price'] / 100)."</p><p>Stock : ".$product['stock']."</p>");
        echo ("<form action='upd_basket.php' methode='get'><button name='add' value='".$product['id_product']."'>+</button><button name='less' value='".$product['id_product']."'>-</button></form></div><hr \>");
      }
    ?>
