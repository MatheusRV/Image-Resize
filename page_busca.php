<?php
	require('config.php');

	$lpp = 50; //itens por pagina
	$wImg = '75'; //largura imagem
	$hImg = '75';	//altura imagem
	$file = basename($_SERVER['PHP_SELF']);

	if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != ''){
		$pesquisa = $_GET['pesquisa'];

		$sql = MySql::connect()->prepare("SELECT * FROM `noticias` WHERE titulo LIKE ?  AND texto LIKE ?");
		if($sql->execute(['%'.$pesquisa.'%','%'.$pesquisa.'%']) && $sql->rowCount() > 0){
			
			$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0;
			$qtdPags = ceil($sql->rowCount()/$lpp);
			$start = $pagina * 50;

			$sql= MySql::connect()->prepare("SELECT * FROM `noticias` WHERE titulo LIKE ?  AND texto LIKE ? ORDER BY pdate LIMIT $start, $lpp");
			if($sql->execute(['%'.$pesquisa.'%','%'.$pesquisa.'%']) && $sql->rowCount() > 0){
				$news = $sql->fetchAll();
				echo '<div>
					<ul>';
						foreach($news as $k => $v){
							echo '<li value="'.$v['id'].'">
		                  <a href="'.INCLUDE_PATH.$v['tema'].'/'.str_replace(' ', '-', strtolower(Variable::removeAccent($v['titulo']))).'-'.$v['id'].'.html">
		                  	<img src="'.INCLUDE_PATH.'/imgtemp/?largura='.$wImg.'&altura='.$hImg.'&arquivo='.substr($v['imagem'], 26).'">
		                    <p>'.$v['titulo'].'</p>
		                    <p>'.$v['resumo'].'</p>
		                    <p>'.date('d/m/y', strtotime($v['pdate'])).' às '.date('H:i', strtotime($v['pdate'])).'</p>
		                  </a>
		                 </li>';
						}	
					echo '</ul>';
				echo "</DIV>
				<div class='small-12 columns' style='margin-top:35px;'>
					<center>
						<FONT class=links>\n";
							$atual = ($pagina + 1);
				      if($pagina > 0){
								$url = INCLUDE_PATH.$file."?pesquisa=".$pesquisa."&pagina=".($pagina - 1);
								echo '<li class="page-item"><a class="page-link" href="'.$url.'" tabindex="-1" aria-disabled="true">Anterior</a></li>';
							}

							for($i = 10; $i >= 0; $i--){
								$pg = $atual + 5 - $i;
								if($pg == $atual){
									echo '<li class="page-item active"><a class="page-link" href="#">'.$atual.'</a></li>';
								}
								else if($pg > 0 && $pg <= $qtdPags){
									$url = INCLUDE_PATH.$file."?pesquisa=".$pesquisa."&pagina=".($pg-1);
									echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$pg.'</a></li>';
								}
							}

							if($pagina < $qtdPags-1){
								$url = INCLUDE_PATH.$file."?pesquisa=".$pesquisa."&pagina=".($pagina + 1);
								echo '<li class="page-item"><a class="page-link" href="'.$url.'">Próxima</a></li>';
							}
						echo "</FONT>
					</center>
				</div><br><br>\n";
			}
		}
		else{ echo "<font face=\"verdana\" size=\"2\">Não foi possível encontrar nenhuma notícia!</font>"; }
	}

?>