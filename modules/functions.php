<?php 
function MySQL($name_base,$my_query)
{
    $mysqli= new mysqli ('localhost','mysql', 'mysql',$name_base);
if (mysqli_connect_error()) {
    printf("Соединение не установлено", mysql_connect_error());
    exit();
  }
  $mysqli->set_charset('utf8');
  $query = $mysqli->query($my_query);
  $mysqli->close();
 
  for ($date = []; $arr = mysqli_fetch_assoc($query); $date[] = $arr) ;
  return $date;
}


function MySQLinc($name_base,$my_query)
{
    $col=0;
    $mysqli= new mysqli ('localhost','mysql', 'mysql',$name_base);
if (mysqli_connect_error()) {
    printf("Соединение не установлено", mysql_connect_error());
    exit();
  }
  $mysqli->set_charset('utf8');
  $query = $mysqli->query($my_query);
  $mysqli->close();
 
  for ($date = []; $arr = mysqli_fetch_assoc($query); $date[] = $arr) 
  {
      $col++;
  }
$arr=[$date,$col];
  return $arr;
}



function MySQLisert($name_base,$my_query)
{
    $mysqli= new mysqli ('localhost','mysql', 'mysql',$name_base);
if (mysqli_connect_error()) {
    printf("Соединение не установлено", mysql_connect_error());
    exit();
  }
  $mysqli->set_charset('utf8');
  $mysqli->query($my_query);
  $mysqli->close(); 
  return $my_query ;
}
?>