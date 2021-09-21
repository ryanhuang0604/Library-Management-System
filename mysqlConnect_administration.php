<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
// database setting
// path
$db_server = "localhost";
// name
$db_name = "library";
// account
$db_user = "ryan";
// password
$db_passwd = "xxxx";

// connect to database
if(!@mysql_connect($db_server, $db_user, $db_passwd))
        die("無法對資料庫連線");

mysql_query("SET NAMES utf8");

if(!@mysql_select_db($db_name))
        die("無法使用資料庫");
?>  