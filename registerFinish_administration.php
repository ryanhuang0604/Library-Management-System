<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysqlConnect_administration.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$email = $_POST['email'];

// judge whether the account and password is blank, and whether the password is correct
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        $sql = "SELECT * FROM LIB_EMPLOYEE WHERE FAC_ID = $id";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) == 0)
        {
                echo '無此管理員';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=register_user.php>';
        }

        else
        {
                $sql = "insert into USER_EMPLOYEE (NAME, PASSWORD, EMAIL) values ('$id', '$pw', '$email')";
                if(mysql_query($sql))
                {
                        echo '新增成功!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=login_administration.php>';
                }
                else
                {
                        echo '新增失敗!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=login_administration.php>';
                }
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login_administration.php>';
}