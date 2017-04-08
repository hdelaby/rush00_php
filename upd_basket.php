<?php
  include('request/users.php');
  include('request/product.php');

  session_start();

  $link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
  if ($_GET['add'] != '')
  {
    $product = get_product($link, $_GET['add']);
    if ($product['stock'] > 0)
    {
      set_stock($link, $_GET['add'], ($product['stock'] - 1));
      header("Location: basket.php");
    }
    else
      header("Location: basket.php?error=1");
  }
  if ($_GET['less'] != '')
  {
    $product = get_product($link, $_GET['less']);
  }
?>
