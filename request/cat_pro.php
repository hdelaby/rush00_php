<?php
  function link_category_to_product($link, $category, $product)
  {
    $command = "
      INSERT INTO `PRODUCT_CATEGORY` (`id_p_c`, `id_prod`, `id_cat`) VALUES (NULL, '".intval($product)."', '".intval($category)."');
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function del_category_to_product($link, $id)
  {
    $command = "
      DELETE FROM `PRODUCT_CATEGORY` WHERE `id_p_c`='".intval($id)."' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function del_category_to_product_from_cat($link, $id)
  {
    $command = "
      DELETE FROM `PRODUCT_CATEGORY` WHERE `id_cat`='".intval($id)."';
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function del_category_to_product_from_pro($link, $id)
  {
    $command = "
      DELETE FROM `PRODUCT_CATEGORY` WHERE `id_prod`='".intval($id)."';
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function get_category_from_product($link, $id)
  {
    $command = "
      SELECT `id_category`,`label` FROM `PRODUCT_CATEGORY` INNER JOIN `CATEGORY` ON `id_cat`=`id_category` WHERE `id_prod`='".intval($id)."' ORDER BY `label`;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
      $post = array();
        while($row = mysqli_fetch_assoc($res))
          $post[] = $row;
      return ($post);
  }

  function get_product_from_category($link, $id)
  {
    $command = "
      SELECT `id_product`,`label`,`description`,`img`,`price`,`stock` FROM `PRODUCT_CATEGORY` INNER JOIN `PRODUCT` ON `id_prod`=`id_product` WHERE `id_cat`='".intval($id)."' ORDER BY `label`;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
      $post = array();
        while($row = mysqli_fetch_assoc($res))
          $post[] = $row;
      return ($post);
  }
?>
