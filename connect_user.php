<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
// connect database
include("mysqlConnect_user.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

// search database
$sql = "SELECT * FROM USER_BORROWER where NAME = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

// judge whether the account and password is blank, and whether the member is existing in database
if($id != null && $pw != null && $row[1] == $id && $row[3] == $pw)
{
        // write the account into session to verify the user
        $_SESSION['NAME'] = $id;
        echo '登入成功!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member_user.php>';
}
else
{
        echo '登入失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login_user.php>';
}
?>