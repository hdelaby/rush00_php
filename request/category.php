<?php
function create_category($link, $label)
{
  $command = "
  INSERT INTO `CATEGORY` (`id_category`, `label`) VALUES (NULL, '$label');
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function get_category($link, $id)
{
  $command = "
    SELECT `label` FROM `CATEGORY` WHERE `id_category`='$id' LIMIT 1;
  ";
  if (($res=mysqli_query($link, $command))==false)
    return (FALSE);
  $res = mysqli_fetch_array($res);
  return ($res['label']);
}

function get_id_category($link, $label)
{
  $command = "
    SELECT `id_category` FROM `CATEGORY` WHERE `label`='$label' LIMIT 1;
  ";
  if (($res=mysqli_query($link, $command))==false)
    return (FALSE);
  $res = mysqli_fetch_array($res);
  return ($res['id_category']);
}

function set_category($link, $id, $label)
{
  $command = "
    UPDATE `CATEGORY` SET `label`='$label' WHERE `id_category`='$id' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}

function del_category($link, $id)
{
  $command = "
  DELETE FROM `CATEGORY` WHERE `id_category`='$id' LIMIT 1;
  ";
  if (mysqli_query($link, $command)==false)
    return (FALSE);
  return (TRUE);
}
?>
