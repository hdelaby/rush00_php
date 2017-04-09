<?php
function startsWith($haystack, $needle){
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function run_sql_file($location){
  $link = mysqli_connect('localhost', 'root', 'root', 'information_schema');
  //load file
  $commands = file_get_contents($location);

  //delete comments
  $lines = explode("\n",$commands);
  $commands = '';
  foreach($lines as $line){
      $line = trim($line);
      if( $line && !startsWith($line,'--') ){
          $commands .= $line . "\n";
      }
  }

  //convert to array
  $commands = explode(";", $commands);

  //run commands
  $total = $success = 0;
  foreach($commands as $command){
      if(trim($command)){
          echo ("$command <br \>");

          $suc = (mysqli_query($link, $command)==false ? 0 : 1);
          if ($suc == 0)
            echo "fail <br \>";
          $success += $suc;
          $total += 1;
      }
  }
  //return number of successful queries and total number of queries found
  return array(
      "success" => $success,
      "total" => $total
  );
}
print_r(run_sql_file('rush_ecommerce.sql'));
include('request/users.php');
$link = mysqli_connect('localhost', 'root', 'root', 'RUSH');
create_user($link, "admin", hash("whirlpool", 'admin'));
set_admin($link, check_login($link, 'admin'), 1);
 ?>
