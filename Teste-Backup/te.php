<?php
	include('config.php');

	$ar = Db::getColumns(DATABASE, 'noticias');
	echo '<pre>';
	print_r($ar);
	echo '</pre>';

?>