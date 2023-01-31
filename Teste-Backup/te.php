<?php
	include('../config.php');

	/*$ar = Db::getColumns(DATABASE, 'noticias');
	echo '<pre>';
	print_r($ar);
	echo '</pre>';

	$date = '2023-01-30 11:37:52';
	echo date('d/m/y', strtotime($date )).' às '.date('H:i', strtotime($date ));*/

	$ar = Db::selectLimited('noticias', 0, 5, 'cont', 'DESC', 'pdate between now() - INTERVAL 2 DAY');
	echo '<pre>';
	print_r($ar);
	echo '</pre>';
?>