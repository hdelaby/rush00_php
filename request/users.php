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
    return (mysqli_fetch_array($res));
  }
?>
