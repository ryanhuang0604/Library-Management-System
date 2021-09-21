<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysqlConnect_user.php");

$sql = "SELECT * FROM BORROW_RECORD NATURAL JOIN BORROWER NATURAL JOIN BOOK WHERE STU_ID = $_SESSION[NAME]";
$result = mysql_query($sql);

echo "<table border=1 cellpadding=5><tr><td>書名</td><td>作者</td><td>出版社</td><td>借書日期</td><td>還書日期</td><td>是否罰款</td></tr>";
while ($row = mysql_fetch_assoc($result))
echo "<tr><td>".$row["BOOK_NAME"]."</td><td>".$row["BOOK_AUTHOR"]."</td><td>".$row["BOOK_PUBLISHER"].
		"</td><td>".$row["LEND_DATE"]."</td><td>".$row["RETURN_DATE"]."</td><td>".$row["IS_FINED"]."</td></tr>";
echo "</table>";

?>