<?php

	include('config.php');

	//--------------   SUBMIT
	function submitnews($p){
		if(isset($p['submit']) && isset($p['type'])){
			$type = $p['type'];
			if($p['type'] == 'new' || $p['type'] == 'edit'){
				if($_SESSION["nivel"] >= "1"){
					$dataSend = array();

					if($type == 'new'){
						$dataSend[] = $p['pdate_data'].' '.$p['pdate_hora'];
						$dataSend[] = $p['name'];
						$dataSend[] = $p['resumo'];
						$dataSend[] = $p['tema'];
						$dataSend[] = $p['abrangencia'];
						$dataSend[] = $p['especial'];
						$dataSend[] = $p['agencia'];
						$dataSend[] = $p['blog'];
						$dataSend[] = "";
						$dataSend[] = $p['autor'];
						$dataSend[] = $p['texto'];
						$dataSend[] = $p['imagem'];
						$dataSend[] = $p['imagem_exibicao'];
						$dataSend[] = $p['imagem_autor'];
						$dataSend[] = "";
						$dataSend[] = 0;
						$dataSend[] = $p['galeria'];
						$dataSend[] = $p['video'];
						$dataSend[] = $p['video_youtube'];
						$dataSend[] = $p['agendar'];
						$dataSend[] = $p['frase_texto'];
						$dataSend[] = $p['frase_autor'];
						$dataSend[] = $_SESSION['id_usuario'];

						if(!Db::insert('noticias', $dataSend)){
							$lastId = MySql::connect()->lastInsertId();
							$_SESSION['news_result'] = '<font face="verdana" size="2">Notícia '.$lastId.' enviada com sucesso!</font>';
						}
					}
					else if($type == 'edit'){
						$dataSend['id'] = $p['id'];
						$dataSend['pdate'] = $p['pdate_data'].' '.$p['pdate_hora'];
						$dataSend['titulo'] = $p['titulo'];
						$dataSend['resumo'] = $p['resumo'];
						$dataSend['tema'] = $p['tema'];
						$dataSend['abrangencia'] = $p['abrangencia'];
						$dataSend['especial'] = $p['especial'];
						$dataSend['agencia'] = $p['agencia'];
						$dataSend['blog'] = $p['blog'];
						$dataSend['icone'] = "";
						$dataSend['autor'] = $p['autor'];
						$dataSend['texto'] = $p['texto'];
						$dataSend['imagem'] = $p['imagem'];
						$dataSend['imagem_exibicao'] = $p['imagem_exibicao'];
						$dataSend['imagem_autor'] = $p['imagem_autor'];
						$dataSend['atualizacao'] = $p['atualizacao'];
						$dataSend['galeria'] = $p['galeria'];
						$dataSend['video'] = $p['video'];
						$dataSend['video_youtube'] = $p['video_youtube'];
						$dataSend['agenda'] = $p['agenda'];
						$dataSend['frase_texto'] = $p['frase_texto'];
						$dataSend['frase_autor'] = $p['frase_autor'];
						$dataSend['id_usuario'] = $_SESSION['id_usuario'];

						if(!Db::update('noticias', $dataSend)){
							die("Error in update");
						}
						else{
							$_SESSION['news_result'] = "<div class=\"alert alert-success text-center\" role=\"alert\">Notícia editada com sucesso</div>";
						}
					}
				}
				else{ $_SESSION['news_result'] = "<div class=\"alert alert-danger text-center\" role=\"alert\">Você não possui permissão para submeter este formulário!</div>"; }
			}
			else{ $_SESSION['news_result'] = "<div class=\"alert alert-warning text-center\" role=\"alert\">Sorry! Não foi possível identificar o tipo do formulário!</div>"; }
		}
		else{
			$_SESSION['news_result'] = "<div class=\"alert alert-warning text-center\" role=\"alert\">Ops! Nenhum formulário foi encontrado!</div>";
		}
	}

	function submitPassword($p){
		$db = Db::selectVar('admin_usuarios', 'id', $_SESSION['id_usuario']);
		if(is_array($db) && md5($p['senha']) == $db['senha']){
			if($p['novasenha1'] == $p['novasenha2']){
				if(strlen($p['novasenha1']) > 7){
					if($p['novasenha1'] != $p['senha']){
						$dataSend = array('nome' => $p['novonome'], 'senha' => md5($p['novasenha1']), 'id' => $p['id']);
						print_r($dataSend);
						if(Db::update('admin_usuarios', $dataSend)){
							$_SESSION['nome_usuario'] = $p['novonome'];
							$_SESSION['user_result'] = '<font face="verdana" size="2">Editado com sucesso</font>';
						}
					}
					else{ $_SESSION['user_result'] = '<font face="verdana" size="2">Sua nova senha não pode ser igual a sua senha atual!</font>'; }
				}
				else{ $_SESSION['user_result'] = '<font face="verdana" size="2">A senha deve ter no mínimo 6 caracteres! </font>'; }
			}
			else{ $_SESSION['user_result'] = '<font face="verdana" size="2">Sua nova senha não é igual a confirmação!</font>'; }
		}
		else{ $_SESSION['user_result'] = '<font face="verdana" size="2">Username e/ou senha incorretos!</font>'; }
	}


	if(isset($_POST['submit'])){submitnews($_POST); $_POST = array();}
	else if(isset($_POST['submitPass'])){submitPassword($_POST); $_POST = array();}
?>