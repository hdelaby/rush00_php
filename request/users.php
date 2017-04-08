<?php
  function create_user($link, $login, $password)
  {
    $command = "
    INSERT INTO `USER` (`id_user`, `login`, `passwd`, `basket`, `is_admin`) VALUES (NULL, '$login', '$password', '', '0');
    ";
    if (mysqli_query($link, $command)==false)
      return (FLASE);
    return (TRUE);
  }
  function check_conect($link, $login, $password)
  {
    $command = "
      SELECT `id_user` FROM `USER` WHERE `login`='$login' AND `passwd`='$password' LIMIT 1;
    ";
    if (($res=mysqli_query($link, $command))==false)
      return (FLASE);
    return (mysqli_fetch_array($res));
  }

  $link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
  print_r (check_conect($link, 'toto', 'vache')['id_check']);
?>
