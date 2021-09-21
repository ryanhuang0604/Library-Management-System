<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
// clear session
session_destroy();
// transfer to login.php
echo '已登出!';
echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
?>