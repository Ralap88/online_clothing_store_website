<?php
	$link = mysqli_connect('localhost','root','root123456','group_07')or die ("無法開啟<br>");

	// 送出編碼的MySQL指令
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
?>