<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysqlConnect_user.php");
$book_name = $_POST['book_name'];

// whether the book is borrowed or not
$sql = "SELECT * FROM BOOK natural join borrow_record where BOOK_NAME = '$book_name'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

// judge the book
if($book_name != null && $row[1] == $book_name)
{           
        // book is borrowed
        if($row[7] != null && $row[7] =='Y' && $row[10] > '2019-06-19'){
            echo '系統貼心提醒：此書已被預約走下次請早，幫QQ!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=member_user.php>';
        }
        elseif($row[7] != null && $row[7] =='N' && $row[10] > '2019-06-19'){
            //echo '<meta http-equiv=REFRESH CONTENT=2;url=member_administration.php>';
            $sql = "UPDATE BOOK SET IS_APPOINTMENT = 'Y' WHERE BOOK_NAME = '$book_name'";
            if(!mysql_query($sql)){
                echo mysql_error();
            }
            echo '預約成功';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=member_user.php>';    
        }
        else{
            echo '貼心提醒：此書在圖書館，不用預約';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=member_user.php>';    
        }
}
else
{
        echo '此書無借閱過的紀錄，可在圖書館內找到';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member_user.php>';
}
?>