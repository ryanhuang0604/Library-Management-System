<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysqlConnect_user.php");
$book_name = $_POST['book_name'];
$bnh_name = $_POST['bnh_name'];
$bnh_name_new = $_POST['bnh_name_new'];

// search database
$sql = "SELECT * FROM BOOK where BOOK_NAME = '$book_name' AND BNH_ID = '$bnh_name'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

// whether the book is in the branch
if($book_name != null && $bnh_name != null && $row[1] == $book_name && $row[6] == $bnh_name)
{
        // update branch
        echo '「'.$book_name.'」 已從 「'.$bnh_name.'」 調閱至 「'.$bnh_name_new.'」';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member_administration.php>';
        $sql = "UPDATE BOOK SET BNH_ID = '$bnh_name_new' WHERE BOOK_NAME = '$book_name' AND BNH_ID = '$bnh_name'";
        mysql_query($sql);
}
else
{
        echo '搜尋不到此書';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=transfer_administration.php>';
}
?>