<?php
	include('config.php');
	
	$arquivo	= $_GET['arquivo'];
	$largura	= $_GET['largura'];
	$altura		= $_GET['altura'];
	$img = Canvas::Instance( $arquivo );

	$img->redimensiona( $largura, $altura, 'crop' )->grava();
	exit;
?>