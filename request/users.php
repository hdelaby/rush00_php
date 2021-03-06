<?php

  function create_user($link, $login, $password)
  {
    $command = "
    INSERT INTO `USER` (`id_user`, `login`, `passwd`, `basket`, `is_admin`) VALUES (NULL, '".mysqli_real_escape_string($link, $login)."', '".mysqli_real_escape_string($link, $password)."', '', '0');
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function check_user($link, $login, $password)
  {
    $command = "
      SELECT `id_user` FROM `USER` WHERE `login`='".mysqli_real_escape_string($link, $login)."' AND `passwd`='".mysqli_real_escape_string($link, $password)."' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
      $res = mysqli_fetch_array($res);
      return ($res['id_user']);
  }

  function check_login($link, $login)
  {
    $command = "
      SELECT `id_user` FROM `USER` WHERE `login`='".mysqli_real_escape_string($link, $login)."' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
      $res = mysqli_fetch_array($res);
    return ($res['id_user']);
  }

  function get_user($link, $id)
  {
    $command = "
    SELECT * FROM `USER` WHERE `id_user`='".intval($id)."' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
      $res = mysqli_fetch_array($res);
    return ($res);
  }

  function del_user($link, $id)
  {
    $command = "
    DELETE FROM `USER` WHERE `id_user`='".intval($id)."' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function set_login($link, $id, $login)
  {
    $command = "
    UPDATE `USER` SET `login`='".mysqli_real_escape_string($link, $login)."' WHERE `id_user`='".intval($id)."' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function set_password($link, $id, $password)
  {
    $command = "
    UPDATE `USER` SET `passwd`='".mysqli_real_escape_string($link, $password)."' WHERE `id_user`='".intval($id)."' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function set_basket($link, $id, $basket)
  {
    $command = "
    UPDATE `USER` SET `basket`='$basket' WHERE `id_user`='".intval($id)."' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function get_basket($link, $id)
  {
    $command = "
      SELECT `basket` FROM `USER` WHERE `id_user`='".intval($id)."' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
    $res = mysqli_fetch_array($res);
    return ($res['basket']);
  }

  function delete_basket($link, $id)
  {
    $basket = unserialize(get_basket($link, $id));
    set_basket($link, $id, "");
    if (is_array($basket))
    {
      foreach ($basket as $val)
      {
        set_stock($link, $val['id_product'], get_stock($link, $val['id_product']) + $val['quantity']);
      }
    }
  }

  function get_login($link, $id)
  {
    $command = "
      SELECT `login` FROM `USER` WHERE `id_user`='".intval($id)."' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
    $res = mysqli_fetch_array($res);
    return ($res['login']);
  }

  function is_admin($link, $id)
  {
    $command = "
      SELECT `is_admin` FROM `USER` WHERE `id_user`='".intval($id)."' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
    $res = mysqli_fetch_array($res);
    return ($res['is_admin']);
  }

  function set_admin($link, $id, $is_admin)
  {
    $command = "
    UPDATE `USER` SET `is_admin`='$is_admin' WHERE `id_user`='".intval($id)."' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function get_all_user($link)
  {
    $command = "
      SELECT * FROM `USER` ORDER BY `login`;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
      $post = array();
        while($row = mysqli_fetch_assoc($res))
          $post[] = $row;
      return ($post);
  }
?>
