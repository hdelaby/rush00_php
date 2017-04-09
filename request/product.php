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
    UPDATE `PRODUCT` SET `label`='$label', `description`='$description', `img`='$img', `price`='$price', `stock`='$stock' WHERE `id_product`='$id' LIMIT 1;
";
  if (mysqli_query($link, $command)==false)
	  return (FALSE);
  return (TRUE);
}

function set_label($link, $id, $label)
{
  $command = "
  UPDATE `PRODUCT` SET `label`='$label WHERE `id_product`='$id' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function set_description($link, $id, $description)
{
  $command = "
  UPDATE `PRODUCT` SET `description`='$description WHERE `id_product`='$id' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function set_img($link, $id, $img)
{
  $command = "
  UPDATE `PRODUCT` SET `img`='$img WHERE `id_product`='$id' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function set_price($link, $id, $price)
{
  $command = "
  UPDATE `PRODUCT` SET `price`='$price WHERE `id_product`='$id' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function set_stock($link, $id, $stock)
{
  $command = "
  UPDATE `PRODUCT` SET `stock`='$stock' WHERE `id_product`='$id' LIMIT 1;
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

function get_all_product($link)
{
  $command = "
    SELECT * FROM `PRODUCT` ORDER BY `label`;
  ";
  if (($res=mysqli_query($link, $command))==false)
    return (FALSE);
  $post = array();
    while($row = mysqli_fetch_assoc($res))
      $post[] = $row;
  return ($post);
}
?>
