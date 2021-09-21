<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php	
	
	echo "<div><img src=\"library_1.jpg\" width='100%' /></div>";
	echo "<div><img src=\"library_2.png\" width='100%' /></div>";
	
	echo "<div>";
	echo "<hr color='#ff8000'>";
	echo "<a style='float:right;' href='login_administration.php'><font color='#1111e8'>管理者登入</font></a>";
	echo "<a style='float:left;' href='login_user.php'><font color='#1111e8'>使用者登入</font></a><br>";
	echo "<hr color='#ff8000'>";
	echo "</div>";

	echo "<div><h1 style='text-align:center; margin:20px 0px;'><font color='#50b3ed'>館藏搜尋</font></h1></div>";
	
	echo "<form name='form' method='post' action='search_result.php'>";

	echo "<center><div><tr>
		<td align:center>
		<table style='width=100%; border=0; cellpadding=0; cellspacing=0;'>
		<tr>
		<td>條碼號：<input type='text' name='BOOK_ID' /></td><td>&nbsp;&nbsp;</td>
		<td>書名：<input type='text' name='BOOK_NAME' /></td><td>&nbsp;&nbsp;</td>
		<td>作者：<input type='text' name='AUTHOR_NAME' /></td><td>&nbsp;&nbsp;</td>
		<td>出版社：<input type='text' name='BOOK_PUBLISHER' /></td><td>&nbsp;&nbsp;</td>
		<td>ISBN：<input type='text' name='BOOK_ISBN' /></td><td>&nbsp;&nbsp;</td>
		<td>索書號：<input type='text' name='BOOK_CALL_NUM' /></td>
		</tr>
		</table>
		</td>
		<br>
		<td><input type='submit' name='Button2' class='btn_grey' id='Button2' value='查詢' /></td>
		</tr></div></center>";
	
	echo "</form>";

?>