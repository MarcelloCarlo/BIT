<?php
	$Server_Host = 'localhost';
	$User = 'root';
	$Pass = '';
	$DB = 'bitdb';
	$bitMysqli = mysqli_connect($Server_Host,$User,$Pass,$DB) or die(mysqli_connect_error());
?>