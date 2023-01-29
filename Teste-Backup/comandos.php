<?php

	if (strstr($_SERVER["PHP_SELF"], "/admin/"))  die ("<html><head><title>Error</title></head><body scroll=\"no\"><BR><BR><center><font face=\"Verdana\" size=\"1\">Acesso negado!</font></center></body></html>");

	include("portal_config_bdconnect.php");

	function index()	{
?>

<font face="verdana" size="2">Administração</font>
 

 <?php	

	
}
//NOTÍCIAS=============================================================

function mostrarnews($pagina)	{
	if(($_SESSION["nivel"] >= "1") AND ($_SESSION["nivel"] <= "49"))	{
		$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?php
			$sql = "SELECT * FROM noticias WHERE id_usuario = ".$_SESSION['id_usuario']."";
			$result = mysql_query($sql) or die("Error: " . mysql_error());
			$lpp = 50;	$total = mysql_num_rows($result);
			$paginas = ceil($total / $lpp);
			if(!isset($pagina)) { $pagina = 0;}
			$inicio = $pagina * $lpp;
			$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias WHERE id_usuario = ".$_SESSION['id_usuario']." ORDER BY pdate DESC LIMIT $inicio, $lpp";
			$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarnews' class='button radius sucess marge fi-plus size-60'></a> Adicionar Notícias $id
			<ul class='button-group radius right'>
				<li><a href='javascript:UPLOAD()' class='button secondary small fi-photo size-60' style='padding:10px;'><label>imagem</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_galerias' class='button secondary small fi-camera size-60' style='padding:10px;'><label>galeria</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_agencia' class='button secondary small fi-megaphone size-60' style='padding:10px;'><label>agência</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_blogs' class='button secondary small fi-social-blogger size-60' style='padding:10px;'><label>blogs</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_especiais' class='button secondary small fi-pricetag-multiple size-60' style='padding:10px;'><label>especias</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_temas' class='button secondary small fi-price-tag size-60' style='padding:10px;'><label>editorias</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_abrangencia' class='button secondary small fi-price-tag size-60' style='padding:10px;'><label>região</label></a></h3></li></ul></DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	$tema = $row['tema'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarnews&id={$row['id']}\"><p style='margin-top:10'><b>$tema</b>: $titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar notícia?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarnews&id={$row['id']}\">confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnews&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnews&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnews&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n"; ?>
	<?php	}
	else if($_SESSION["nivel"] >= "50")	{
		$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?php	$sql = "SELECT * FROM noticias";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarnews' class='button radius sucess marge fi-plus size-60'></a> Adicionar Notícias $id
			<ul class='button-group radius right'>
				<li><a href='javascript:UPLOAD()' class='button secondary small fi-photo size-60' style='padding:10px;'><label>imagem</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_galerias' class='button secondary small fi-camera size-60' style='padding:10px;'><label>galeria</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_agencia' class='button secondary small fi-megaphone size-60' style='padding:10px;'><label>agência</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_blogs' class='button secondary small fi-social-blogger size-60' style='padding:10px;'><label>blogs</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_especiais' class='button secondary small fi-pricetag-multiple size-60' style='padding:10px;'><label>especias</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_temas' class='button secondary small fi-price-tag size-60' style='padding:10px;'><label>editorias</label></a></li>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_abrangencia' class='button secondary small fi-price-tag size-60' style='padding:10px;'><label>região</label></a></h3></li></ul></DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	$tema = $row['tema'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarnews&id={$row['id']}\"><p style='margin-top:10'><b>$tema</b>: $titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar notícia?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarnews&id={$row['id']}\">confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnews&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnews&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnews&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n"; ?>
	<?php	}
	else{	echo "Ops... você não tem acesso para isso!";	}
}


function adicionarnews(){
	if($_SESSION["nivel"] >= "1")	{
	global $connection;
	$submit = $_POST[submit];
	if(!$submit){	?>
	<div class='small-12 columns'>
		<h3>Adicionar notícia 
			<?php
				$sql = "SHOW TABLE STATUS LIKE 'noticias'";
				$res = mysql_query($sql)or die(mysql_error());
				$status = mysql_fetch_array($res);
				echo $status['Auto_increment'];
				print_r($status[id]);
			?>
		</h3>
	</DIV>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 medium-8 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-6 medium-2 columns"><input type="datetime" name="pdate_data" placeholder="data" required="" value="<?= date("Y-m-d") ?>" id="dp1"/></div>
	<div class="small-6 medium-2 columns"><div class="row collapse">
		<div class="small-9 medium-8 columns"><input type="datetime" name="pdate_hora" placeholder="horário" required="" id="setTimeExample" class="time"/></div>
		<div class="small-3 medium-4 columns"><imput id="setTimeButton" class="button postfix secondary marge"><i class="fi-refresh"></i></imput></div></div></div>
	<div class="small-12 columns"><input type="text" name="resumo" placeholder="resumo" required="" /></div>
	<div class="small-12 medium-2 columns"><select name="tema" required="" >
		<option value="">editoria</option>
		<?php	
			$sql = "SELECT * FROM noticias_temas ORDER BY titulo ASC";
			$result = mysql_query($sql) or die("Error: " . mysql_error());
			while ($row=mysql_fetch_array($result)){
				$titulo = $row['titulo'];
				$identificador = $row['identificador'];
				echo "<option value=\"$identificador\">$titulo</option>";
			}	?>
		</select>
	</DIV>
	<div class="small-12 medium-2 columns"><select name="abrangencia" required="" >
		<option value="">abrangencia</option>
		<?php
			$sql = "SELECT * FROM noticias_abrangencia ORDER BY titulo ASC";
			$result = mysql_query($sql) or die("Error: " . mysql_error());
			while ($row=mysql_fetch_array($result)){
				$titulo = $row['titulo'];
				$identificador = $row['identificador'];
				echo "<option value=\"$identificador\">$titulo</option>";
			}	?>
		</select>
	</DIV>
	<div class="small-12 medium-3 columns">
		<select name="especial" >
			<option value="">especiais</option>
			<?php
				$sql = "SELECT * FROM noticias_especiais ORDER BY titulo ASC";
				$result = mysql_query($sql) or die("Error: " . mysql_error());
				while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];
					$identificador = $row['identificador'];
					echo "<option value=\"$identificador\">$titulo</option>";
				}
			?>
		</select>
	</DIV>
	<div class="small-12 medium-3 columns"><select name="agencia">
		<option value="">agência</option>
			<?php
				$sql = "SELECT * FROM noticias_agencia ORDER BY titulo ASC";
				$result = mysql_query($sql) or die("Error: " . mysql_error());
				while ($row=mysql_fetch_array($result)){
					$titulo = $row['titulo'];
					$identificador = $row['identificador'];
					echo "<option value=\"$identificador\">$titulo</option>";
				}	
			?>
		</select>
	</DIV>
	<div class="small-12 medium-2 columns">
		<select name="blog">
			<option value="">blog</option>
			<?php
				$sql = "SELECT * FROM noticias_blogs ORDER BY titulo ASC";
				$result = mysql_query($sql) or die("Error: " . mysql_error());
				while ($row=mysql_fetch_array($result)){
					$titulo = $row['titulo'];
					$identificador = $row['identificador'];
					echo "<option value=\"$identificador\">$titulo</option>";
				}	
			?>
		</select>
	</DIV>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" required="" value="Lucas Lemos - lucas.lemos@canalicara.com"/></div>

	<div class="small-12 medium-6 columns">	<input type="text" name="imagem" placeholder="foto" required="" value="http://www.canalicara.com/upload/noticias/photo.jpg"/></div>
	<div class="small-12 medium-4 columns">	<input type="text" name="imagem_autor" placeholder="foto-autor" value="Lucas Lemos [Canal Içara]"/></div>
	<div class="small-12 medium-2 columns">	<select name="imagem_exibicao">
		<option value="SIM">exibir imagem</option>
		<option value="NÃO">não exibir</option></select></div>

	<IFRAME class="small-12 columns" Style='HEIGHT: 58px' border=0 marginWidth=0 marginHeight=0 src="https://www.canalicara.com/portal_upload.php?action=upload&diretorio=upload/noticias/" frameBorder=no scrolling=no></IFRAME>

	<div class="small-12 medium-6 columns">
		<select name="galeria">
		<option value="">galeria de imagens</option>
		<?php
			$sql = "SELECT * FROM noticias_galerias ORDER BY id DESC";
			$result = mysql_query($sql) or die("Error: " . mysql_error());
			while ($row=mysql_fetch_array($result)){
				$titulo = $row['titulo'];
				$id = $row['id'];
				echo "<option value=\"$id\">$id - $titulo</option>";
			}
		?>
		</select>
	</div>
	<div class="small-12 medium-4 columns"><input type="text" name="video_youtube" placeholder="video_youtube ID" value=""/></div>
	<div class="small-12 medium-2 columns"><select name="video">
		<option value="">sem vídeo</option>
		<option value="SIM">com vídeo</option></select></div>

	<div class="small-12 medium-2 columns"><input type="datetime" name="agendar" placeholder="inserir na agenda" id="dp3"/></div>
	<div class="small-12 columns"><textarea name="texto" placeholder="conteúdo" required="" rows="10" required=""></textarea></div>
	<div class="small-12 medium-8 columns"><input type="text" name="frase_texto" placeholder="frase: texto"/></div>
	<div class="small-12 medium-4 columns"><input type="text" name="frase_autor" placeholder="frase: autor"/></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div>

	<TEXTAREA type="text" class="small-12 columns" style="HEIGHT: 188px" rows=5 cols=35>
	&lt;a class=links href="https://www.canalicara.com/?action=news&amp;id=1132" target=_blank&gt;» titulo&lt;/a&gt;

	&lt;div class="flex-video widescreen"&gt;&lt;iframe width="696" height="392" src="https://www.youtube.com/embed/IjUv3bcug0k" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;&lt;/DIV&gt;

	&lt;DIV class=texto_complemento_titulo&gt;Resultado final&lt;/div&gt;&lt;DIV class=texto_complemento&gt;&lt;/div&gt;

	&lt;<object type="application/x-shockwave-flash" width="17" height="17" data="https://www.canalicara.com/player.swf?&song_url=http://www.camaraicara.sc.gov.br/Arquivos/Sessoes/2008/61_sessao_ordinaria_15_12_2008.mp3">&lt;/a&gt;
	&lt;<param name="movie"  value="http://www.canalicara.com/player.swf?&song_url=http://www.camaraicara.sc.gov.br/Arquivos/Sessoes/2008/61_sessao_ordinaria_15_12_2008.mp3" /></object>&lt;/a&gt;</TEXTAREA></form>

<?php
	}
	else{
		$titulo = $_POST[titulo];
		$resumo = $_POST[resumo];
		$pdate_data = $_POST[pdate_data];
		$pdate_hora = $_POST[pdate_hora];
		$tema = $_POST[tema];
		$abrangencia = $_POST[abrangencia];
		$especial = $_POST[especial];
		$agencia = $_POST[agencia];
		$blog = $_POST[blog];
		$autor = $_POST[autor];
		$imagem = $_POST[imagem];
		$imagem_exibicao = $_POST[imagem_exibicao];
		$imagem_autor = $_POST[imagem_autor];
		$galeria = $_POST[galeria];
		$video = $_POST[video];
		$video_youtube = $_POST[video_youtube];
		$texto = $_POST[texto];
		$agendar = $_POST[agendar];
		$frase_texto = $_POST[frase_texto];
		$frase_autor = $_POST[frase_autor];
		$query = "INSERT INTO noticias(titulo, resumo, tema, abrangencia, especial, agencia, blog, autor, imagem, imagem_exibicao, imagem_autor, galeria, video, video_youtube, texto, agenda, frase_texto, frase_autor, id_usuario, pdate) VALUES('$titulo', '$resumo', '$tema', '$abrangencia', '$especial', '$agencia', '$blog', '$autor', '$imagem', '$imagem_exibicao', '$imagem_autor', '$galeria', '$video', '$video_youtube', '$texto', '$agendar', '$frase_texto', '$frase_autor', ".$_SESSION[id_usuario].", '$pdate_data $pdate_hora')";
		$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
		echo "<font face=\"verdana\" size=\"2\">Notícia $id enviada com sucesso!</font>";		}	
	}
	else { echo "Ops... você não tem acesso para isso!"; }
}

