<?php
function create_order($link, $name, $content, $total)
{
  $command = "
    INSERT INTO `ORDERS` (`id_order`, `name`, `content`, `total`) VALUES (NULL, '".mysqli_real_escape_string($link, $name)."', '".mysqli_real_escape_string($link, $content)."', '".intval($total)."');
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function del_order($link, $id)
{
  $command = "
  DELETE FROM `ORDERS` WHERE `id_order`='".intval($id)."' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function get_all_orders($link)
{
  $command = "
    SELECT * FROM `ORDERS` ORDER BY `id_order`;
  ";
  if (($res=mysqli_query($link, $command))==false)
    return (FALSE);
    $post = array();
      while($row = mysqli_fetch_assoc($res))
        $post[] = $row;
    return ($post);
}
?>
