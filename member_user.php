<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysqlConnect_user.php");
echo '<a href="logout_user.php">登出</a>  <br><br>';

// judge whether the user could watch the page
if($_SESSION['NAME'] != null)
{
        echo '<a href="borrow_user.php">個人紀錄查詢</a>    <br><br>';
        echo '<a href="Appointment.php">預約</a>    <br><br>';
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login_user.php>';
}
?>