function deletarnews($id){
	if($_SESSION["nivel"] >= "100")	{
		global $connection;
		$query = "DELETE FROM noticias WHERE id= '$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		echo "<font face=\"verdana\" size=\"2\">Notícia deletada com sucesso</font>";
	}
	else{	echo "Ops... você não tem acesso para isso!";	}
}

function editarnews($id){
	if($_SESSION["nivel"] >= "1"){
		global $connection;
		$submit = $_POST[submit];
		if(!$submit){
			$query = "SELECT titulo, resumo, pdate, tema, abrangencia, especial, agencia, blog, autor, imagem, imagem_exibicao, imagem_autor, galeria, video, video_youtube, texto, agenda, frase_texto, frase_autor, id_usuario, atualizacao FROM noticias WHERE id='$id'";
			$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
			if(($_SESSION["nivel"] < "50") && ($_SESSION["id_usuario"] != "$row->id_usuario")){
				echo "<font face=\"verdana\" size=\"2\">Você não tem autorização para esta edição</font>";
			}
			else if(mysql_num_rows($result) >0){
				$row = mysql_fetch_object($result);
				$rowpdate = explode(" ", $row->pdate);
				$data = $rowpdate[0];	$hora = $rowpdate[1];
				$rowagenda = explode("-", $row->agenda);
				$dia = $rowagenda[2];
				$mes = $rowagenda[1];
				$ano = $rowagenda[0];?>
				<div class='small-12 columns'><h3>Editar notícia <?= $id ?></h3></DIV><form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?= $id ?>">
				<div class="small-12 medium-8 columns"><input type="text" name="titulo" placeholder="título" required="" value="<?= $row->titulo ?>"/></div>
				<div class="small-6 medium-2 columns"><input type="datetime" name="pdate_data" placeholder="data" required="" value="<?= $data ?>" id="dp1"/></div>
				<div class="small-6 medium-2 columns"><div class="row collapse">
					<div class="small-9 medium-8 columns"><input type="datetime" name="pdate_hora" placeholder="horário" required="" id="setTimeExample" class="time" value="<?= $hora ?>"/></div>
					<div class="small-3 medium-4 columns"><imput id="setTimeButton" class="button postfix secondary"><i class="fi-refresh"></i></imput></div></div></div>
				<div class="small-12 columns"><input type="text" name="resumo" placeholder="resumo" required="" value="<?= $row->resumo ?>"/></div>
				<div class="small-12 medium-2 columns">	<input type="text" name="tema" placeholder="tema" required="" value="<?= $row->tema ?>"/></div>
				<div class="small-12 medium-2 columns">	<input type="text" name="abrangencia" placeholder="abrangencia" required="" value="<?= $row->abrangencia ?>"/></div>
				<div class="small-12 medium-3 columns">	<input type="text" name="especial" placeholder="especial" value="<?= $row->especial ?>"></div>
				<div class="small-12 medium-3 columns">	<input type="text" name="agencia" placeholder="agencia" value="<?= $row->agencia ?>"></div>
				<div class="small-12 medium-2 columns">	<input type="text" name="blog" placeholder="blog" value="<?= $row->blog ?>"></div>
				<div class="small-12 columns">		<input type="text" name="autor" placeholder="autor" required="" value="<?= $row->autor ?>"/></div>
				<div class="small-12 medium-6 columns"><input type="text" name="imagem" placeholder="foto" required="" value="<?= $row->imagem ?>"/></div>
				<div class="small-12 medium-4 columns"><input type="text" name="imagem_autor" placeholder="foto-autor" value="<?= $row->imagem_autor ?>"/></div>
				<div class="small-12 medium-2 columns"><input type="text" name="imagem_exibicao" placeholder="foto" required="" value="<?= $row->imagem_exibicao ?>"></div>
				<div class="small-12 medium-6 columns"><input type="text" name="galeria" placeholder="galeria" value="<?= $row->galeria ?>"/></div>
				<div class="small-12 medium-4 columns">	<input type="text" name="video_youtube" placeholder="video_youtube" value="<?= $row->video_youtube ?>"/></div>
				<div class="small-12 medium-2 columns">	<input type="text" name="video" placeholder="video" value="<?= $row->video ?>"/></div>
				<div class="small-12 columns"		><textarea name="texto" placeholder="texto" required="" rows="10" required=""><?= $row->texto ?></textarea></div>
				<div class="small-12 medium-8 columns">	<input type="text" name="frase_texto" placeholder="frase: texto" value="<?= $row->frase_texto ?>"/></div>
				<div class="small-12 medium-4 columns">	<input type="datetime" name="frase_autor" placeholder="frase: autor" value="<?= $row->frase_autor ?>"/></div>
				<div class="small-12 medium-4 columns">	<input type="datetime" name="agendar" placeholder="inserir na agenda" id="dp3" value="<?= $row->agenda ?>"/></div>
				<div class="small-12 medium-8 columns">		<input type="text" name="atualizacao" placeholder="atualização" value="<?= $row->atualizacao ?>"/></div>
				<div class="small-12 columns">		<input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php
			}
			else{	echo "<font face=\"verdana\" size=\"2\">Notícia inexistente</font>";	}
		}
		else{
			$titulo = $_POST[titulo];
			$resumo = $_POST[resumo];
			$pdate_data = $_POST[pdate_data];
			$pdate_hora = $_POST[pdate_hora];
			$tema = $_POST[tema];
			$abrangencia = $_POST[abrangencia];
			$especial = $_POST[especial];
			$agencia = $_POST[agencia];
			$blog = $_POST[blog];
			$autor = $_POST[autor];
			$imagem = $_POST[imagem];
			$imagem_exibicao = $_POST[imagem_exibicao];
			$imagem_autor = $_POST[imagem_autor];
			$galeria = $_POST[galeria];
			$video = $_POST[video];
			$video_youtube = $_POST[video_youtube];
			$texto = $_POST[texto];
			$agendar = $_POST[agendar];
			$frase_texto = $_POST[frase_texto];
			$frase_autor = $_POST[frase_autor];
			$atualizacao = $_POST[atualizacao];
			$query = "UPDATE noticias SET titulo = '$titulo', resumo = '$resumo', tema = '$tema', abrangencia = '$abrangencia', especial = '$especial', agencia = '$agencia', blog = '$blog', autor = '$autor', imagem = '$imagem', imagem_exibicao = '$imagem_exibicao', imagem_autor = '$imagem_autor', galeria = '$galeria', video = '$video', video_youtube = '$video_youtube', texto = '$texto', agenda = '$agendar', frase_texto = '$frase_texto', frase_autor = '$frase_autor', atualizacao = '$atualizacao', pdate = '$pdate_data $pdate_hora' WHERE id = '$id'";
			$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
			echo "<font face=\"verdana\" size=\"2\">Notícia editada com sucesso</font>";
		}
	}
	else{	echo "Ops... você não tem acesso para isso!";	}
}

switch($_GET['action']) {
	case 'ferramentas_facebook':	ferramentas_facebook();	break;
	case 'adicionarnews':			adicionarnews();	break;
	case 'editarnews':				editarnews($_GET['id']);	break;
	case 'deletarnews':				deletarnews($_GET['id']);	break;
	case 'mostrarnews':				mostrarnews($_GET['pagina']);	break;
	default: index();
}
?>