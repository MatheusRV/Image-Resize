<?php	if (strstr($_SERVER["PHP_SELF"], "/admin/"))  die ("<html><head><title>Error</title></head><body scroll=\"no\"><BR><BR><center><font face=\"Verdana\" size=\"1\">Acesso negado!</font></center></body></html>");

include("portal_config.php");

function index()	{
?>

<font face="verdana" size="2">Administração</font>
 
<?php
	}

	function cortar_texto($string,$max_size,$tail)	{		$linha = "$string";		$size = strlen($linha);		if(strlen($linha)>$max_size)	{		$linha = substr($linha, 0, $max_size);		$d = $linha;		$tmp = strrpos($d," ");		$linha = substr($linha, 0, $tmp);		$linha = $linha.$tail;		return $linha;		}		else		{		return $linha;		}	}
        function seoUrl($str){
        	$aaa = array('/(à|á|â|ã|ä|å|æ)/','/(è|é|ê|ë)/','/(ì|í|î|ï)/','/(ð|ò|ó|ô|õ|ö|ø)/','/(ù|ú|û|ü)/','/ç/','/þ/','/ñ/','/ß/','/(ý|ÿ)/','/(=|\+|\/|\\\|\.|\'|\_|\\n| |\(|\))/','/[^a-z0-9_ -]/s');
        	$bbb = array('a','e','i','o','u','c','d','n','s','y','-','');
        	return trim(trim(trim(preg_replace('/-{2,}/s', '-', preg_replace($aaa, $bbb, strtolower($str)))),'_'),'-');    }


//NOTÍCIAS=============================================================

function mostrarnews($pagina)	{	if(($_SESSION["nivel"] >= "1") AND ($_SESSION["nivel"] <= "49"))	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM noticias WHERE id_usuario = ".$_SESSION['id_usuario']."";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias WHERE id_usuario = ".$_SESSION['id_usuario']." ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
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

		<?	}	else if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM noticias";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
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
		<?	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarnews()	{	if($_SESSION["nivel"] >= "1")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Adicionar notícia <?	$sql = "SHOW TABLE STATUS LIKE 'noticias'";	$res = mysql_query($sql)or die(mysql_error());	$status = mysql_fetch_array($res); echo $status['Auto_increment'];	print_r($status[id]);	?></h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 medium-8 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-6 medium-2 columns"><input type="datetime" name="pdate_data" placeholder="data" required="" value="<?php echo date("Y-m-d") ?>" id="dp1"/></div>
	<div class="small-6 medium-2 columns"><div class="row collapse">
		<div class="small-9 medium-8 columns"><input type="datetime" name="pdate_hora" placeholder="horário" required="" id="setTimeExample" class="time"/></div>
		<div class="small-3 medium-4 columns"><imput id="setTimeButton" class="button postfix secondary marge"><i class="fi-refresh"></i></imput></div></div></div>
	<div class="small-12 medium-2 columns"><select name="tema" required="" >
		<option value="">editoria</option>
		<?php	$sql = "SELECT * FROM noticias_temas ORDER BY titulo ASC";	$result = mysql_query($sql) or die("Error: " . mysql_error());	while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];  $identificador = $row['identificador'];
			echo "<option value=\"$identificador\">$titulo</option>";	}	?></select></DIV>
	<div class="small-12 medium-2 columns"><select name="abrangencia" required="" >
		<option value="">abrangencia</option>
		<?php	$sql = "SELECT * FROM noticias_abrangencia ORDER BY titulo ASC";	$result = mysql_query($sql) or die("Error: " . mysql_error());	while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];  $identificador = $row['identificador'];
			echo "<option value=\"$identificador\">$titulo</option>";	}	?></select></DIV>
	<div class="small-12 medium-3 columns"><select name="especial" >
		<option value="">especiais</option>
			<?php	$sql = "SELECT * FROM noticias_especiais ORDER BY titulo ASC";	$result = mysql_query($sql) or die("Error: " . mysql_error());	while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];  $identificador = $row['identificador'];
			echo "<option value=\"$identificador\">$titulo</option>";	}	?></select></DIV>
	<div class="small-12 medium-3 columns"><select name="agencia">
		<option value="">agência</option>
			<?php	$sql = "SELECT * FROM noticias_agencia ORDER BY titulo ASC";	$result = mysql_query($sql) or die("Error: " . mysql_error());	while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];  $identificador = $row['identificador'];
			echo "<option value=\"$identificador\">$titulo</option>";	}	?></select></DIV>
	<div class="small-12 medium-2 columns"><select name="blog">
		<option value="">blog</option>
			<?php	$sql = "SELECT * FROM noticias_blogs ORDER BY titulo ASC";	$result = mysql_query($sql) or die("Error: " . mysql_error());	while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];  $identificador = $row['identificador'];
			echo "<option value=\"$identificador\">$titulo</option>";	}	?></select></DIV>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" required="" value="Lucas Lemos - lucas.lemos@canalicara.com"/></div>
	<div class="small-12 medium-10 columns"><select name="galeria">
		<option value="">galeria de imagens</option>
		<?php	$sql = "SELECT * FROM noticias_galerias ORDER BY id DESC";	$result = mysql_query($sql) or die("Error: " . mysql_error());	while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];  $id = $row['id'];
			echo "<option value=\"$id\">$id - $titulo</option>";	}	?></select></div>
	<div class="small-12 medium-2 columns"><select name="video">
		<option value="">sem vídeo</option>
		<option value="SIM">com vídeo</option></select></div>
	<div class="small-12 medium-10 columns"><input type="text" name="imagem" placeholder="foto" required="" value="http://www.canalicara.com/upload/noticias/photo.jpg"/></div>
	<div class="small-12 medium-2 columns"><select name="imagem_exibicao">
		<option value="SIM">exibir imagem</option>
		<option value="NÃO">não exibir</option></select></div>
	<IFRAME class="small-12 columns" Style='HEIGHT: 58px' border=0 marginWidth=0 marginHeight=0 src="https://www.canalicara.com/portal/upload.php?action=upload&diretorio=upload/noticias/" frameBorder=no scrolling=no></IFRAME>
	<div class="small-12 medium-10 columns"><input type="text" name="imagem_autor" placeholder="foto-autor" value="Lucas Lemos [Canal Içara]"/></div>
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

