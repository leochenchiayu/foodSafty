<?php
session_start();
$host = 'localhost';
$dbuser = 'root';
$dbpw = 'L125539477';
$dbname = 'member_info';

$mysql = new PDO($host, $dbuser, $dbpw, $dbname);

if ($mysql)
{
  mysqli_query($mysql, "SET NAMES utf8");
}
else
{
  echo '無法連線mysql資料庫 :<br/>' . mysqli_connect_error();
}
?>
