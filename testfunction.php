<?php
function connecttodb{
session_start();
$con=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('user-registration') or die("cannot select DB"); }

?>