<?php	}	else		{
	$titulo = $_POST[titulo];
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
	$texto = $_POST[texto];
	$agendar = $_POST[agendar];
	$frase_texto = $_POST[frase_texto];
	$frase_autor = $_POST[frase_autor];
	$query = "INSERT INTO noticias(titulo, tema, abrangencia, especial, agencia, blog, autor, imagem, imagem_exibicao, imagem_autor, galeria, video, texto, agenda, frase_texto, frase_autor, id_usuario, pdate) VALUES('$titulo', '$tema', '$abrangencia', '$especial', '$agencia', '$blog', '$autor', '$imagem', '$imagem_exibicao', '$imagem_autor', '$galeria', '$video', '$texto', '$agendar', '$frase_texto', '$frase_autor', ".$_SESSION[id_usuario].", '$pdate_data $pdate_hora')";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Notícia $id enviada com sucesso!</font>";		}	
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarnews($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM noticias WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Notícia deletada com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarnews($id)	{	if($_SESSION["nivel"] >= "1")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, pdate, tema, abrangencia, especial, agencia, blog, autor, imagem, imagem_exibicao, imagem_autor, galeria, video, texto, agenda, frase_texto, frase_autor, id_usuario, atualizacao FROM noticias WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
			if(($_SESSION["nivel"] >= "1") AND ($_SESSION["nivel"] < "50") AND ($_SESSION["id_usuario"] != $row->id_usuario))	{	echo "<font face=\"verdana\" size=\"2\">Você não tem autorização para esta edição</font>";	}

			else if(mysql_num_rows($result) >0)			{
			$row = mysql_fetch_object($result);
		$rowpdate = explode(" ", $row->pdate);	$data = $rowpdate[0];	$hora = $rowpdate[1];
		$rowagenda = explode("-", $row->agenda);	$dia = $rowagenda[2];	$mes = $rowagenda[1];	$ano = $rowagenda[0];	?>
	<div class='small-12 columns'><h3>Editar notícia <? echo $id ?></h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 medium-8 columns"><input type="text" name="titulo" placeholder="título" required="" value="<?php echo $row->titulo; ?>"/></div>
	<div class="small-6 medium-2 columns"><input type="datetime" name="pdate_data" placeholder="data" required="" value="<?php echo $data; ?>" id="dp1"/></div>
	<div class="small-6 medium-2 columns"><div class="row collapse">
		<div class="small-9 medium-8 columns"><input type="datetime" name="pdate_hora" placeholder="horário" required="" id="setTimeExample" class="time" value="<?php echo $hora; ?>"/></div>
		<div class="small-3 medium-4 columns"><imput id="setTimeButton" class="button postfix secondary"><i class="fi-refresh"></i></imput></div></div></div>
	<div class="small-12 medium-2 columns"><input type="text" name="tema" placeholder="tema" required="" value="<?php echo $row->tema; ?>"/></div>
	<div class="small-12 medium-2 columns"><input type="text" name="abrangencia" placeholder="abrangencia" required="" value="<?php echo $row->abrangencia; ?>"/></div>
	<div class="small-12 medium-3 columns"><input type="text" name="especial" placeholder="especial" value="<?php echo $row->especial; ?>"></div>
	<div class="small-12 medium-3 columns"><input type="text"  name="agencia" placeholder="agencia" value="<?php echo $row->agencia; ?>"></div>
	<div class="small-12 medium-2 columns"><input type="text"  name="blog" placeholder="blog" value="<?php echo $row->blog; ?>"></div>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" required="" value="<?php echo $row->autor; ?>"/></div>
	<div class="small-12 medium-10 columns"><input type="text" name="galeria" placeholder="galeria" value="<?php echo $row->galeria; ?>"/></div>
	<div class="small-12 medium-2 columns"><input type="text" name="video" placeholder="video" value="<?php echo $row->video; ?>"/></div>
	<div class="small-12 medium-10 columns"><input type="text" name="imagem" placeholder="foto" required="" value="<?php echo $row->imagem; ?>"/></div>
	<div class="small-12 medium-2 columns"><input type="text" name="imagem_exibicao" placeholder="foto" required="" value="<?php echo $row->imagem_exibicao; ?>"></div>
	<div class="small-12 medium-10 columns"><input type="text" name="imagem_autor" placeholder="foto-autor" value="<?php echo $row->imagem_autor; ?>"/></div>
	<div class="small-12 medium-2 columns"><input type="datetime" name="agendar" placeholder="inserir na agenda" id="dp3" value="<?php echo $row->agenda; ?>"/></div>
	<div class="small-12 columns"><textarea name="texto" placeholder="texto" required="" rows="10" required=""><?php echo $row->texto; ?></textarea></div>
	<div class="small-12 medium-8 columns"><input type="text" name="frase_texto" placeholder="frase: texto" value="<?php echo $row->frase_texto; ?>"/></div>
	<div class="small-12 medium-4 columns"><input type="datetime" name="frase_autor" placeholder="frase: autor" value="<?php echo $row->frase_autor; ?>"/></div>
	<div class="small-12 columns"><input type="text" name="atualizacao" placeholder="atualização" value="<?php echo $row->atualizacao; ?>"/></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Notícia inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
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
	$texto = $_POST[texto];
	$agendar = $_POST[agendar];
	$frase_texto = $_POST[frase_texto];
	$frase_autor = $_POST[frase_autor];
	$atualizacao = $_POST[atualizacao];
	$query = "UPDATE noticias SET titulo = '$titulo', tema = '$tema', abrangencia = '$abrangencia', especial = '$especial', agencia = '$agencia', blog = '$blog', autor = '$autor', imagem = '$imagem', imagem_exibicao = '$imagem_exibicao', imagem_autor = '$imagem_autor', galeria = '$galeria', video = '$video', texto = '$texto', agenda = '$agendar', frase_texto = '$frase_texto', frase_autor = '$frase_autor', atualizacao = '$atualizacao', pdate = '$pdate_data $pdate_hora' WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Notícia editada com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}



//ESPECIAIS=============================================================

function mostrarnoticias_especiais($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM noticias_especiais";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias_especiais ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarnoticias_especiais' class='button radius sucess marge fi-plus size-60'></a> Adicionar Especial</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarnoticias_especiais&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar cobertura especial?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarnoticias_especiais&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_especiais&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_especiais&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_especiais&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarnoticias_especiais()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Cadastrar especial</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 medium-6 columns"><select name="tema" required="" >
		<option value="">editoria</option>
		<?php	$sql = "SELECT * FROM noticias_temas ORDER BY titulo ASC";	$result = mysql_query($sql) or die("Error: " . mysql_error());	while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];  $identificador = $row['identificador'];
			echo "<option value=\"$identificador\">$titulo</option>";	}	?></select></DIV>
	<div class="small-12 medium-6 columns"><input type="text" name="identificador" placeholder="identificador" required="" /></div>
	<div class="small-12 medium-2 columns"><input type="text" name="ano" placeholder="ano" required="" /></div>
	<div class="small-12 medium-10 columns"><input type="text" name="imagem" placeholder="imagem" required="" value="http://www.canalicara.com/upload/especiais/px.gif" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div>
<?php	}	else	{
	$titulo = $_POST[titulo];
	$tema = $_POST[tema];
	$identificador = $_POST[identificador];
	$ano = $_POST[ano];
	$imagem = $_POST[imagem];
	$query = "INSERT INTO noticias_especiais(titulo, tema, identificador, ano, imagem, pdate) VALUES('$titulo', '$tema', '$identificador', '$ano', '$imagem', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Especial enviado com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarnoticias_especiais($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM noticias_especiais WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Especial deletada com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarnoticias_especiais($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, tema, identificador, ano, imagem FROM noticias_especiais WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar especial</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required=""  value="<?php echo $row->titulo; ?>"/></div>
	<div class="small-12 medium-6 columns"><input type="text" name="tema" placeholder="tema" required=""  value="<?php echo $row->tema; ?>"/></DIV>
	<div class="small-12 medium-6 columns"><input type="text" name="identificador" placeholder="identificador" required=""  value="<?php echo $row->identificador; ?>"/></div>
	<div class="small-12 medium-2 columns"><input type="text" name="ano" placeholder="ano" required=""  value="<?php echo $row->ano; ?>"/></div>
	<div class="small-12 medium-10 columns"><input type="text" name="imagem" placeholder="imagem" required=""  value="<?php echo $row->imagem; ?>" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Especial inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$tema = $_POST[tema];
	$identificador = $_POST[identificador];
	$ano = $_POST[ano];
	$imagem = $_POST[imagem];
	$query = "UPDATE noticias_especiais SET titulo = '$titulo', tema = '$tema', identificador = '$identificador', ano = '$ano', imagem = '$imagem', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Especial editado com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}


//TEMAS=============================================================

function mostrarnoticias_temas($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM noticias_temas";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias_temas ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarnoticias_temas' class='button radius sucess marge fi-plus size-60'></a> Adicionar Editoria</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarnoticias_temas&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar editoria?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarnoticias_temas&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_temas&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_temas&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_temas&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarnoticias_temas()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Cadastrar editoria</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 columns"><input type="text" name="identificador" placeholder="identificador" required="" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div>
<?php	}	else	{
	$titulo = $_POST[titulo];
	$identificador = $_POST[identificador];
	$query = "INSERT INTO noticias_temas(titulo, identificador, pdate) VALUES('$titulo', '$identificador', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Tema enviado com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarnoticias_temas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM noticias_temas WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Tema deletado com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarnoticias_temas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, identificador FROM noticias_temas WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar editoria</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required=""  value="<?php echo $row->titulo; ?>"/></div>
	<div class="small-12 columns"><input type="text" name="identificador" placeholder="identificador" required=""  value="<?php echo $row->identificador; ?>"/></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Tema inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$identificador = $_POST[identificador];
	$query = "UPDATE noticias_temas SET titulo = '$titulo', identificador = '$identificador', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Tema editado com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

//NOTICIAS_ABRANGENCIA=============================================================

function mostrarnoticias_abrangencia($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM noticias_abrangencia";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias_abrangencia ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarnoticias_abrangencia' class='button radius sucess marge fi-plus size-60'></a> Adicionar Abrangência</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarnoticias_abrangencia&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar editoria?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarnoticias_abrangencia&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_abrangencia&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_abrangencia&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_abrangencia&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarnoticias_abrangencia()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Cadastrar abrangência</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 columns"><input type="text" name="identificador" placeholder="identificador" required="" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div>
<?php	}	else	{
	$titulo = $_POST[titulo];
	$identificador = $_POST[identificador];
	$query = "INSERT INTO noticias_abrangencia(titulo, identificador, pdate) VALUES('$titulo', '$identificador', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Abrangência enviada com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarnoticias_abrangencia($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM noticias_abrangencia WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Abrangência deletada com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarnoticias_abrangencia($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, identificador FROM noticias_abrangencia WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar abrangência</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required=""  value="<?php echo $row->titulo; ?>"/></div>
	<div class="small-12 columns"><input type="text" name="identificador" placeholder="identificador" required=""  value="<?php echo $row->identificador; ?>"/></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Abrangência inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$identificador = $_POST[identificador];
	$query = "UPDATE noticias_abrangencia SET titulo = '$titulo', identificador = '$identificador', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Abrangência editada com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

//AGENCIAS=============================================================

function mostrarnoticias_agencia($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM noticias_agencia";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias_agencia ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarnoticias_agencia' class='button radius sucess marge fi-plus size-60'></a> Adicionar Agência</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarnoticias_agencia&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar agência?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarnoticias_agencia&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_agencia&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_agencia&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_agencia&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarnoticias_agencia()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Adicionar Agência</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 columns"><input type="text" name="identificador" placeholder="identificador" required="" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div>
<?php	}	else	{
	$titulo = $_POST[titulo];
	$identificador = $_POST[identificador];
	$query = "INSERT INTO noticias_agencia(titulo, identificador, pdate) VALUES('$titulo', '$identificador', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Cadastro de agência feito com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarnoticias_agencia($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM noticias_agencia WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Cadastro de agência  deletado com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarnoticias_agencia($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, identificador FROM noticias_agencia WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar cadastro de Agência</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" value="<?php echo $row->titulo; ?>" /></div>
	<div class="small-12 columns"><input type="text" name="identificador" placeholder="identificador" required="" value="<?php echo $row->identificador; ?>"/></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Agência inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$identificador = $_POST[identificador];
	$query = "UPDATE noticias_agencia SET titulo = '$titulo', identificador = '$identificador', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Cadastro de agência editado com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

//BLOGS=============================================================

function mostrarnoticias_blogs($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM noticias_blogs";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias_blogs ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarnoticias_blogs' class='button radius sucess marge fi-plus size-60'></a> Adicionar Blog</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarnoticias_blogs&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar blog?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarnoticias_blogs&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_blogs&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_blogs&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_blogs&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarnoticias_blogs()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Cadastrar blog</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 columns"><input type="text" name="identificador" placeholder="identificador" required="" /></div>
	<div class="small-12 columns"><textarea name="autor" placeholder="autor" required="" rows="10" required=""></textarea></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div>
<?php	}	else	{
	$titulo = $_POST[titulo];
	$identificador = $_POST[identificador];
	$autor = $_POST[autor];
	$query = "INSERT INTO noticias_blogs(titulo, identificador, autor, pdate) VALUES('$titulo', '$identificador', '$autor', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Blog inserido com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarnoticias_blogs($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM noticias_blogs WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Blog deletado com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarnoticias_blogs($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, identificador, autor FROM noticias_blogs WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar cadastro de blog</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required=""  value="<?php echo $row->titulo; ?>"/></div>
	<div class="small-12 columns"><input type="text" name="identificador" placeholder="identificador" required=""  value="<?php echo $row->identificador; ?>"/></div>
	<div class="small-12 columns"><textarea name="autor" placeholder="autor" required="" rows="10" required=""><? echo $row->autor; ?></textarea></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Blog inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$identificador = $_POST[identificador];
	$autor = $_POST[autor];
	$query = "UPDATE noticias_blogs SET titulo = '$titulo', identificador = '$identificador', autor = '$autor', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Blog editado com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

//NOTICIAS-GALERIAS=============================================================

function mostrarnoticias_galerias($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM noticias_galerias";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM noticias_galerias ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarnoticias_galerias' class='button radius sucess marge fi-plus size-60'></a> Adicionar galeria</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	$calendario = $row['calendario'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarnoticias_galerias&id={$row['id']}\"><p style='margin-top:10'><b>$calendario</b>: $titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar galeria de imagens?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarnoticias_galerias&id={$row['id']}\">confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_galerias&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_galerias&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnoticias_galerias&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarnoticias_galerias()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Cadastrar galeria de imagens</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 medium-10 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 medium-2 columns"><input type="text" name="calendario" placeholder="calendario --/--/--" required="" value="<?php echo date("d/m/Y") ?>" id="dp4"/></div>
	<div class="small-12 medium-8 columns"><input type="text" name="autor" placeholder="autor" required="" /></div>
	<div class="small-12 medium-4 columns"><input type="text" name="local" placeholder="local" /></div>
	<div class="small-12 medium-10 columns"><input type="text" name="pasta" placeholder="pasta" required="" value="eventos/"/></div>
	<div class="small-12 medium-2 columns"><input type="text" name="imgtitulo" placeholder="imgtitulo" required="" value="1.jpg"/></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
<?php	}	else	{
	$titulo = $_POST[titulo];
	$galerias = $_POST[galerias];
	$autor = $_POST[autor];
	$calendario = $_POST[calendario];
	$local = $_POST[local];
	$pasta = $_POST[pasta];
	$imgtitulo = $_POST[imgtitulo];
	$query = "INSERT INTO noticias_galerias(titulo, galerias, autor, calendario, local, ano, pasta, imgtitulo, pdate) VALUES('$titulo', '$galerias', '$autor', '$calendario', '$local', '$ano', '$pasta', '$imgtitulo', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Galeria $id criada com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarnoticias_galerias($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM noticias_galerias WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Galeria deletada com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarnoticias_galerias($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, galerias, autor, autor, calendario, local, pasta, imgtitulo FROM noticias_galerias WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar galeria de imagens</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 medium-10 columns"><input type="text" name="titulo" placeholder="título" required="" value="<?php echo $row->titulo; ?>" /></div>
	<div class="small-12 medium-2 columns"><input type="text" name="calendario" placeholder="calendario --/--/--" required="" value="<?php echo $row->calendario; ?>" id="dp4"/></div>
	<div class="small-12 medium-8 columns"><input type="text" name="autor" placeholder="autor" required="" value="<?php echo $row->autor; ?>" /></div>
	<div class="small-12 medium-4 columns"><input type="text" name="local" placeholder="local" value="<?php echo $row->local; ?>" /></div>
	<div class="small-12 medium-10 columns"><input type="text" name="pasta" placeholder="pasta" required="" value="<?php echo $row->pasta; ?>" /></div>
	<div class="small-12 medium-2 columns"><input type="text" name="imgtitulo" placeholder="imgtitulo" required="" value="<?php echo $row->imgtitulo; ?>" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Galeria inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$galerias = $_POST[galerias];
	$autor = $_POST[autor];
	$calendario = $_POST[calendario];
	$local = $_POST[local];
	$pasta = $_POST[pasta];
	$imgtitulo = $_POST[imgtitulo];
	$query = "UPDATE noticias_galerias SET titulo = '$titulo', galerias = '$galerias', autor = '$autor', calendario = '$calendario', local = '$local', pasta = '$pasta', imgtitulo = '$imgtitulo', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Galeria editada com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

//PAGINAS=============================================================

function mostrarpaginas($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM paginas";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM paginas ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarpaginas' class='button radius sucess marge fi-plus size-60'></a> Adicionar Página</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarpaginas&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar página?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarpaginas&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarpaginas&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarpaginas&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarpaginas&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarpaginas()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Adicionar página</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="imagem" value="http://www.canalicara.com/upload/paginas.jpg"/></div>
	<div class="small-12 columns"><textarea name="texto" placeholder="conteúdo" rows="10" required=""></textarea></div>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor"/></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
<?php	}	else		{
	$autor = $_POST[autor];
	$titulo = $_POST[titulo];
	$imagem = $_POST[imagem];
	$texto = $_POST[texto];
	$query = "INSERT INTO paginas(autor, titulo, imagem, texto, pdate) VALUES('$autor', '$titulo', '$imagem', '$texto', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Página enviada com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarpaginas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM paginas WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Página deletada com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarpaginas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, imagem, texto, autor FROM paginas WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar página</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required=""  value="<? echo $row->titulo; ?>"/></div>
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="imagem"  value="<? echo $row->imagem; ?>"/></div>
	<div class="small-12 columns"><textarea name="texto" placeholder="conteúdo" required="" rows="10" required=""><? echo $row->texto; ?></textarea></div>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" value="<? echo $row->autor; ?>"/></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Página inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$imagem = $_POST[imagem];
	$texto = $_POST[texto];
	$autor = $_POST[autor];
	$query = "UPDATE paginas SET titulo = '$titulo', imagem = '$imagem', texto = '$texto', autor = '$autor', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Página editada com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

//CALENDÁRIO-DATAS=============================================================

function mostrardatas($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM multimidia_datas";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM multimidia_datas ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionardatas' class='button radius sucess marge fi-plus size-60'></a> Adicionar data</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editardatas&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar data?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletardatas&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarphoto_datas&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarphoto_datas&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarphoto_datas&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionardatas()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Adicionar data</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 medium-10 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 medium-2 columns"><input type="datetime" name="data" placeholder="data" required="" value="<?php echo date("Y-m-d") ?>" id="dp1"/></div>
	<div class="small-12 columns"><textarea name="texto" placeholder="conteúdo" rows="10" required=""></textarea></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
<?php	}	else	{
	$titulo = $_POST[titulo];
	$data = $_POST[data];
	$texto = $_POST[texto];
	$query = "INSERT INTO multimidia_datas(pdate, titulo, data, texto) VALUES(NOW(), '$titulo', '$data', '$texto')";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Data adicionada com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletardatas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM multimidia_datas WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Data deletada com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editardatas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, data, texto FROM multimidia_datas WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result);	?>
	<div class='small-12 columns'><h3>Editar data</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 medium-10 columns"><input type="text" name="titulo" placeholder="título" required=""  value="<?php echo $row->titulo; ?>"/></div>
	<div class="small-12 medium-2 columns"><input type="datetime" name="data" placeholder="data" required="" value="<?php echo $row->data; ?>" id="dp1"/></div>
	<div class="small-12 columns"><textarea name="texto" placeholder="conteúdo" required="" rows="10" required=""><?php echo $row->texto; ?></textarea></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Data inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$data = $_POST[data];
	$texto = $_POST[texto];
	$query = "UPDATE multimidia_datas SET titulo = '$titulo', data = '$data', texto = '$texto', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Data editada com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

//CALENDÁRIO-PHOTOS=============================================================

function mostrarphoto_datas($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM multimidia_datasphotos";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM multimidia_datasphotos ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarphoto_datas' class='button radius sucess marge fi-plus size-60'></a> Adicionar data
			<ul class='button-group radius right'>
				<li><a href='https://www.canalicara.com/portal/portal_admin.php?action=mostrardatas' class='button secondary small fi-calendar size-60' style='padding:10px;'><label>data</label></a></li></ul></DIV>";		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarphoto_datas&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar data?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarphoto_datas&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarphoto_datas&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarphoto_datas&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarphoto_datas&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarphoto_datas()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Adicionar data <?	$sql = "SHOW TABLE STATUS LIKE 'multimidia_datasphotos'";	$res = mysql_query($sql)or die(mysql_error());	$status = mysql_fetch_array($res); echo $status['Auto_increment'];	print_r($status[id]);	?></h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 medium-4 columns"><select name="tema" required="" >
		<option value="">editoria</option>
		<option value="Aniversário">Aniversário</option>
		<option value="Bodas">Bodas</option>
		<option value="Comemoração">Comemoração</option>
		<option value="Formatura">Formatura</option></select></DIV>
	<div class="small-4 medium-2 columns"><input type="text" name="dia" placeholder="dia" required="" /></div>
	<div class="small-4 medium-2 columns"><input type="text" name="mes" placeholder="mês" required="" /></div>
	<div class="small-4 medium-2 columns"><input type="text" name="ano" placeholder="ano" required="" /></div>
	<div class="small-12 medium-2 columns"><select name="repetir" required="" >
		<option value="">repetir</option>
		<option value="SIM">SIM</option>
		<option value="">NÂO</option></select></DIV>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" required="" /></div>
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="imagem" required="" value="http://www.canalicara.com/upload/multimidia_datas/data.jpg"/></div>
	<IFRAME class="small-12 columns" Style='HEIGHT: 58px' border=0 marginWidth=0 marginHeight=0 src="https://www.canalicara.com/portal/upload.php?action=upload&diretorio=upload/multimidia_datas/" frameBorder=no scrolling=no></IFRAME>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
<?php	}	else	{
	$titulo = $_POST[titulo];
	$tema = $_POST[tema];
	$dia = $_POST[dia];
	$mes = $_POST[mes];
	$ano = $_POST[ano];
	$autor = $_POST[autor];
	$imagem = $_POST[imagem];
	$repetir = $_POST[repetir];
	$query = "INSERT INTO multimidia_datasphotos(pdate, titulo, tema, imagem, autor, data, repetir) VALUES(NOW(), '$titulo', '$tema', '$imagem', '$autor', '$ano-$mes-$dia', '$repetir')";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Data adicionada com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarphoto_datas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM multimidia_datasphotos WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Data deletada com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarphoto_datas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, tema, data, repetir, autor, imagem FROM multimidia_datasphotos WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result);
		$rowdata = explode("-", $row->data);	$dia = $rowdata[2];	$mes = $rowdata[1];	$ano = $rowdata[0];	?>
	<div class='small-12 columns'><h3>Adicionar data</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required=""  value="<?php echo $row->titulo; ?>"/></div>
	<div class="small-12 medium-4 columns"><input type="text" name="tema" placeholder="tema" required=""  value="<?php echo $row->tema; ?>"/></div>
	<div class="small-4 medium-2 columns"><input type="text" name="dia" placeholder="dia" required=""  value="<?php echo $dia; ?>"/></div>
	<div class="small-4 medium-2 columns"><input type="text" name="mes" placeholder="mês" required=""  value="<?php echo $mes; ?>"/></div>
	<div class="small-4 medium-2 columns"><input type="text" name="ano" placeholder="ano" required=""  value="<?php echo $ano; ?>"/></div>
	<div class="small-12 medium-2 columns"><input type="text" name="repetir" placeholder="repetir" value="<?php echo $row->repetir; ?>"/></div>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" required=""  value="<?php echo $row->autor; ?>"/></div>
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="imagem" required=""  value="<?php echo $row->imagem; ?>"/></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Photo-data inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$tema = $_POST[tema];
	$dia = $_POST[dia];
	$mes = $_POST[mes];
	$ano = $_POST[ano];
	$repetir = $_POST[repetir];
	$autor = $_POST[autor];
	$imagem = $_POST[imagem];
	$query = "UPDATE multimidia_datasphotos SET titulo = '$titulo', tema = '$tema', data = '$ano-$mes-$dia', repetir = '$repetir', autor = '$autor', imagem = '$imagem', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Data editada com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}


//HUMOR_IMAGENS=============================================================

function mostrarentretenimento_imagens($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM entretenimento_imagens";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM entretenimento_imagens ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarentretenimento_imagens' class='button radius sucess marge fi-plus size-60'></a> Adicionar imagem bizarra</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarentretenimento_imagens&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar imagem bizarra?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarentretenimento_imagens&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarentretenimento_imagens&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarentretenimento_imagens&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarentretenimento_imagens&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarentretenimento_imagens()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Adicionar imagem bizarra</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" required="" /></div>
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="imagem" value="http://www.canalicara.com/upload/entretenimento_imagens/bizarro.jpg"/></div>
	<IFRAME class="small-12 columns" Style='HEIGHT: 58px' border=0 marginWidth=0 marginHeight=0 src="https://www.canalicara.com/portal/upload.php?action=upload&diretorio=upload/entretenimento_imagens/" frameBorder=no scrolling=no></IFRAME>
	<div class="small-12 columns"><textarea name="texto" placeholder="conteúdo" rows="10"></textarea></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{
	$titulo = $_POST[titulo];
	$autor = $_POST[autor];
	$imagem = $_POST[imagem];
	$texto = $_POST[texto];
	$query = "INSERT INTO entretenimento_imagens(titulo, autor, imagem, texto, pdate) VALUES('$titulo', '$autor', '$imagem', '$texto', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Imagem enviada com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarentretenimento_imagens($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM entretenimento_imagens WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Imagem deletada com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarentretenimento_imagens($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, autor, imagem, texto FROM entretenimento_imagens WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar imagem bizarra</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required=""  value="<?php echo $row->titulo; ?>"/></div>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" required=""  value="<?php echo $row->autor; ?>"/></div>
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="imagem"  value="<?php echo $row->imagem; ?>"/></div>
	<div class="small-12 columns"><textarea name="texto" placeholder="conteúdo" rows="10"><? echo $row->texto; ?></textarea></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Imagem bizarra inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$autor = $_POST[autor];
	$imagem = $_POST[imagem];
	$texto = $_POST[texto];
	$query = "UPDATE entretenimento_imagens SET titulo = '$titulo', autor = '$autor', imagem = '$imagem', texto = '$texto', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Imagem bizarra editada com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}


//TECNOLOGIA_WALLPAPERS=============================================================

function mostrartecnologia_wallpapers($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-NOTICIAS--><?	$sql = "SELECT * FROM tecnologia_wallpapers";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM tecnologia_wallpapers ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionartecnologia_wallpapers' class='button radius sucess marge fi-plus size-60'></a> Adicionar wallpaper</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editartecnologia_wallpapers&id={$row['id']}\"><p style='margin-top:10'>$titulo</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar wallpaper?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletartecnologia_wallpapers&id={$row['id']}\">Confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrartecnologia_wallpapers&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrartecnologia_wallpapers&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrartecnologia_wallpapers&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionartecnologia_wallpapers()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Adicionar wallpaper</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" /></div>
	<div class="small-12 columns"><select name="tema"  required="">
		<option>categoria</option>
		<option value="Animais">animais</option>
		<option value="Arte">arte</option>
		<option value="Lugares - Içara">lugares - içara</option>
		<option value="Lugares - Santa Catarina">lugares - sc</option>
		<option value="Lugares - Brasil">lugares - brasil</option>
		<option value="Lugares - Mundo">lugares - mundo</option>
		<option value="Paisagens">paisagens</option>
		<option value="Veículos">veiculos</option>
		<option value="Esportes">esportes</option></select></DIV>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" required="" /></div>
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="imagem" value=".jpg"/></div>
	<IFRAME class="small-12 columns" Style='HEIGHT: 58px' border=0 marginWidth=0 marginHeight=0 src="https://www.canalicara.com/portal/upload.php?action=upload&diretorio=upload/multimidia_wallpapers/" frameBorder=no scrolling=no></IFRAME>
	<div class="small-12 columns"><textarea name="texto" placeholder="conteúdo" rows="10"></textarea></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{
	$titulo = $_POST[titulo];
	$tema = $_POST[tema];
	$autor = $_POST[autor];
	$imagem = $_POST[imagem];
	$texto = $_POST[texto];
	$query = "INSERT INTO tecnologia_wallpapers(titulo, tema, autor, imagem, texto, pdate) VALUES('$titulo', '$tema', '$autor', '$imagem', '$texto', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Wallpaper enviadao com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletartecnologia_wallpapers($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM tecnologia_wallpapers WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Wallpaper deletado com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editartecnologia_wallpapers($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, tema, autor, imagem, texto FROM tecnologia_wallpapers WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar wallpaper</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="titulo" placeholder="título" required="" value="<?php echo $row->titulo; ?>" /></div>
	<div class="small-12 columns"><input type="text" name="tema" placeholder="tema" required="" value="<?php echo $row->tema; ?>" /></div>
	<div class="small-12 columns"><input type="text" name="autor" placeholder="autor" required="" value="<?php echo $row->autor; ?>" /></div>
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="imagem" value="<?php echo $row->imagem; ?>"/></div>
	<div class="small-12 columns"><textarea name="texto" placeholder="conteúdo" rows="10"><? echo $row->texto; ?></textarea></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Wallpaper inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$tema = $_POST[tema];
	$autor = $_POST[autor];
	$imagem = $_POST[imagem];
	$texto = $_POST[texto];
	$query = "UPDATE tecnologia_wallpapers SET titulo = '$titulo', tema = '$tema', autor = '$autor', imagem = '$imagem', texto = '$texto', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Wallpaper editado com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}


//LINKS=============================================================

function mostrarlinks($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-LINKS--><?	$sql = "SELECT * FROM links";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM links ORDER BY pdate DESC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarlinks' class='button radius sucess marge fi-plus size-60'></a> Adicionar link</DIV>";
		echo "<div class='small-12 columns'>";
		while ($row=mysql_fetch_array($result)){   $id = $row['id'];	$cont = $row['cont'];	$link = $row['link'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarlinks&id={$row['id']}\"><p style='margin-top:10'><b>$id</b> [$cont]</b>: $link</a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar link?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarlinks&id={$row['id']}\">confirmar exclusão de <b>$link</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarlinks&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarlinks&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarlinks&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarlinks()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Cadastrar link</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="link" placeholder="link" required="" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{
	$link = $_POST[link];
	$query = "INSERT INTO links(link, pdate) VALUES('$link', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Link $id adicionado com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarlinks($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM links WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Link $id deletado com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarlinks($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT link FROM links WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar link <?php echo $id; ?></h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="link" placeholder="link" required="" value="<?php echo $row->link; ?>" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Link $id inexistente</font>";	}
		}	else	{
	$link = $_POST[link];
	$query = "UPDATE links SET link = '$link', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Link $id editado com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

//GERAR-FEED=============================================================

function gerarfeed()	{	if($_SESSION["nivel"] >= "1")	{
	global $connection;
	$query  = @mysql_query("SELECT *, DATE_FORMAT(pdate, '%W, %d %M %Y %H:%i -0300')  as date FROM noticias WHERE pdate <= NOW() ORDER BY pdate DESC LIMIT 5") or die("ERRO NO SQL");	
	$result = mysql_num_rows($query) or die("Error: " . mysql_error());
	if($result > 0) {
		$arquivo = "noticias.xml";
		$datahora = date('D, d M Y H:i:s');
		$ponteiro = fopen($arquivo, "w");	// ABRE O ARQUIVO(SE NÃO EXISTIR, CRIA)

	 // ESCREVE NO ARQUIVO XML
	 fwrite($ponteiro, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\r\n");
	 fwrite($ponteiro, "<rss version=\"2.0\">\r\n");
	 fwrite($ponteiro, "<channel>\r\n");
	 fwrite($ponteiro, "\r\n");
	 fwrite($ponteiro, "<title>Canal Içara - Curta esta cidade!</title>\r\n");
	 fwrite($ponteiro, "<link>https://www.canalicara.com/</link>\r\n");
	 fwrite($ponteiro, "<description>Notícias, fotos e baladas de Içara</description>\r\n");
	 fwrite($ponteiro, "<language>pt-BR</language>\r\n");
	 fwrite($ponteiro, "<copyright>© Todos os direitos reservados</copyright>\r\n");
	 fwrite($ponteiro, "<lastBuildDate>$datahora</lastBuildDate>\r\n");
 	 fwrite($ponteiro, "\r\n");
	 fwrite($ponteiro, "<image>\r\n");
	 fwrite($ponteiro, "	<title>Canal Içara - O canal da galera</title>\r\n");
 	 fwrite($ponteiro, "	<url>https://www.canalicara.com/img/rss_logo.jpg</url>\r\n");
	 fwrite($ponteiro, "	<link>https://www.canalicara.com/</link>\r\n");
	 fwrite($ponteiro, "	<width>177</width>\r\n");
	 fwrite($ponteiro, "	<height>92</height>\r\n");
	 fwrite($ponteiro, "</image>\r\n");
	 fwrite($ponteiro, "\r\n");

		for($i=0; $i<$result; $i++) {

		// PEGA OS DADOS DO SQL
		$title = mysql_result($query,$i,"titulo");	
		$URL = seoUrl($title);
		$tema = mysql_result($query,$i,"tema");
		$URL_tema = seoUrl($tema);
		$imagem = mysql_result($query,$i,"imagem");
		$texto = nl2br(mysql_result($query,$i,"texto"));
		$text = cortar_texto($texto,"150","...");
		$endereco = mysql_result($query,$i,"id");
		$description = mysql_result($query,$i,"date");

	// MONTA AS TAGS DO XML
	$conteudox  = "			<item>\r\n";
	$conteudox .= "				<title><![CDATA[$title]]></title>\r\n";
	$conteudox .= "				<pubDate>$description</pubDate>\r\n";
	$conteudox .= "				<link>https://www.canalicara.com/$URL_tema/$URL-$endereco.html</link>\r\n";
	$conteudox .= "				<guid>https://www.canalicara.com/$URL_tema/$URL-$endereco.html</guid>\r\n";
	$conteudox .= "				<description><![CDATA[<img src='$imagem'/><br>$texto<br><script async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>
<ins class='adsbygoogle'
     style='display:block'
     data-ad-client='ca-pub-9064367175467284'
     data-ad-slot='2078819047'
     data-ad-format='auto'></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>]]></description>\r\n";
	$conteudox .= "			</item>\r\n";
	$conteudox .= "\r\n";

	fwrite($ponteiro, $conteudox);			//ESCREVE NO ARQUIVO
	  }
	fwrite($ponteiro, "</channel>");		//FECHA A TAG CHANNEL
	fwrite($ponteiro, "</rss>\r\n");		// FECHA A TAG RSS
	fclose($ponteiro);				//FECHA O ARQUIVO
	echo "".$arquivo." gerado com sucesso!<br>";	//MENSAGEM
   }//FECHA IF($result)

	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}


//FACEBOOK=============================================================

function ferramentas_facebook()	{	if($_SESSION["nivel"] >= "1")	{
	global $connection;	{	?>

	<DIV class='small-12 columns'>
		<ul class="small-block-grid-3 medium-block-grid-6"><?php	$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') date FROM noticias WHERE pdate <= NOW() AND pdate between now() - INTERVAL 7 DAY and now() ORDER BY cont DESC LIMIT 6";		$result = mysql_query($query) or die("Error: " . mysql_error());	while ($row = mysql_fetch_assoc($result))		{		$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$data = $row['date'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$cont = $row['cont'];	echo "<li><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\"><img src='https://www.canalicara.com/imgtemp/?largura=150&altura=110&arquivo=$img' title='{$row['titulo']}' onmouseover='this.style.opacity=1;this.filters.alpha.opacity=100' onmouseout='this.style.opacity=0.8;this.filters.alpha.opacity=50' style='opacity: 0.8; margin-bottom:10px;'><FONT color=#c0c0c0 STYLE='Font-size:10pt;'>$data <br>$cont acessos<br></FONT><FONT STYLE='Font-size:10pt;'>$titulo</FONT></a></li>\n";	}	?></ul></DIV>

	<div class='small-12 medium-6 columns' align=left>
		<?	$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') date FROM noticias  WHERE pdate <= NOW() ORDER BY pdate DESC LIMIT 10"; 	$result = mysql_query($query) or die("Error: " . mysql_error());	while ($row = mysql_fetch_array($result)){    $titulo = $row['titulo'];	$URL = seoUrl($titulo);	$data = $row['date'];	$texto = $row['texto'];	$text = cortar_texto($texto,"305","...");	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$hotsite = $row['hotsite'];	$imagem = $row['imagem'];
		echo	"<div align=left><div class=\"fb-like\" data-href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" data-layout=\"button_count\" data-action=\"like\" data-size=\"small\" data-show-faces=\"false\" data-share=\"true\"></div>
			<a class=links href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" target=_blank><FONT STYLE=\"Font-color:#FF3300; Font-size:11pt;\">$data-  $titulo</FONT></div><br>\n";		}	?></DIV>

	<div class='small-12 medium-6 columns' align=left>
		<?	$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y (%H:%i)') date FROM noticias  WHERE pdate >= NOW() ORDER BY pdate ASC"; 	$result = mysql_query($query) or die("Error: " . mysql_error());	while ($row = mysql_fetch_array($result)){    $titulo = $row['titulo'];	$URL = seoUrl($titulo);	$data = $row['date'];	$texto = $row['texto'];	$text = cortar_texto($texto,"305","...");	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$hotsite = $row['hotsite'];	$imagem = $row['imagem'];
		echo	"<div align=left><div align=left><div class=\"fb-like\" data-href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" data-layout=\"button_count\" data-action=\"like\" data-size=\"small\" data-show-faces=\"false\" data-share=\"true\"></div>
			<a class=links href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" target=_blank><FONT STYLE=\"Font-color:#FF3300; Font-size:11pt;\">$data -  $titulo</FONT></div><br>\n";		}	?></DIV><?	}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}



//ENQUETE=============================================================

function enquete()	{	if($_SESSION["nivel"] >= "50")	{
	global $connection;	{	?><style type="text/css">
label{display:block;}
input{width:300px; margin:10px 0;}
.btn{width:100px;}
.ok{padding:10px; border:1px solid #0F0; background:#EAFFD5; font:16px Tahoma, Geneva, sans-serif;}
.no{padding:10px; border:1px solid #F00; background:#FDD; font:16px Tahoma, Geneva, sans-serif;}
</style>

<script type="text/javascript">
 function AddCampo(id){
 el = document.getElementById(id);
 el.innerHTML += '<label><span>Resposta:</span><input type="text" name="resposta[]" /></label>';
 }
</script>



<?php if(isset($_POST['cadastra_pergunta']) && $_POST['cadastra_pergunta'] == 'ok'){

 $pergunta = $_POST['pergunta'];

 if(empty($pergunta)){
 $retorno = '<div>Você precissa digitar a pergunta!</div>';
 }if(empty($retorno)){

 $data = date('Y-m-d H:i:s');

 $cadastrar_pergunta = mysql_query("INSERT INTO enquetes_questions (ques, created_on) VALUES ('$pergunta', '$data')")
 or die(mysql_error());

 if($cadastrar_pergunta == '1'){
 echo "<div class=\"ok\">A pergunta <strong>$pergunta</strong>, foi cadastrada com sucesco!</div>";
 }else{
 echo "<div class=\"no\">Erro ao cadastrar a pergunta, tente novamente!</div>";
 }

 }
}
?>

<?php if(isset($_POST['cadastra_resposta']) && $_POST['cadastra_resposta'] == 'ok'){

 $id_resposta = $_POST['id_resposta'];
 $resposta = $_POST['resposta'];

 if($id_resposta == '-1'){
 $retorno = "<div class=\"no\">Selecione uma das enquetes</div>";
 }else{

 $contar = count($resposta);
 for($i = 0; $i < $contar; $i++){

 if(empty($resposta[$i])){
 $retorno = "<div class=\"no\">Existe uma resposta em branco, <strong>a mesma não foi cadastrada!</strong></div>";
 }if(empty($retorno)){

 $cadastrar_resposta = mysql_query("INSERT INTO enquetes_options (ques_id, value) VALUES ('$id_resposta', '$resposta[$i]')")
 or die(mysql_error());

 if($cadastrar_resposta == '1'){
 echo "<div class=\"ok\">A resposta <strong>$resposta[$i]</strong>, foi cadastrada com sucesco!</div>";
 }else{
 echo "<div class=\"no\">Erro ao cadastrar a resposta, tente novamente!</div>";
 }
 }
 }
 }
}
?>

<?php if(isset($_POST['excluir_enquete']) && $_POST['excluir_enquete'] == 'ok'){

 $enquete = $_POST['id_enquete'];

 $pega_option = mysql_query("SELECT id FROM enquetes_options WHERE ques_id = '$enquete'")
 or die(mysql_error());

 while($option=mysql_fetch_array($pega_option)){

 $id_option = $option[0];

 $deleta = mysql_query("DELETE FROM enquetes_votes WHERE option_id = '$id_option'")
 or die(mysql_error());
 $deleta .= mysql_query("DELETE FROM enquetes_options WHERE ques_id = '$enquete'")
 or die(mysql_error());
 }

 $del_enquete = mysql_query("DELETE FROM enquetes_questions WHERE id = '$enquete'")
 or die(mysql_error());

 if($del_enquete >= '1'){
 echo "<div class=\"ok\">Enquete totalmente excluida do sistema</div>";
 }else{
 echo "<div class=\"no\">Erro ao excluir enquete!</div>";
 }

}
?>

<?php
if(isset($retorno)){
 echo $retorno;
}
?>
<h2>Cadastrar Pergunta</h2>

 <form method="post" action="" name="pergunta" enctype="multipart/form-data">
 <label>
 <span>Cadastre sua pergunta!</span>
 <input type="text" name="pergunta" />
 </label>
 <input type="hidden" name="cadastra_pergunta" value="ok" />
 <input type="submit" name="Cadastrar" value="Cadastrar" />
 </form>

<h2>Cadastrar Respostas</h2>

 <form method="post" action="" name="resposta" enctype="multipart/form-data">
 <select name="id_resposta" id="id_resposta">
 <option value="-1">Selecione uma das perguntas</option>
<?php

$pegar_pergunta = mysql_query("SELECT id, ques FROM enquetes_questions")
 or die(mysql_error());

while($res_pergunta=mysql_fetch_array($pegar_pergunta)){

 $id_pergunta = $res_pergunta[0];
 $pergunta = $res_pergunta[1];

?>
 <option value="<?php echo $id_pergunta;?>"><?php echo $pergunta; ?></option>

<?php
}
?>
 </select>
 <label>
 <span>Resposta:</span>
 <input type="text" name="resposta[]" />
 </label>
 <div id="resposta"></div>
 <a href="#addstat" onclick="AddCampo('resposta')">Adicionar Novo Campo</a>

 <input type="hidden" name="cadastra_resposta" value="ok" />
 <input type="submit" name="Cadastrar" value="Cadastrar" />
 </form>

<h2>Excluir Enquete</h2>

 <form method="post" enctype="multipart/form-data" name="exclur" action="">
 <select name="id_enquete" id="id_enquete">
 <option value="-1">Selecione uma das perguntas</option>
<?php

$pegar_pergunta = mysql_query("SELECT id, ques FROM enquetes_questions")
 or die(mysql_error());

while($res_pergunta=mysql_fetch_array($pegar_pergunta)){

 $id_pergunta = $res_pergunta[0];
 $pergunta = $res_pergunta[1];

?>
 <option value="<?php echo $id_pergunta;?>"><?php echo $pergunta; ?></option>

<?php
}
?>
 </select>

 <input type="hidden" name="excluir_enquete" value="ok" />
 <input type="submit" name="Exluir" value="Excluir" />

 </form><?	}	}	}



//BANNERS=============================================================

function mostrarbanners($pagina)	{	if($_SESSION["nivel"] >= "50")	{
	$pagina = "$pagina";	?>
		<!--LISTAR-BANNERS--><?	$sql = "SELECT * FROM banners";	$result = mysql_query($sql) or die("Error: " . mysql_error());	$lpp = 50;	$total = mysql_num_rows($result);	$paginas = ceil($total / $lpp);	if(!isset($pagina)) { $pagina = 0;}	$inicio = $pagina * $lpp;	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y')  as date FROM banners ORDER BY formato ASC LIMIT $inicio, $lpp";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		// ==EXIBIÇÃO==
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarbanners' class='button radius sucess marge fi-plus size-60'></a> Adicionar banner $id";
		while ($row=mysql_fetch_array($result)){   $titulo = $row['titulo'];	$tema = $row['tema'];	echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarbanners&id={$row['id']}\"><p style='margin-top:10'>{$row['formato']}: <b>{$row['imagem']}</b></a></p></Div>
			<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar banner?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarbanners&id={$row['id']}\">confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		// ==PAGINAÇÃO==
		echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";	if($pagina > 0) {	$menos = $pagina - 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarbanners&pagina=$menos";	echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";	}	$atual = ($pagina + 1);	for($i=0;$i<$paginas;$i++) {	$pg = $i+1;	if ($pg == $atual)	{	$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";	}	else	{    $pg = $pg;	}	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarbanners&pagina=$i";	echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";	}	if($pagina < $paginas-1) {	$mais = $pagina + 1;	$url = "https://www.canalicara.com/portal/portal_admin.php?action=mostrarnbanners&pagina=$mais";	echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";	}	echo "</FONT></center></div><br><br>\n"; ?>
		<?	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarbanners()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Adicionar banner <?	$sql = "SHOW TABLE STATUS LIKE 'banners'";	$res = mysql_query($sql)or die(mysql_error());	$status = mysql_fetch_array($res); echo $status['Auto_increment'];	print_r($status[id]);	?></h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="foto" required="" value=".jpg"/></div>
	<IFRAME class="small-12 columns" Style='HEIGHT: 58px' border=0 marginWidth=0 marginHeight=0 src="https://www.canalicara.com/portal/upload.php?action=upload&diretorio=upload/banners/" frameBorder=no scrolling=no></IFRAME>
	<div class="small-12 columns"><select name="formato" required="" >
		<option value="">formato</option>
		<option value="cabecalho-principal">#001: cabeçalho principal</option>
		<option value="cabecalho">#002: cabeçalho</option>
		<option value="lateral-1">#003: lateral 1</option>
		<option value="lateral-2">#003: lateral 2</option>
		<option value="lateral-meio-1">#004: lateral (meio 1)</option>
		<option value="lateral-meio-2">#004: lateral (meio 2)</option>
		<option value="conteudo-grande">#005: conteúdo</option>
		<option value="conteudo-grande-capa">#006: conteúdo (capa)</option>
		<option value="pequeno-1">#007: pequeno 1</option>
		<option value="pequeno-2">#007: pequeno 2</option>
		<option value="pequeno-3">#007: pequeno 3</option>
		<option value="pequeno-4">#007: pequeno 4</option><select></DIV>
	<div class="small-12 medium-10 columns"><select name="link_urlid" required="" >
		<option value="">link [URL]</option>
		<?php	$sql = "SELECT * FROM links ORDER BY id DESC";	$result = mysql_query($sql) or die("Error: " . mysql_error());	while ($row=mysql_fetch_array($result)){   $id = $row['id'];  $link = $row['link'];
			echo "<option value=\"$id\">$id: $link</option>";	}	?></select></DIV>
	<div class="small-12 medium-2 columns"><select name="link">
		<option value="n">SIM</option>
		<option value="r">NÃO</option></select></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>

<?php	}	else		{
	$imagem = $_POST[imagem];
	$formato = $_POST[formato];
	$link_urlid = $_POST[link_urlid];
	$link = $_POST[link];
	$query = "INSERT INTO banners(imagem, formato, link_urlid, link, pdate) VALUES('$imagem', '$formato', '$link_urlid', '$link', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Banner $id enviado com sucesso!</font>";		}	
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarbanners($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM banners WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Banner deletado com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarbanners($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT imagem, formato, link_urlid, link, pdate FROM banners WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result);
		$rowpdate = explode(" ", $row->pdate);	$data = $rowpdate[0];	$hora = $rowpdate[1];
		$rowagenda = explode("-", $row->agenda);	$dia = $rowagenda[2];	$mes = $rowagenda[1];	$ano = $rowagenda[0];	?>
	<div class='small-12 columns'><h3>Editar banner <? echo $id ?></h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 columns"><input type="text" name="imagem" placeholder="foto" required="" value="<?php echo $row->imagem; ?>"/></div>
	<IFRAME class="small-12 columns" Style='HEIGHT: 58px' border=0 marginWidth=0 marginHeight=0 src="https://www.canalicara.com/portal/upload.php?action=upload&diretorio=upload/banners/" frameBorder=no scrolling=no></IFRAME>
	<div class="small-12 columns"><select name="formato" required="" >
		<option value="<?php echo $row->formato; ?>"><?php echo $row->formato; ?></option>
		<option value="cabecalho-principal">#001: cabeçalho principal</option>
		<option value="cabecalho">#002: cabeçalho</option>
		<option value="lateral-1">#003: lateral 1</option>
		<option value="lateral-2">#003: lateral 2</option>
		<option value="lateral-meio-1">#004: lateral (meio 1)</option>
		<option value="lateral-meio-2">#004: lateral (meio 2)</option>
		<option value="conteudo-grande">#005: conteúdo</option>
		<option value="conteudo-grande-capa">#006: conteúdo (capa)</option>
		<option value="pequeno-1">#007: pequeno 1</option>
		<option value="pequeno-2">#007: pequeno 2</option>
		<option value="pequeno-3">#007: pequeno 3</option>
		<option value="pequeno-4">#007: pequeno 4</option><select></DIV>
	<div class="small-12 medium-10 columns"><select name="link_urlid" required="" >
		<option value="<?php echo $row->link_urlid; ?>"><?php echo $row->link_urlid; ?></option>
		<?php	$sql = "SELECT * FROM links ORDER BY id DESC";	$result = mysql_query($sql) or die("Error: " . mysql_error());	while ($row=mysql_fetch_array($result)){   $id = $row['id'];  $link = $row['link'];
			echo "<option value=\"$id\">$id: $link</option>";	}	?></select></DIV>
	<div class="small-12 medium-2 columns"><select name="link">
		<option value="n">SIM</option>
		<option value="r">NÃO</option></select></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Banner inexistente</font>";	}
		}	else	{
	$imagem = $_POST[imagem];
	$formato = $_POST[formato];
	$link_urlid = $_POST[link_urlid];
	$link = $_POST[link];
	$query = "UPDATE banners SET imagem = '$imagem', formato = '$formato', link_urlid = '$link_urlid', link = '$link', pdate = '$pdate' WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Banner editado com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}




//MEU-USUARIO=============================================================

function usuario()	{
	global $connection;
	$submitPass = $_POST[submitPass];
	$nome = $_POST[nome];
	$senha = $_POST[senha];
	$novonome = $_POST[novonome];
	$novasenha1 = $_POST[novasenha1];
	$novasenha2 = $_POST[novasenha2];
	$login = $_SESSION["login"];
	$id = $_SESSION["id_usuario"];
	$nome_usuario = $_SESSION["nome_usuario"];
	if(!$submitPass)		{	?>

	<div class='small-12 columns'><h3>Editar usuário <?php echo $login; ?></h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 medium-6 columns"><input type="text" name="novonome" placeholder="nome" required="" value="<?php echo $nome_usuario; ?>" /></div>
	<div class="small-12 medium-6 columns"><input type="password" name="senha" placeholder="senha atual" required="" /></div>
	<div class="small-12 medium-6 columns"><input type="password" name="novasenha1" placeholder="nova senha" required="" /></div>
	<div class="small-12 medium-6 columns"><input type="password" name="novasenha2" placeholder="nova senha" required="" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submitPass" value="ENVIAR" /></div></form>
<?php	}	else	{	$query = "SELECT id, senha from admin_usuarios WHERE senha = md5('$senha') AND id='$id'";
		$result = mysql_query($query, $connection) or die ("Error in query: $query. " . mysql_error());
		if (mysql_num_rows($result) == 1)		{
			if($novasenha1==$novasenha2)		{
				$update_query = "UPDATE admin_usuarios SET nome = '$novonome', senha = md5('$novasenha1') WHERE id = '$id'";
				$update_result = mysql_query($update_query, $connection) or die ("Error in query: $query. " . mysql_error());
				echo "<font face=\"verdana\" size=\"2\">Editado com sucesso</font>";	}
				else	{	echo "<font face=\"verdana\" size=\"2\">Sua nova senha não é igual a confirmação!</font>";	}	}
				else	{	echo "<font face=\"verdana\" size=\"2\">Username e/ou senha incorretos!</font>";	}	}	}



//ADMIN-USUARIOS=============================================================

function mostrarusuarios($pagina)	{	if($_SESSION["nivel"] >= "100")	{
		echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal/portal_admin.php?action=adicionarusuarios' class='button radius sucess marge fi-plus size-60'></a> Adicionar usuarios</DIV>";
		echo "<div class='small-12 columns'>";
		$sql = "SELECT * FROM admin_usuarios WHERE ativo='S'";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		while ($row=mysql_fetch_array($result)){   $id = $row['id'];	$nome = $row['nome'];	$login = $row['login'];	$nivel = $row['nivel'];
			echo "<div class='panel clearfix' style='padding:0; padding-left:5;'>
				<div class='small-10 columns'>
					<div class='small-3 medium-1 columns'><p style='margin-top:10'>$id</p></DIV>
					<div class='small-9 medium-4 columns'><a href=\"{$_SERVER['PHP_SELF']}?action=editarusuarios&id={$row['id']}\"><p style='margin-top:10'>$nome</a></p></DIV>
					<div class='small-9 medium-4 columns'><p style='margin-top:10'>$login</p></DIV>
					<div class='small-3 medium-3 columns'><p style='margin-top:10'>nivel $nivel</p></DIV></DIV>
				<div class='small-2 columns'><p style='margin-top:10'><a class='small button secondary fi-x size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  ></a></p></DIV></DIV>
					<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Desativar usuário?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=desativarusuarios&id={$row['id']}\">confirmar desativação de <b>\"$nome\"</b> ($login)</a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}

		echo "</DIV><div class='small-12 columns'><h3>Usuarios inativos</DIV>";
		echo "<div class='small-12 columns'>";
		$sql = "SELECT * FROM admin_usuarios WHERE ativo='N'";	$result = mysql_query($sql) or die("Error: " . mysql_error());
		while ($row=mysql_fetch_array($result)){   $id = $row['id'];	$nome = $row['nome'];	$login = $row['login'];	$nivel = $row['nivel'];
			echo "<div class='panel clearfix' style='padding:0; padding-left:5;'>
				<div class='small-10 columns'>
					<div class='small-3 medium-1 columns'><p style='margin-top:10'>$id</p></DIV>
					<div class='small-9 medium-4 columns'><a href=\"{$_SERVER['PHP_SELF']}?action=editarusuarios&id={$row['id']}\"><p style='margin-top:10'>$nome</a></p></DIV>
					<div class='small-9 medium-4 columns'><p style='margin-top:10'>$login</p></DIV>
					<div class='small-3 medium-3 columns'><p style='margin-top:10'>nivel $nivel</p></DIV></DIV>
				<div class='small-2 columns'><p style='margin-top:10'><a class='small button secondary fi-check size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  ></a></p></DIV></DIV>
					<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Reativar usuário?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=reativarusuarios&id={$row['id']}\">confirmar reativação de <b>\"$nome\"</b> ($login)</a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";	}
		echo "</div>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarusuarios()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
	<div class='small-12 columns'><h3>Adicionar usuário</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="small-12 medium-5 columns"><input type="text" name="nome" placeholder="nome" required="" /></div>
	<div class="small-12 medium-5 columns"><input type="text" name="login" placeholder="login" required="" /></div>
	<div class="small-12 medium-2 columns"><input type="text" name="nivel" placeholder="nivel" required="" /></div>
	<div class="small-12 columns"><input type="text" name="senha" placeholder="senha" required="" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
<?php	}	else		{
	$nome = $_POST[nome];
	$login = $_POST[login];
	$nivel = $_POST[nivel];
	$senha = md5($_POST[senha]);
	$query = "INSERT INTO admin_usuarios(nome, login, nivel, senha) VALUES('$nome', '$login', '$nivel', '$senha')";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Usuário adicionado com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function reativarusuarios($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "UPDATE admin_usuarios SET ativo = 'S' WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Usuário $id reativado com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function desativarusuarios($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "UPDATE admin_usuarios SET ativo = 'N' WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Usuário $id desativado com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarusuarios($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT * FROM admin_usuarios WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
	<div class='small-12 columns'><h3>Editar usuário</h3></DIV><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="small-12 medium-5 columns"><input type="text" name="nome" placeholder="nome" required="" value="<?php echo $row->nome; ?>" /></div>
	<div class="small-12 medium-5 columns"><input type="text" name="login" placeholder="login" required="" value="<?php echo $row->login; ?>" /></div>
	<div class="small-12 medium-2 columns"><input type="text" name="nivel" placeholder="nivel" required="" value="<?php echo $row->nivel; ?>" /></div>
	<div class="small-12 columns"><input type="text" name="senha" placeholder="senha" required="" value="<?php echo $row->senha; ?>" /></div>
	<div class="small-12 columns"><input class="button expand" type="submit" name="submit" value="ENVIAR" /></div></form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Usuário inexistente</font>";	}
		}	else	{
	$nome = $_POST[nome];
	$login = $_POST[login];
	$nivel = $_POST[nivel];
	$senha = md5($_POST[senha]);
	$query = "UPDATE admin_usuarios SET nome = '$nome', login = '$login', nivel = '$nivel', senha = '$senha' WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Usuário editado com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}




//DESUSO-HUMOR-PIADAS===============================================================

function mostrarentretenimento_piadas()	{	if($_SESSION["nivel"] >= "50")	{
	global $connection;
	$query = "SELECT * FROM entretenimento_piadas ORDER BY tema";
	$result = mysql_query($query) or die("Error: " . mysql_error());
	while ($row = mysql_fetch_assoc($result))		{
	$tema = $row['tema'];
	$titulo = $row['titulo'];
echo "<font face=\"verdana\" size=\"2\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarentretenimento_piadas&id={$row['id']}\"><IMG hspace=0 src=\"imgs/portal_del.gif\" align=baseline border=0></a> | <a href=\"{$_SERVER['PHP_SELF']}?action=editarentretenimento_piadas&id={$row['id']}\"><IMG hspace=0 src=\"imgs/portal_edit.gif\" align=baseline border=0></a> :: <b>$tema</b> : <a href=\"http://www.hiperteen.com/piadas.php?categ=view&id={$row['id']}\" target=\"_blank\"><u><font color=\"#000000\">$titulo</font></u></a></font><br><IMG alt=\"\" hspace=0 src=\"imgs/portal_separador.jpg\" align=baseline border=0><br>\n";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function adicionarentretenimento_piadas()	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{	?>
<font face="verdana" size="2"><b>Adicionar piada</b></font><br><br>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<font face="verdana" size="1"><b>título: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; tema:</b></font><br>
<input size="36" type="text" name="titulo" class="texto" style="WIDTH: 233px; HEIGHT: 22px">&nbsp;&nbsp;&nbsp;
<select size="1" name="tema" style="font-family: Tahoma; font-size: 8 pt; list-style-type: disc; border: 1 solid #808080; WIDTH: 163px;">
          <option selected>Categorias</option>
          <option value="Amizade">amizade</option>
          <option value="Animais">animais</option>
          <option value="Bêbados">bêbados</option>
          <option value="Bichas">bichas</option>
          <option value="Caipiras">caipiras</option>
          <option value="Casais">casais</option>
          <option value="Diversos">diversos</option>
          <option value="Esportes">esportes</option>
          <option value="Estudos">estudos</option>
          <option value="Família">família</option>
          <option value="Gaúcho">gaúcho</option>
          <option value="Humor Negro">humor negro</option>
          <option value="Informática">informática</option>
          <option value="Joãozinho">joãozinho</option>
          <option value="Loiras">loiras</option>
          <option value="Loucos">loucos</option>
          <option value="Machistas">machistas</option>
          <option value="Mendigos">mendigos</option>
          <option value="Pescaria">pescaria</option>
          <option value="Políticos">políticos</option>
          <option value="Português">português</option>
          <option value="Religião">religião</option>
          <option value="Sexo">sexo</option>
          <option value="Sogra">sogra</option>
          <option value="Trânsito">trânsito</option>
          <option value="Trabalho">trabalho</option>
          <option value="Velhinhos">velhinhos</option></select><br>
<font face="verdana" size="1"><b>autor:</b></font><br><input size="36" type="text" name="autor" value="anonymous" class="texto" style="WIDTH: 411px; HEIGHT: 22px"><br>
<font face="verdana" size="1"><b>texto:</b></font><br><textarea rows="5" cols="35" name="texto" class="texto" style="WIDTH: 411px; HEIGHT: 188px"></textarea><br><br>
<input type="submit" name="submit" value="Enviar" class="botao"><input type="reset" name="reset" value="Limpar" class="botao"></form>
<?php	}	else	{
	$titulo = $_POST[titulo];
	$tema = $_POST[tema];
	$autor = $_POST[autor];
	$texto = $_POST[texto];
	$query = "INSERT INTO entretenimento_piadas(titulo, tema, autor, texto, pdate) VALUES('$titulo', '$tema', '$autor', '$texto', NOW())";
	$result = mysql_query($query) or die("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Piada enviada com sucesso!</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function deletarentretenimento_piadas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;
	$query = "DELETE FROM entretenimento_piadas WHERE id= '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Piada deletada com sucesso</font>";
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}

function editarentretenimento_piadas($id)	{	if($_SESSION["nivel"] >= "100")	{
	global $connection;	$submit = $_POST[submit];	if(!$submit)		{
		$query = "SELECT titulo, tema, autor, texto FROM entretenimento_piadas WHERE id='$id'";
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		if(mysql_num_rows($result) >0)			{
		$row = mysql_fetch_object($result); ?>
<font face="verdana" size="2"><b>Editando piada</b></font><br><br>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
<font face="verdana" size="1"><b>título: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; tema:</b></font><br>
<input size="36" type="text" name="titulo" value="<?php echo $row->titulo; ?>" class="texto" style="WIDTH: 233px; HEIGHT: 22px">&nbsp;&nbsp;&nbsp;
<input size="36" type="text" name="tema" value="<?php echo $row->tema; ?>" class="texto" style="WIDTH: 163px; HEIGHT: 22px"><br>
<font face="verdana" size="1"><b>autor por:</b></font><br><input size="36" type="text" name="autor" value="<?php echo $row->autor; ?>" class="texto" style="WIDTH: 411px; HEIGHT: 22px"><br>
<font face="verdana" size="1"><b>texto:</b></font><br><textarea name="texto" rows="5" cols="35" class="texto" style="WIDTH: 411px; HEIGHT: 188px"><? echo $row->texto; ?></textarea><br><br>
<input type="submit" name="submit" value="Enviar" class="botao"><input type="reset" name="reset" value="Limpar" class="botao">
</form>
	<?php	}	else	{	echo "<font face=\"verdana\" size=\"2\">Piada inexistente</font>";	}
		}	else	{
	$titulo = $_POST[titulo];
	$tema = $_POST[tema];
	$autor = $_POST[autor];
	$texto = $_POST[texto];
	$query = "UPDATE entretenimento_piadas SET titulo = '$titulo', tema = '$tema', autor = '$autor', texto = '$texto', pdate = pdate WHERE id = '$id'";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo "<font face=\"verdana\" size=\"2\">Piada editada com sucesso</font>";		}
	}	else	{	echo "Ops... você não tem acesso para isso!";	}	}


switch($_GET['action'])
	{

	case 'ferramentas_facebook':	ferramentas_facebook();	break;

	case 'adicionareconomia_classificados':	adicionareconomia_classificados();	break;
	case 'editareconomia_classificados':	editareconomia_classificados($_GET['id']);	break;
	case 'deletareconomia_classificados':	deletareconomia_classificados($_GET['id']);	break;
	case 'mostrareconomia_classificados':	mostrareconomia_classificados();	break;

	case 'adicionarphoto_datas':	adicionarphoto_datas();	break;
	case 'editarphoto_datas':	editarphoto_datas($_GET['id']);	break;
	case 'deletarphoto_datas':	deletarphoto_datas($_GET['id']);	break;
	case 'mostrarphoto_datas':	mostrarphoto_datas($_GET['pagina']);	break;

	case 'adicionardatas':	adicionardatas();	break;
	case 'editardatas':	editardatas($_GET['id']);	break;
	case 'deletardatas':	deletardatas($_GET['id']);	break;
	case 'mostrardatas':	mostrardatas($_GET['pagina']);	break;

	case 'adicionarentretenimento_jogos':	adicionarentretenimento_jogos();	break;
	case 'editarentretenimento_jogos':	editarentretenimento_jogos($_GET['id']);	break;
	case 'deletarentretenimento_jogos':	deletarentretenimento_jogos($_GET['id']);	break;
	case 'mostrarentretenimento_jogos':	mostrarentretenimento_jogos();	break;

	case 'enquete':	enquete();	break;

	case 'adicionarfrase':	adicionarfrase();	break;
	case 'editarfrase':	editarfrase($_GET['id']);	break;
	case 'deletarfrase':	deletarfrase($_GET['id']);	break;
	case 'mostrarfrase':	mostrarfrase($_GET['pagina']);	break;

	case 'adicionarnews':	adicionarnews();	break;
	case 'editarnews':	editarnews($_GET['id']);	break;
	case 'deletarnews':	deletarnews($_GET['id']);	break;
	case 'mostrarnews':	mostrarnews($_GET['pagina']);	break;

	case 'adicionarnoticias_especiais':	adicionarnoticias_especiais();	break;
	case 'editarnoticias_especiais':	editarnoticias_especiais($_GET['id']);	break;
	case 'deletarnoticias_especiais':	deletarnoticias_especiais($_GET['id']);	break;
	case 'mostrarnoticias_especiais':	mostrarnoticias_especiais($_GET['pagina']);	break;

	case 'adicionarnoticias_temas':	adicionarnoticias_temas();	break;
	case 'editarnoticias_temas':	editarnoticias_temas($_GET['id']);	break;
	case 'deletarnoticias_temas':	deletarnoticias_temas($_GET['id']);	break;
	case 'mostrarnoticias_temas':	mostrarnoticias_temas($_GET['pagina']);	break;

	case 'adicionarnoticias_abrangencia':	adicionarnoticias_abrangencia();	break;
	case 'editarnoticias_abrangencia':	editarnoticias_abrangencia($_GET['id']);	break;
	case 'deletarnoticias_abrangencia':	deletarnoticias_abrangencia($_GET['id']);	break;
	case 'mostrarnoticias_abrangencia':	mostrarnoticias_abrangencia($_GET['pagina']);	break;

	case 'adicionarnoticias_agencia':	adicionarnoticias_agencia();	break;
	case 'editarnoticias_agencia':	editarnoticias_agencia($_GET['id']);	break;
	case 'deletarnoticias_agencia':	deletarnoticias_agencia($_GET['id']);	break;
	case 'mostrarnoticias_agencia':	mostrarnoticias_agencia($_GET['pagina']);	break;

	case 'adicionarnoticias_blogs':	adicionarnoticias_blogs();	break;
	case 'editarnoticias_blogs':	editarnoticias_blogs($_GET['id']);	break;
	case 'deletarnoticias_blogs':	deletarnoticias_blogs($_GET['id']);	break;
	case 'mostrarnoticias_blogs':	mostrarnoticias_blogs($_GET['pagina']);	break;

	case 'adicionarpaginas':	adicionarpaginas();	break;
	case 'editarpaginas':	editarpaginas($_GET['id']);	break;
	case 'deletarpaginas':	deletarpaginas($_GET['id']);	break;
	case 'mostrarpaginas':	mostrarpaginas($_GET['pagina']);	break;

	case 'adicionarvideos':	adicionarvideos();	break;
	case 'editarvideos':	editarvideos($_GET['id']);	break;
	case 'deletarvideos':	deletarvideos($_GET['id']);	break;
	case 'mostrarvideos':	mostrarvideos();	break;

	case 'adicionarnoticias_galerias':	adicionarnoticias_galerias();	break;
	case 'editarnoticias_galerias':		editarnoticias_galerias($_GET['id']);	break;
	case 'deletarnoticias_galerias':	deletarnoticias_galerias($_GET['id']);	break;
	case 'mostrarnoticias_galerias':	mostrarnoticias_galerias($_GET['pagina']);	break;

	case 'adicionartecnologia_wallpapers':	adicionartecnologia_wallpapers();	break;
	case 'editartecnologia_wallpapers':	editartecnologia_wallpapers($_GET['id']);	break;
	case 'deletartecnologia_wallpapers':	deletartecnologia_wallpapers($_GET['id']);	break;
	case 'mostrartecnologia_wallpapers':	mostrartecnologia_wallpapers($_GET['pagina']);	break;

	case 'adicionarlinks':	adicionarlinks();	break;
	case 'editarlinks':		editarlinks($_GET['id']);	break;
	case 'deletarlinks':	deletarlinks($_GET['id']);	break;
	case 'mostrarlinks':	mostrarlinks($_GET['pagina']);	break;

	case 'adicionarentretenimento_piadas':	adicionarentretenimento_piadas();	break;
	case 'editarentretenimento_piadas':	editarentretenimento_piadas($_GET['id']);	break;
	case 'deletarentretenimento_piadas':	deletarentretenimento_piadas($_GET['id']);	break;
	case 'mostrarentretenimento_piadas':	mostrarentretenimento_piadas($_GET['pagina']);	break;

	case 'adicionarentretenimento_imagens':	adicionarentretenimento_imagens();	break;
	case 'editarentretenimento_imagens':	editarentretenimento_imagens($_GET['id']);	break;
	case 'deletarentretenimento_imagens':	deletarentretenimento_imagens($_GET['id']);	break;
	case 'mostrarentretenimento_imagens':	mostrarentretenimento_imagens($_GET['pagina']);	break;

	case 'adicionarbanners':	adicionarbanners();	break;
	case 'editarbanners':		editarbanners($_GET['id']);	break;
	case 'deletarbanners':		deletarbanners($_GET['id']);	break;
	case 'mostrarbanners':		mostrarbanners($_GET['pagina']);	break;

	case 'gerarfeed':	gerarfeed();	break;
	case 'usuario':	usuario();	break;
	case 'senha':	senha();	break;

	case 'adicionarusuarios':	adicionarusuarios();	break;
	case 'editarusuarios':		editarusuarios($_GET['id']);	break;
	case 'reativarusuarios':	reativarusuarios($_GET['id']);	break;
	case 'desativarusuarios':	desativarusuarios($_GET['id']);	break;
	case 'mostrarusuarios':		mostrarusuarios($_GET['pagina']);	break;

	default:
	index();
	}
?>