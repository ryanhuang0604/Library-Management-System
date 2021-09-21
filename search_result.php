<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
	table.hovertable {
		font-family: verdana,arial,sans-serif;
		font-size:11px;
		color:#333333;
		border-width: 1px;
		border-color: #999999;
		border-collapse: collapse;
		margin:20px 250px;
		width:800px;
		padding: 0px 0px;
	}
table.hovertable th {
	background-color:#c3dde0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#d4e3e5;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
</style>

<?php	
	
	echo "<div><img src=\"library_1.jpg\" width='100%' /></div>";
	echo "<div><img src=\"library_2.png\" width='100%' /></div>";
	
	echo "<div>";
	echo "<hr color='#ff8000'>";
	echo "<a style='float:right;' href='login_administration.php'><font color='#1111e8'>管理者登入</font></a>";
	echo "<a style='float:left;' href='login_user.php'><font color='#1111e8'>使用者登入</font></a><br>";
	echo "<hr color='#ff8000'>";
	echo "</div>";
	
	echo "<div>";
	echo "<h1 style='text-align:center; margin:20px 0px;'><font color='#50b3ed'>搜尋結果</font></h1>";
	echo "<a style='margin:0px 900px; width:50px;' href='home.php'><font color='#1111e8'>Return</font></a><br><br>";
	echo "</div>";

	include("mysqlConnect_user.php");

	$BOOK_ID = $_POST['BOOK_ID'];
	$BOOK_NAME = "%".$_POST['BOOK_NAME']."%";
	$BOOK_AUTHOR = "%".$_POST['BOOK_AUTHOR']."%";
	$BOOK_PUBLISHER = "%".$_POST['BOOK_PUBLISHER']."%";
	$BOOK_ISBN = $_POST['BOOK_ISBN'];
	$BOOK_CALL_NUM = $_POST['BOOK_CALL_NUM'];

	$sql = "SELECT BOOK.BOOK_ID, BOOK.BOOK_NAME, BOOK_AUTHOR, BOOK_PUBLISHER, BOOK.BOOK_ISBN, BOOK_CALL_NUM
			from BOOK 
			WHERE ";
				if($BOOK_ID != null)
					$sql = $sql."BOOK.BOOK_ID = '$BOOK_ID'";
				else if($BOOK_NAME != null)
					$sql = $sql."BOOK.BOOK_NAME LIKE '$BOOK_NAME'";
				else if($BOOK_AUTHOR != null)
					$sql = $sql."BOOK.BOOK_AUTHOR LIKE '$BOOK_AUTHOR'";
				else if($BOOK_PUBLISHER != null)
					$sql = $sql."BOOK.BOOK_PUBLISHER LIKE '$BOOK_PUBLISHER'";
				else if($BOOK_ISBN != null)
					$sql = $sql."BOOK.BOOK_ISBN = '$BOOK_ISBN'";
				else if($BOOK_CALL_NUM != null)
					$sql = $sql."BOOK.BOOK_CALL_NUM = '$BOOK_CALL_NUM'";
	$sql = $sql."order by BOOK.BOOK_ID";
	
	$result = mysql_query($sql);
	if(!$result){
		die("Invalid query:" . mysql_error());
	}
	echo "<center><div><table float:center border=1 cellpadding=5><tr><td>條碼號</td><td>書名</td><td>作者</td><td>出版社</td><td>ISBN</td><td>索書號</td</tr>";
	
	while ($row = mysql_fetch_assoc($result))
	echo "<tr><td>".$row["BOOK_ID"]."</td><td>".$row["BOOK_NAME"]."</td><td>".$row["BOOK_AUTHOR"]."</td><td>".$row["BOOK_PUBLISHER"].
		"</td><td>".$row["BOOK_ISBN"]."</td><td>".$row["BOOK_CALL_NUM"]."</td></tr>";
	echo "</table></div></center>";

?>