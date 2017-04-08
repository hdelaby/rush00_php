<?php
  function create_user($link, $login, $password)
  {
    $command = "
    INSERT INTO `USER` (`id_user`, `login`, `passwd`, `basket`, `is_admin`) VALUES (NULL, '$login', '$password', '', '0');
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function check_user($link, $login, $password)
  {
    $command = "
      SELECT `id_user` FROM `USER` WHERE `login`='$login' AND `passwd`='$password' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
    return (mysqli_fetch_array($res));
  }

  function check_login($link, $login)
  {
    $command = "
      SELECT `id_user` FROM `USER` WHERE `login`='$login' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
      $res = mysqli_fetch_array($res);
      return ($res['id_user']);
  }

  function del_user($link, $id)
  {
    $command = "
    DELETE FROM `USER` WHERE `id_user`='$id' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function set_login($link, $id, $login)
  {
    $command = "
    UPDATE `USER` SET `login`='$login' WHERE `id_user`='$id' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function set_password($link, $id, $password)
  {
    $command = "
    UPDATE `USER` SET `passwd`='$password' WHERE `id_user`='$id' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function set_basket($link, $id, $basket)
  {
    $command = "
    UPDATE `USER` SET `basket`='$basket' WHERE `id_user`='$id' LIMIT 1;
    ";
    if (mysqli_query($link, $command)==false)
      return (FALSE);
    return (TRUE);
  }

  function get_basket($link, $id)
  {
    $command = "
      SELECT `basket` FROM `USER` WHERE `id_user`='$id' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FALSE);
    $res = mysqli_fetch_array($res);
    return ($res['basket']);
  }
?>
