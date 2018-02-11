<?php
session_start();// we started session is dbsetup as we want wherever this dbsetup is called- a session is created.
// in this case, session is created so that when we get the msg of post added sucessfully. The page redirects.
$host="localhost";
$user="root";
$pass="";
$database="blogtut";

if(mysql_connect($host,$user,$pass))
{
if(mysql_select_db($database)){

	//echo "database selected sucessfully";
}}else{

	echo"DB connection failed";
}

include_once('db_function.php');

?>