<?php

if (!function_exists('link_category_to_product'))
  include('cat_pro.php');

function create_category($link, $label)
{
  $command = "
  INSERT INTO `CATEGORY` (`id_category`, `label`) VALUES (NULL, '".mysqli_real_escape_string($link, $label)."');
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function get_category($link, $id)
{
  $command = "
    SELECT `label` FROM `CATEGORY` WHERE `id_category`='".intval($id)."' LIMIT 1;
  ";
  if (($res=mysqli_query($link, $command))==false)
    return (FALSE);
  $res = mysqli_fetch_array($res);
  return ($res['label']);
}

function get_id_category($link, $label)
{
  $command = "
    SELECT `id_category` FROM `CATEGORY` WHERE `label`='".mysqli_real_escape_string($link, $label)."' LIMIT 1;
  ";
  if (($res=mysqli_query($link, $command))==false)
    return (FALSE);
  $res = mysqli_fetch_array($res);
  return ($res['id_category']);
}

function set_category($link, $id, $label)
{
  $command = "
    UPDATE `CATEGORY` SET `label`='".mysqli_real_escape_string($link, $label)."' WHERE `id_category`='".intval($id)."' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function del_category($link, $id)
{
  del_category_to_product_from_cat($link, $id);
  $command = "
  DELETE FROM `CATEGORY` WHERE `id_category`='".intval($id)."' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function get_all_category($link)
{
  $command = "
    SELECT * FROM `CATEGORY` ORDER BY `label`;
  ";
  if (($res=mysqli_query($link, $command))==false)
    return (FALSE);
    $post = array();
      while($row = mysqli_fetch_assoc($res))
        $post[] = $row;
    return ($post);
}
?>
