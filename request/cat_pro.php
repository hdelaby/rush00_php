<?php
  function link_category_to_product($link, $category, $product)
  {
    $command = "
      INSERT INTO `PRODUCT_CATEGORY` (`id_p_c`, `id_prod`, `id_cat`) VALUES (NULL, '$product', '$category');
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function del_category_to_product($link, $id)
  {
    $command = "
      DELETE FROM `PRODUCT_CATEGORY` WHERE `id_p_c`='$id' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function del_category_to_product_from_cat($link, $id)
  {
    $command = "
      DELETE FROM `PRODUCT_CATEGORY` WHERE `id_cat`='$id';
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function del_category_to_product_from_pro($link, $id)
  {
    $command = "
      DELETE FROM `PRODUCT_CATEGORY` WHERE `id_prod`='$id';
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function get_category_from_product($link, $id)
  {
    $command = "
      SELECT * FROM `PRODUCT_CATEGORY` WHERE `id_prod`='$id';
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
    $res = mysqli_fetch_array($res);
    return ($res);
  }

  function get_category_from_category($link, $id)
  {
    $command = "
      SELECT * FROM `PRODUCT_CATEGORY` WHERE `id_cat`='$id';
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
    $res = mysqli_fetch_array($res);
    return ($res);
  }
?>
