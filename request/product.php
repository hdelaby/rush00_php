<?php

if (!function_exists('link_category_to_product'))
  include('cat_pro.php');

function create_product($link, $label, $description, $img, $price, $stock)
{
  $command = "
    INSERT INTO `PRODUCT` (`id_product`, `label`, `description`, `img`, `price`, `stock`) VALUES (NULL, '$label', '$description', '$img', '$price', '$stock');
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function update_product($link, $id, $label, $description, $img, $price, $stock)
{
  $command = "
    UPDATE `PRODUCT` SET `label`='$label', `description`='$description', `img`='$img', `price`='$price', `stock`='$stock', WHERE `id_product`='$id' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function del_product($link, $id)
{
  del_category_to_product_from_pro($link, $id);
  $command = "
    DELETE FROM `PRODUCT` WHERE `id_product`='$id' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function get_product($link, $id)
{
  $command = "
    SELECT * FROM `PRODUCT` WHERE `id_product`='$id' LIMIT 1;
  ";
  if (($res=mysqli_query($link, $command))==false)
    return (FALSE);
  $res = mysqli_fetch_array($res);
  return ($res);
}
?>
