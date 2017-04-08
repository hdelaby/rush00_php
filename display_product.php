<?php
  include('request/product.php');

  $link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
  $products = get_all_product($link);
  print_r($product);
?>
<html>
  <body>
    <ul>
      <?php
        foreach($products as $product)
        {
          echo ("<li>".$product[i]['label']."</li>");
          $i++;
        }
      ?>
    </ul>
  </body>
</html>
