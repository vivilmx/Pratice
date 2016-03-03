<?php
	$dsn = "mysql:host=localhost;dbname=bilibili";
	$passwd = '';
	$username = 'root';
	$dbh = new PDO($dsn,$username,$passwd);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
	$dbh-> exec('set names utf8');

?>