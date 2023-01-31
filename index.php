<?php
	require('config.php'); 

	$_SESSION["nivel"] = isset($_SESSION['nivel']) ? $_SESSION['nivel']  : 100;
	$_SESSION["id_usuario"] = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario']  : 1;
	$_SESSION['login'] = isset($_SESSION['login']) ? $_SESSION['login']  : 'matheus@gmail.com';
	$_SESSION["nome_usuario"] = isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario']  : 'Matheus Reus Vieira';
	include('portal_submit.php');
?>

<html><head><title>Canal Içara - O canal da galera!</title>
<!DOCTYPE html PUBLIC><html xmlns="http://www.w3.org/1999/xhtml">
<!--[if IE 9]><html class="lt-ie10" lang="pt-br" > <![endif]-->
<HEAD><META charset="utf-8">
<META HTTP-EQUIV="REFRESH" CONTENT="3600">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Canal Içara - curta essa cidade!</title>

<link rel="stylesheet" href="https://www.canalicara.com/portal/css/normalize.css">
<link rel="stylesheet" href="https://www.canalicara.com/portal/css/foundation.css">
<link rel="stylesheet" href="https://www.canalicara.com/portal/css/app.css">
<link rel="stylesheet" href="https://www.canalicara.com/portal/foundation-icons/foundation-icons.css" />
<script src="https://www.canalicara.com/portal/js/vendor/jquery.js"></script>
<script src="https://www.canalicara.com/portal/js/foundation/foundation.js"></script>
<script src="https://www.canalicara.com/portal/js/foundation/foundation.reveal.js"></script>
<script src="https://www.canalicara.com/portal/js/foundation.min.js"></script>
<script src="https://www.canalicara.com/portal/js/vendor/modernizr.js"></script>
<script src="https://www.canalicara.com/portal/js/foundation/foundation.offcanvas.js"></script>
<script type="text/javascript" src="https://www.canalicara.com/portal/scripts.js"></script>

		<script src="https://www.canalicara.com/portal/js/foundation/foundation.datepicker.js"></script>
		<link rel="stylesheet" href="https://www.canalicara.com/portal/css/foundation.datepicker.css">

		<script type="text/javascript" src="https://www.canalicara.com/portal/jquery/jquery.timepicker.js"></script>
		<link rel="stylesheet" type="text/css" href="https://www.canalicara.com/portal/jquery/css/jquery.timepicker.css" />

 </head>
<body>


<script language="JavaScript"> var url = escape(window.location);		function UPLOAD() {		var vUrl = "https://www.canalicara.com/portal_upload.php";		var vName = "";		var vPosFimX = 345;		var vPosFimY = 170;		var vArgumentos = "scrollbars=no";		vPosIniX=((screen.availWidth/2)-(vPosFimX/2));	  	vPosIniY=((screen.availHeight/2)-(vPosFimY/2));	  	window.open(vUrl,vName,''+vArgumentos+',top='+vPosIniY+',left='+vPosIniX+',width='+vPosFimX+',height='+vPosFimY+'');			}	</script>


<div class="row">

	<div class="small-12 columns" style="margin-bottom:5px; margin-top: 15px"><font class='link_h3 right'>Olá <?=$_SESSION["nome_usuario"]?>! <a href='portal_logout.php' class='button secondary small fi-power size-30' style='padding:5px;'> SAIR</a></font></DIV>

	<div class="small-12 columns" style="margin-bottom:25px"><ul class="button-group round">
	  <li><a href='?action=mostrarnews' class='button secondary large fi-clipboard-pencil size-60' style='padding:15px;'><label>notícias</label></a></li>
	  <li><a href='?action=enquete' class='button secondary large fi-graph-pie size-60' style='padding:15px;'><label>Enquetes</label></a></li>
	  <li><a href='?action=mostrarpaginas' class='button secondary large fi-page-copy size-60' style='padding:15px;'><label>páginas</label></a></li>
	  <li><a href='?action=mostrarphoto_datas' class='button secondary large fi-calendar size-60' style='padding:15px;'><label>datas</label></a></li>
	  <li><a href='?action=mostrarmultimidia_photomemorias' class='button secondary large fi-layout size-60' style='padding:15px;'><label>Memórias</label></a></li>
	  <li><a href='?action=mostrarentretenimento_imagens' class='button secondary large fi-camera size-60' style='padding:15px;'><label>bizarras</label></a></li>
	  <li><a href='?action=mostrartecnologia_wallpapers' class='button secondary large fi-photo size-60' style='padding:15px;'><label>wallpapers</label></a></li>
	  <li><a href='?action=mostrarlinks' class='button secondary large fi-link size-60' style='padding:15px;'><label>links</label></a></li>
	  <li><a href='?action=gerarfeed' class='button secondary large fi-rss size-60' style='padding:15px;'><label>rss</label></a></li>
	  <li><a href='?action=ferramentas_facebook' class='button secondary large fi-social-facebook size-60' style='padding:15px;'><label>social</label></a></li>
	  <li><a href='?action=mostrarofertas' class='button secondary large fi-flag size-60' style='padding:15px;'><label>Ofertas</label></a></li>
	  <li><a href='?action=usuario' class='button secondary large fi-torso size-60' style='padding:15px;'><label>user</label></a></li>
	  <li><a href='?action=mostrarusuarios' class='button secondary large fi-widget size-60' style='padding:15px;'><label>config</label></a></li>
	</ul></DIV>

	<div class="small-12 columns"><?php	include('portal_comandos.php');	?></DIV>

</DIV>

<script>
$(document).foundation();

$(function() {
	$('#setTimeExample').timepicker({ 'timeFormat': 'H:i:s' });
	$('#setTimeButton').on('click', function (){
	$('#setTimeExample').timepicker('setTime', new Date());	});

	window.prettyPrint && prettyPrint();

	$('#dp1').fdatepicker({	format: 'yyyy-mm-dd'	});
		// implementation of disabled form fields
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		var checkin = $('#dpd1').fdatepicker({
		onRender: function (date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';	}
		}).on('changeDate', function (ev) {
		if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate() + 1);
			checkout.update(newDate);		}
		checkin.hide();

	$('#dpd2')[0].focus();
		}).data('datepicker');
		var checkout = $('#dpd2').fdatepicker({
		onRender: function (date) {
		return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		}
		}).on('changeDate', function (ev) {
		checkout.hide();
		}).data('datepicker');
		});

	$('#dp3').fdatepicker({	format: 'yyyy-mm-dd'	});
		// implementation of disabled form fields
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		var checkin = $('#dpd3').fdatepicker({
		onRender: function (date) {
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
		}
		}).on('changeDate', function (ev) {
		if (ev.date.valueOf() > checkout.date.valueOf()) {
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		checkout.update(newDate);
	}
	});

</script>
</body></html>