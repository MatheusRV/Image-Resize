<?php
	header('Content-type: text/html; charset=iso-8859-1');
	//include_once "2023_pagesconfig_functions.php";
	//include_once "portal_config_bdconnect.php";
	require_once "config.php"; 							// Conexão com o banco de dados PDO

	function cortar_texto($string,$max_size,$tail)	{		$linha = "$string";		$size = strlen($linha);		if(strlen($linha)>$max_size)	{		$linha = substr($linha, 0, $max_size);		$d = $linha;		$tmp = strrpos($d," ");		$linha = substr($linha, 0, $tmp);		$linha = $linha.$tail;		return $linha;		}		else		{		return $linha;		}	}
        function seoUrl($str){
        	$aaa = array('/(à|á|â|ã|ä|å|æ)/','/(è|é|ê|ë)/','/(ì|í|î|ï)/','/(ð|ò|ó|ô|õ|ö|ø)/','/(ù|ú|û|ü)/','/ç/','/þ/','/ñ/','/ß/','/(ý|ÿ)/','/(=|\+|\/|\\\|\.|\'|\_|\\n| |\(|\))/','/[^a-z0-9_ -]/s');
        	$bbb = array('a','e','i','o','u','c','d','n','s','y','-','');
        	return trim(trim(trim(preg_replace('/-{2,}/s', '-', preg_replace($aaa, $bbb, strtolower($str)))),'_'),'-');    }

	$sql = MySql::connect()->prepare("SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM paginas WHERE id = 11");
	if($sql->execute() == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
	$row = $sql->fetch();
	$destaque_texto = $row['texto'];
	$destaque2 = $row['imagem'];

	$sql = MySql::connect()->prepare("SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM paginas WHERE id = 17");
	if($sql->execute() == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
	$row = $sql->fetch();
	$destaque = $row['texto'];

	//MAIS-RECENTE
	$sql = MySql::connect()->prepare("SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND NOT id = ? AND NOT id = ? AND NOT especial = ? AND abrangencia = ? ORDER BY pdate DESC LIMIT 1");
	if($sql->execute([$destaque, $destaque2, 'trabalho-e-emprego', 'icara']) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
	$row = $sql->fetch();
	$id1 = $row['id'];

	//MAIS-LIDAS
	$sql = MySql::connect()->prepare("SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND NOT id = ? AND NOT especial = ? AND abrangencia = ? ORDER BY pdate DESC LIMIT 1");
	if($sql->execute([$id1, 'trabalho-e-emprego', 'icara']) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
	$row = $sql->fetch();
	$id2 = $row['id'];

	$sql = MySql::connect()->prepare("SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate between now() - INTERVAL 2 DAY and now() AND NOT id = ? AND NOT id = ? AND NOT especial = 'trabalho-e-emprego' ORDER BY cont DESC LIMIT 1");
	if($sql->execute([$id1, $id2]) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
	$row = $sql->fetch();
	$id3 = $row['id'];

	$sql = MySql::connect()->prepare("SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate between now() - INTERVAL 2 DAY and now() AND NOT id = ? AND NOT id = ? AND NOT id = ? AND NOT especial = 'trabalho-e-emprego' ORDER BY cont DESC LIMIT 1");
	if($sql->execute([$id1, $id2, $id3]) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
	$row = $sql->fetch();
	$id4 = $row['id'];
	
	$sql = MySql::connect()->prepare("SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate between now() - INTERVAL 2 DAY and now() AND NOT id = ? AND NOT id = ? AND NOT id = ? AND NOT id = ? AND NOT especial='trabalho-e-emprego' ORDER BY pdate DESC LIMIT 1");
	if($sql->execute([$id1, $id2, $id3, $id4]) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
	$row = $sql->fetch();
	$id5 = $row['id'];
	?>

<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if IE 9]><html class="lt-ie10" lang="pt-br" > <![endif]-->
	<head>
		<META charset=iso-8859-1>
		<title>Canal Içara - curta essa cidade!</title>

		<? //META TAGS ?>
		<META HTTP-EQUIV="REFRESH" CONTENT="3600">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="expires" content="0" />
		<meta name="description" content="Canal Içara é o site com notícias, opiniões, enquetes, classificados, fotos e vídeos mais especializado sobre Içara e os içarenses espalhados pelo mundo" />
		<meta name="keywords" content="internet, canal, portal, içara, news, notícias, içarense, jornalismo, esporte, economia, educação, política, saúde, segurança, tecnologia, trânsito, cultura, entretenimento, festas, vídeos" />
		<meta name="author" content="Canal Içara" />
		<meta name="DC.title" content="Canal Içara" />
		<meta name="resource-type" content="document" />
		<meta name="doc-class" content="Completed" />
		<meta name="classification" content="Internet" />
		<meta name="robots" content="ALL" />
		<meta name="rating" content="General" />
		<meta name="distribution" content="Global" />
		<meta name="revisit-after" content="1" />
		<meta name="language" content="pt-br" />
		<meta lang="pt-br" />
		<meta name="copyright" content="Copyright (c) by Canalicara.com" />
		<meta name="ROBOS"content="INDEX,FOLLOW" />
		<meta name="revisit-after" content="7 Days" />

		<link rel="shortcut icon" href="<?=INCLUDE_PATH?>assets/images/favicon.ico"><? //Favicon ?>
		<link rel="preconnect" href="https://fonts.gstatic.com"><? //Google Font ?>
		<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet"><? //Google Font ?>
		<link rel="stylesheet" type="text/css" href="<?=INCLUDE_PATH?>assets/vendor/font-awesome/css/all.min.css"><? //Plugins CSS ?>
		<link rel="stylesheet" type="text/css" href="<?=INCLUDE_PATH?>assets/vendor/bootstrap-icons/bootstrap-icons.css"><? //Plugins CSS ?>
		<link rel="stylesheet" type="text/css" href="<?=INCLUDE_PATH?>assets/vendor/tiny-slider/tiny-slider.css"><? //Plugins CSS ?>
		<link rel="stylesheet" type="text/css" href="<?=INCLUDE_PATH?>assets/vendor/glightbox/css/glightbox.css"><? //Plugins CSS ?>
		<link rel="stylesheet" type="text/css" href="<?=INCLUDE_PATH?>assets/vendor/plyr/plyr.css"><? //Plugins CSS ?>
		<link id="style-switch" rel="stylesheet" type="text/css" href="<?=INCLUDE_PATH?>assets/css/style.css"><? //Theme CSS ?>
		<link rel="stylesheet" type="text/css" media="screen" href="<?=INCLUDE_PATH?>assets/padrao.css" /><? //Padrão CSS ?>
	</head>
	<body>

		<?php	//include "2023_pagesconfig_layout_topo.php";
				//include "2023_pagesconfig_scripts.php";	?>


		<!-- ======================= Trending END -->

		<?php //include "pagesconfig_banners_premium.php";	?>

		<!-- ======================= Main hero START -->
		<section class="pt-4 pb-0 card-grid">
			<div class="container">
				<div class="row g-4">
					<!-- Left big card ---->
					<div class="col-lg-6">
						<!-- Card item START -->
						<?php
							$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, resumo, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE id = ?");
							if($sql->execute([$id1]) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }

							$row = $sql->fetch();
							$titulo = $row['titulo'];
							$URL = seoUrl($titulo);
							$resumo = $row['resumo'];
							$data = $row['date'];
							$texto = $row['texto'];
							$tema = $row['tema'];
							$URL_tema = seoUrl($tema);
							$imagem = $row['imagem'];
							$img = substr($imagem, strlen(INCLUDE_PATH)-1);
							$video_youtube = $row['video_youtube'];

							echo 	"<div class=\"card card-overlay-bottom card-grid-lg card-bg-scale\" style=\"background-image:url(".INCLUDE_PATH."imgtemp/?largura=500&altura=550&arquivo=$img); background-position: center left; background-size: cover;\">
								<span class=\"card-featured bg_$tema\" title=\"Notícia mais recente\"><i class=\"fas fa-star\"></i></span><!-- Card featured ------->	
								<div class=\"card-img-overlay d-flex align-items-center p-3 p-sm-4\">
									<div class=\"w-100 mt-auto\">
										<a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"badge bg_$tema mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a><!-- Card category ------->	
										<h2 class=\"text-white h1\"><a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset\">$titulo</a></h2><!-- Card title ---------->	
										<p class=\"text-white\">$resumo</p><!-- Card resumo --------->	
										<ul class=\"nav nav-divider text-white-force align-items-center d-none d-sm-inline-block\">
											<li class=\"nav-item\">$data</li>
										</ul><!-- Card info ----------->	
									</div>
								</div><!-- Card Image overlay -->	
							</div>\n";
					?></div>

					<!-- Right small cards -->
					<div class="col-lg-6">
						<div class="row g-4">
							<!-- Card item START -->
							<?php
								$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE id = ?");
								if($sql->execute([$id2]) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }

								$row = $sql->fetch();
								$titulo = $row['titulo'];
								$URL = seoUrl($titulo);
								$resumo = $row['resumo'];
								$data = $row['date'];
								$texto = $row['texto'];
								$tema = $row['tema'];
								$URL_tema = seoUrl($tema);
								$imagem = $row['imagem'];
								$img = substr($imagem, strlen(INCLUDE_PATH)-1);
								$video_youtube = $row['video_youtube'];

								echo 	"<div class=\"col-12\">
									<div class=\"card card-overlay-bottom card-grid-sm card-bg-scale\" style=\"background-image:url(".INCLUDE_PATH."imgtemp/?largura=700&altura=350&arquivo=$img); background-position: center left; background-size: cover;\">
										<div class=\"card-img-overlay d-flex align-items-center p-3 p-sm-4\">	
											<div class=\"w-100 mt-auto\">
												<a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"badge bg_$tema  mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a><!-- Card category ------->	
												<h4 class=\"text-white\"><a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset\">$titulo</a></h4><!-- Card title ---------->	
												<ul class=\"nav nav-divider text-white-force align-items-center d-none d-sm-inline-block\">
													<li class=\"nav-item\">$data</li>
												</ul><!-- Card info ----------->	
											</div>
										</div><!-- Card Image overlay -->
									</div>
								</div>\n";
							?>

							<!-- Card item START -->
							<?php
								$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE id = ? OR id = ? ORDER BY RAND() LIMIT 2");
								if($sql->execute([$id3, $id4]) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }

								$res = $sql->fetchAll();
								foreach($res as $row){
									$titulo = $row['titulo'];
									$URL = seoUrl($titulo);
									$resumo = $row['resumo'];
									$data = $row['date'];
									$texto = $row['texto'];
									$tema = $row['tema'];
									$URL_tema = seoUrl($tema);
									$imagem = $row['imagem'];
									$img = substr($imagem, strlen(INCLUDE_PATH)-1);
									$video_youtube = $row['video_youtube'];

									echo 	"<div class=\"col-md-6\">
										<div class=\"card card-overlay-bottom card-grid-sm card-bg-scale\" style=\"background-image:url(".INCLUDE_PATH."imgtemp/?largura=700&altura=350&arquivo=$img); background-position: center left; background-size: cover;\">
											<div class=\"card-img-overlay d-flex align-items-center p-3 p-sm-4\">	
												<div class=\"w-100 mt-auto\">
													<a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"badge bg_$tema mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a><!-- Card category ------->
													<h4 class=\"text-white\">
														<a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset\">$titulo</a>
													</h4><!-- Card title ---------->	
													<ul class=\"nav nav-divider text-white-force align-items-center d-none d-sm-inline-block\">
														<li class=\"nav-item\">$data</li>
													</ul><!-- Card info ----------->	
												</div>
											</div><!-- Card Image overlay -->
										</div>
									</div>\n";
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ======================= Main hero END -->

		<!-- ======================= Main content START -->
		<section class="position-relative">
			<div class="container" data-sticky-container>
				<div class="row">
					<!-- Main Post START -->
					<div class="col-lg-9">
						<!-- Title -->
						<div class="mb-4">
							<h2 class="m-0"><i class="bi bi-newspaper me-2"></i>Mais informação</h2>
							<p>Confira outras notícias e conteúdos do Portal Canal Içara</p>
						</div>
						<div class="row gy-4">
							<!-- Card item START -->
							<?php
								$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, resumo, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND NOT id = ? AND NOT id = ? AND NOT id = ? AND NOT id = ? ORDER BY pdate DESC LIMIT 6");
								if($sql->execute([$id1, $id2, $id3, $id4]) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
								$res = $sql->fetchAll();

								foreach($res as $row){
									$titulo = $row['titulo'];
									$URL = seoUrl($titulo);
									$resumo = $row['resumo'];
									$data = $row['date'];
									$texto = $row['texto'];
									$tema = $row['tema'];
									$URL_tema = seoUrl($tema);
									$imagem = $row['imagem'];
									$img = substr($imagem, strlen(INCLUDE_PATH)-1);
									$video_youtube = $row['video_youtube'];

									echo 	"<div class=\"col-sm-6\">
										<div class=\"card\">
											<div class=\"position-relative\"><img class=\"card-img\" src=\"".INCLUDE_PATH."imgtemp/?largura=700&altura=450&arquivo=$img\" alt=\"Card image\">
												<div class=\"card-img-overlay d-flex align-items-start flex-column p-3\">
													<div class=\"w-100 mt-auto\">
														<a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"badge bg_$tema  mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a>
													</div><!-- Card category -->	
												</div>
											</div><!-- Card img -->	

											<div class=\"card-body px-0 pt-3\">
												<h4 class=\"card-title mt-2\">
													<a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-reset fw-bold\">$titulo</a>
												</h4>
												<p class=\"card-text\">$resumo</p>
												<ul class=\"nav nav-divider align-items-center d-none d-sm-inline-block\">
													<li class=\"nav-item\">$data</li>
												</ul><!-- Card info -->
											</div>
										</div>
									</div>\n";
								}
							?>
						</div>
					</div>
					<!-- Main Post END -->
					<!-- Sidebar START -->
					<div class="col-lg-3 mt-5 mt-lg-0">
						<div data-sticky data-margin-top="80" data-sticky-for="767">

							<!-- Social widget START -->
							<div class="row g-2">
								<div class="col-4">
									<a href="https://www.facebook.com/portalcanalicara" class="bg-facebook rounded text-center text-white-force p-3 d-block" target=_blank>
										<i class="fab fa-facebook-square fs-5 mb-2"></i>
										<h6 class="m-0">25k</h6>
										<span class="small">Fans</span>
									</a>
								</div>
								<div class="col-4">
									<a href="https://www.instagram.com/portalcanalicara/" class="bg-instagram-gradient rounded text-center text-white-force p-3 d-block" target=_blank>
										<i class="fab fa-instagram fs-5 mb-2"></i>
										<h6 class="m-0">14k</h6>
										<span class="small">Followers</span>
									</a>
								</div>
								<div class="col-4">
									<a href="https://www.youtube.com/portalcanalicara" class="bg-youtube rounded text-center text-white-force p-3 d-block" target=_blank>
										<i class="fab fa-youtube-square fs-5 mb-2"></i>
										<h6 class="m-0">1,5k</h6>
										<span class="small">Subs</span>
									</a>
								</div>
							</div>
							<!-- Social widget END -->

								<div class="col-12 col-sm-12 col-lg-12 my-4">
									<?php //include "pagesconfig_banners_start.php";	?>
								</div><!-- BANNER START -->

								<div class="row">
									<div class="col-12 col-sm-6 col-lg-12">
										<h4 class="mt-4 mb-3"><i class="bi bi-globe"></i> BLOGOSFERA</h4>
										<!-- Recent post item -->
										<?php
											$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND blog !='' ORDER BY pdate DESC LIMIT 3");
											if($sql->execute() == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
											$res = $sql->fetchAll();

											foreach ($res as $row){
												$titulo = $row['titulo'];
												$URL = seoUrl($titulo);
												$resumo = $row['resumo'];
												$data = $row['date'];
												$texto = $row['texto'];
												$tema = $row['tema'];
												$URL_tema = seoUrl($tema);
												$imagem = $row['imagem'];
												$img = substr($imagem, strlen(INCLUDE_PATH)-1);
												$video_youtube = $row['video_youtube'];

												echo 	"<div class=\"card mb-3\">
													<div class=\"row g-3\">
														<div class=\"col-4\"><img class=\"rounded\" src=\"".INCLUDE_PATH."imgtemp/?largura=700&altura=450&arquivo=$img\" alt=\"\"></div>
														<div class=\"col-8\">
															<h6><a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset fw-bold\">$titulo</a></h6>
															<div class=\"small mt-1\">$data</div>
														</div>
													</div>
												</div>\n";
											}
										?>
									</div>
								</div><!-- BLOGOSFERA -->

								<div class="col-12 col-sm-6 col-lg-12 my-4">
									<?php //include "pagesconfig_banners_expert.php";	?>
								</div><!-- BANNER EXPT 2 -->

								<div class="row">
									<div class="col-12 col-sm-6 col-lg-12">
										<h4 class="mt-4 mb-3"><i class="bi bi-list-stars"></i> OPORTUNIDADES</h4>
										<!-- Recent post item -->
										<?php
											$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND especial = ? ORDER BY pdate DESC LIMIT 3");
											if($sql->execute(['trabalho-e-emprego']) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
											$res = $sql->fetchAll();

											foreach ($res as $row){
												$titulo = $row['titulo'];
												$URL = seoUrl($titulo);
												$resumo = $row['resumo'];
												$data = $row['date'];
												$texto = $row['texto'];
												$tema = $row['tema'];
												$URL_tema = seoUrl($tema);
												$imagem = $row['imagem'];
												$img = substr($imagem, strlen(INCLUDE_PATH)-1);
												$video_youtube = $row['video_youtube'];

												echo 	"<div class=\"card mb-3\">
													<div class=\"row g-3\">
														<div class=\"col-4\"><img class=\"rounded\" src=\"".INCLUDE_PATH."imgtemp/?largura=700&altura=450&arquivo=$img\" alt=\"\"></div>
														<div class=\"col-8\"><h6><a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset fw-bold\">$titulo</a></h6>
															<div class=\"small mt-1\">$data</div>
														</div>
													</div>
												</div>\n";
											}
										?>
									</div>
								</div><!-- VAGAS DE TRABALHO -->
								<div class="col-12 col-sm-6 col-lg-12 my-4"><?php //include "pagesconfig_banners_expert.php";	?></div><!-- BANNER EXPT 2 -->
							</div>
						</div>
					</div><!-- Sidebar END -->
				</div> <!-- Row end -->
			</div>
		</section>
		<!-- =======================
		Main content END -->

		<!-- Divider -->
		<div class="container"><div class="border-bottom border-primary border-2 opacity-1"></div></div>

		<!-- ======================= Featured video START -->
		<section class="bg-dark">
			<div class="container">
				<div class="row">
					<!-- Title -->
					<div class="col-md-12">
						<div class="mb-4 d-sm-flex justify-content-between align-items-center">
							<h2 class="m-sm-0 text-white"><i class="bi bi-camera-video me-2"></i>Vídeos</h2>
							<a href="https://www.youtube.com/portalcanalicara" class="btn btn-sm bg-youtube" target=_blank><i class="bi bi-youtube me-2 align-middle"></i>YouTube</a>
						</div>
					</div>

					<!-- Card big START -->
					<?php
						$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, video_youtube, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND video_youtube!='' ORDER BY pdate DESC LIMIT 1");
						if($sql->execute() == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
						$row = $sql->fetch();
						
						$titulo = $row['titulo'];
						$URL = seoUrl($titulo);
						$resumo = $row['resumo'];
						$data = $row['date'];
						$texto = $row['texto'];
						$tema = $row['tema'];
						$URL_tema = seoUrl($tema);
						$imagem = $row['imagem'];
						$img = substr($imagem, strlen(INCLUDE_PATH)-1);
						$video_youtube = $row['video_youtube'];

						echo 	"<div class=\"col-lg-6\">
							<div class=\"card card-overlay-bottom card-fold h-400 h-lg-540\" style=\"background-image:url(".INCLUDE_PATH."imgtemp/?largura=700&altura=450&arquivo=$img); background-position: center left; background-size: cover;\">
								<span class=\"card-featured\" title=\"Featured post\"><i class=\"fas fa-star\"></i></span><!-- Card featured -->
								<div class=\"card-img-overlay d-flex flex-column p-3 p-sm-5\">
									<div class=\"position-absolute top-50 start-50 translate-middle pb-5\">
										<a href=\"https://youtu.be/$video_youtube\" class=\"icon-lg bg-primary d-block text-white rounded-circle\" data-glightbox data-gallery=\"y-video\">&nbsp;<i class=\"bi bi-play-btn\"></i>&nbsp;</a><!-- Popup video -->
									</div><!-- Card play button -->
									<div class=\"w-100 mt-auto\">
										<div class=\"col text-center\">
											<a href=\"#\" class=\"badge bg_$tema mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a><!-- Card category -->
											<h2 class=\"text-white\"><a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-reset fw-normal\">$titulo</a></h2><!-- Card title -->
										</div>
									</div><!-- Card overlay Bottom  -->
								</div><!-- Card Image overlay -->
							</div>
						</div>\n";
					?>

					<div class="col-lg-3 mt-4 mt-lg-0">
						<!-- Card item START -->
						<?php
							$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, video_youtube, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND video_youtube != '' ORDER BY pdate DESC LIMIT 1,2");
							if($sql->execute() == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
							$res = $sql->fetchAll();

							foreach($res as $row){
								$titulo = $row['titulo'];
								$URL = seoUrl($titulo);
								$resumo = $row['resumo'];
								$data = $row['date'];
								$texto = $row['texto'];
								$tema = $row['tema'];
								$URL_tema = seoUrl($tema);
								$imagem = $row['imagem'];
								$img = substr($imagem, strlen(INCLUDE_PATH)-1);
								$video_youtube = $row['video_youtube'];

								echo 	"<div class=\"card bg-transparent overflow-hidden mb-4\">
									<div class=\"position-relative rounded-3 overflow-hidden\">
										<div class=\"card-image\">
											<div class=\"overflow-hidden w-100\">
												<div class=\"player-wrapper rounded-3 overflow-hidden\">
													<div class=\"player-youtube\" ><iframe src=\"https://www.youtube.com/embed/$video_youtube\"></iframe></div>
												</div><!-- HTML video START -->
											</div>
										</div><!-- Video -->
									</div><!-- Card img -->
									<div class=\"card-body px-0 pt-3\"><h5 class=\"card-title\"><a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-white fw-bold\">$titulo</a></h5>
										<ul class=\"nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6\">
											<li class=\"nav-item\">$data</li>
										</ul><!-- Card info -->
									</div><!-- Card titulo -->
								</div>\n";
							}
						?>
					</div><!-- Card small START -->
					<div class="col-lg-3">
						<!-- Card item START -->
						<?php
							$sql2 = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, video_youtube, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND video_youtube != '' ORDER BY pdate DESC LIMIT 3,2");
							if($sql2->execute() == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
							$res = $slq2->fetchAll();

							foreach($res as $row){
								$titulo = $row['titulo'];
								$URL = seoUrl($titulo);
								$resumo = $row['resumo'];
								$data = $row['date'];
								$texto = $row['texto'];
								$tema = $row['tema'];
								$URL_tema = seoUrl($tema);
								$imagem = $row['imagem'];
								$img = substr($imagem, strlen(INCLUDE_PATH)-1);
								$video_youtube = $row['video_youtube'];

								echo 	"<div class=\"card bg-transparent overflow-hidden mb-4\">
									<div class=\"position-relative rounded-3 overflow-hidden\">
										<div class=\"card-image\">
											<div class=\"overflow-hidden w-100\">
												<div class=\"player-wrapper rounded-3 overflow-hidden\">
													<div class=\"player-youtube\" ><iframe src=\"https://www.youtube.com/embed/$video_youtube\"></iframe></div><!-- HTML video START -->
												</div>
											</div>
										</div><!-- Video -->
									</div><!-- Card img -->
									<div class=\"card-body px-0 pt-3\"><h5 class=\"card-title\"><a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-white fw-bold\">$titulo</a></h5>
										<ul class=\"nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6\">
														<li class=\"nav-item\">$data</li>
										</ul><!-- Card info -->
									</div><!-- Card titulo -->
								</div>\n";
							}
						?>
					</div><!-- Card small END -->
				</div>
			</div>
		</section>
		<!-- ======================= Featured video END -->


		<!-- ======================= EMPREENDA MAIS -->
		<section class="pt-4">
			<div class="container"  style="margin-top:50px;">
				<div class="row">
					<div class="col-md-12">
						<div class="mb-4 d-md-flex justify-content-between align-items-center">
							<h2 class="m-0"><i class="bi bi-chat-right-text"></i> Empreenda Mais</h2>
							<a href="<?=INCLUDE_PATH?>especial/empreenda-mais/" class="text-body small"><u>Aproveite muito conteúdo para o seu desenvolvimento!</u></a>
						</div><!-- Title -->

						<div class="tiny-slider arrow-hover arrow-blur arrow-dark arrow-round">
							<div class="tiny-slider-inner"
							data-autoplay="true"
							data-hoverpause="true"
							data-gutter="24"
							data-arrow="true"
							data-dots="false"
							data-items-xl="4" 
							data-items-md="3" 
							data-items-sm="2" 
							data-items-xs="1">
								<!-- Card item START -->
								<?php
									$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND especial = 'empreenda-mais' ORDER BY pdate DESC LIMIT 10");
									if($sql->execute() == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
									$res = $slq->fetchAll();

									foreach($res as $row){
										$titulo = $row['titulo'];
										$URL = seoUrl($titulo);
										$resumo = $row['resumo'];
										$data = $row['date'];
										$texto = $row['texto'];
										$tema = $row['tema'];
										$URL_tema = seoUrl($tema);
										$imagem = $row['imagem'];
										$img = substr($imagem, strlen(INCLUDE_PATH)-1);
										$video_youtube = $row['video_youtube'];

										echo 	"<div class=\"card\">
											<div class=\"position-relative\"><img class=\"card-img\" src=\"".INCLUDE_PATH."imgtemp/?largura=700&altura=400&arquivo=$img\" alt=\"Card image\">
												<div class=\"card-img-overlay d-flex align-items-start flex-column p-3\"></div>
											</div><!-- Card img -->
											<div class=\"card-body px-0 pt-3\"><h5 class=\"card-title\"><a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-reset fw-bold\">$titulo</a></h5>
												<ul class=\"nav nav-divider align-items-center d-none d-sm-inline-block\">
													<li class=\"nav-item\">$data</li>
												</ul><!-- Card date -->
											</div><!-- Card title -->
										</div>\n";
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- **************** INDICADORES **************** -->

		<section class="pt-1">
			<div class="container" style="margin-top:50px;">
				<div class="row">
					<div class="col-md-12">
						<div class="mb-4 d-md-flex justify-content-between align-items-center"><h2 class="m-0"><i class="bi bi-graph-up-arrow"></i> Indicadores de Içara</h2></div><!-- Title -->
						<div class="row g-4 pb-4">
		     			<!-- Card item START -->
		     			<?php
		     				$sql = MySql::connect()->prepare("SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND especial = ? ORDER BY pdate DESC LIMIT 4");
								if($sql->execute(['indicadores-de-icara']) == false && $sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
		     				$res = $sql->fetchAll();

								foreach($res as $row){
									$titulo = $row['titulo'];
									$URL = seoUrl($titulo);
									$resumo = $row['resumo'];
									$data = $row['date'];
									$texto = $row['texto'];
									$tema = $row['tema'];
									$URL_tema = seoUrl($tema);
									$imagem = $row['imagem'];
									$img = substr($imagem, strlen(INCLUDE_PATH)-1);
									$video_youtube = $row['video_youtube'];

									echo 	"<div class=\"col-sm-6 col-lg-3\">
										<div class=\"card card-overlay-bottom card-img-scale\">
											<img class=\"card-img\" src=\"".INCLUDE_PATH."imgtemp/?largura=500&altura=500&arquivo=$img\" alt=\"\"><!-- Card Image -->
											<div class=\"card-img-overlay d-flex flex-column p-3 p-sm-4\"><div></div>
			       						<div class=\"w-100 mt-auto\"><h4 class=\"text-white\"><a href=\"".INCLUDE_PATH."$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-reset stretched-link\">$titulo</a></h4>
			        						<ul class=\"nav nav-divider text-white-force align-items-center d-none d-sm-inline-block small\">
														<li class=\"nav-item\">$data</li>
													</ul><!-- Card info -->
												</div><!-- Card title -->
											</div><!-- Card Image overlay -->
										</div>
									</div>\n";
								}
							?>
			 			</div>
					</div>
				</DIV>
			</div>

			<div class="container">
				<div class="row g-4">

		<?php //INDICADORES : EMPREGOS ====== ?>

							<!-- Counter item -->
							<div class="col-sm-12 col-lg-4">
								<div class="card card-body border p-3">
									<div class="d-flex align-items-center">
										<!-- Icon -->
										<div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">&nbsp;<i class="bi bi-gear"></i>&nbsp;</div>
										<!-- Content -->
										<div class="ms-3">
											<?php	
												$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = 'Empregos' ORDER BY id DESC LIMIT 1";
												$sql = MySql::connect()->prepare($query);
												$sql->execute();
												if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
												else{ $result = $sql->fetchAll(); }
												foreach($result as $key => $row){
													echo 	"<div class=\"ms-3\">
														<h3> {$row['titulo']} empregos</h3>
														<h6 class=\"mb-0\">[até {$row['texto']}]</h6>
													</div>";
												}
											?>
										</div>
									</div>
								</div>
							</div>
		 


		<?php //INDICADORES : EMPRESAS ====== ?>

							<!-- Counter item -->
							<div class="col-sm-12 col-lg-4">
								<div class="card card-body border p-3">
									<div class="d-flex align-items-center">
										<!-- Icon -->
										<div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">&nbsp;<i class="bi bi-building"></i>&nbsp;</div>
										<!-- Content -->
										<div class="ms-3">
											<?php	
												$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = ? ORDER BY id DESC LIMIT 1";
												$sql = MySql::connect()->prepare($query);
												$sql->execute(['Empresas']);
												if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
												else{ $result = $sql->fetchAll(); }
												foreach($result as $key => $row){
													echo 	"<div class=\"ms-3\">
														<h3> {$row['titulo']} empresas</h3>
														<h6 class=\"mb-0\">[até {$row['texto']}]</h6>
													</div>";
												}
											?>
										</div>
									</div>
								</div>
							</div>


		<?php //INDICADORES : BALANÇA COMERCIAL ====== ?>

							<!-- Counter item -->
							<div class="col-sm-12 col-lg-4">
								<div class="card card-body border p-3">
									<div class="d-flex align-items-center">
										<!-- Icon -->
										<div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">&nbsp;<i class="bi bi-airplane"></i>&nbsp;</div>
										<!-- Content -->
										<div class="ms-3">
											<?php	
												$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = 'Balança Comercial' ORDER BY id DESC LIMIT 1";
												$sql = MySql::connect()->prepare($query);
												$sql->execute();
												if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
												else{ $result = $sql->fetchAll(); }
												foreach($result as $key => $row){
													echo 	"<div class=\"ms-3\">
														<h3> US$ {$row['titulo']} </h3>
														<h6 class=\"mb-0\">Balança Comercial [até {$row['texto']}]</h6>
													</div>";
												}	
											?>
										</div>
									</div>
								</div>
							</div>


		<?php //INDICADORES : IDEB 5º ANO ====== ?>

							<!-- Counter item -->
							<div class="col-sm-12 col-lg-4">
								<div class="card card-body border p-3">
									<div class="d-flex align-items-center">
										<!-- Icon -->
										<div class="icon-xl fs-1 bg-info bg-opacity-10 rounded-3 text-info">&nbsp;<i class="bi bi-book"></i>&nbsp;</div>
										<!-- Content -->
										<div class="ms-3">
											<?php	
												$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = 'IDEB - 5º ano' ORDER BY id DESC LIMIT 1";
												$sql = MySql::connect()->prepare($query);
												$sql->execute();
												if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
												else{ $result = $sql->fetchAll(); }
												foreach($result as $key => $row){
													echo 	"<div class=\"ms-3\">
														<h3> {$row['titulo']} IDEB</h3>
														<h6 class=\"mb-0\">5ª ano [{$row['texto']}]</h6>
													</div>";	
												}	
											?>
										</div>
									</div>
								</div>
							</div>

		<?php //INDICADORES : IDEB 9º ANO ====== ?>

							<!-- Counter item -->
							<div class="col-sm-12 col-lg-4">
								<div class="card card-body border p-3">
									<div class="d-flex align-items-center">
										<!-- Icon -->
										<div class="icon-xl fs-1 bg-info bg-opacity-10 rounded-3 text-info">&nbsp;<i class="bi bi-book"></i>&nbsp;</div>
										<!-- Content -->
										<div class="ms-3">
											<?php	
												$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = 'IDEB - 9º ano' ORDER BY id DESC LIMIT 1";
												$sql = MySql::connect()->prepare($query);
												$sql->execute();
												if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
												else{ $result = $sql->fetchAll(); }
												foreach($result as $key => $row){
													echo 	"<div class=\"ms-3\">
														<h3> {$row['titulo']} IDEB</h3>
														<h6 class=\"mb-0\">9ª ano [{$row['texto']}]</h6>
													</div>";
												}
											?>
										</div>
									</div>
								</div>
							</div>


		<?php //INDICADORES : IDEB ENSINO MÉDIO ====== ?>

							<!-- Counter item -->
							<div class="col-sm-12 col-lg-4">
								<div class="card card-body border p-3">
									<div class="d-flex align-items-center">
										<!-- Icon -->
										<div class="icon-xl fs-1 bg-info bg-opacity-10 rounded-3 text-info">&nbsp;<i class="bi bi-book"></i>&nbsp;</div>
										<!-- Content -->
										<div class="ms-3">
											<?php	
												$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = 'IDEB - Ensino Médio' ORDER BY id DESC LIMIT 1";
												$sql = MySql::connect()->prepare($query);
												$sql->execute();
												if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
												else{ $result = $sql->fetchAll(); }
												foreach($result as $key => $row){
													echo 	"<div class=\"ms-3\">
														<h3> {$row['titulo']} IDEB</h3>
														<h6 class=\"mb-0\">Ensino Médio [{$row['texto']}]</h6>
													</div>";
												}
											?>
										</div>
									</div>
								</div>
							</div>

		<?php //INDICADORES : IDHM ====== ?>

							<!-- Counter item -->
							<div class="col-sm-12 col-lg-4">
								<div class="card card-body border p-3">
									<div class="d-flex align-items-center">
										<!-- Icon -->
										<div class="icon-xl fs-1 bg-warning bg-opacity-10 rounded-3 text-warning">&nbsp;<i class="bi bi-geo"></i>&nbsp;</div>
										<!-- Content -->
										<div class="ms-3">

									<?php	
										$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = 'IDHM' ORDER BY id DESC LIMIT 1";
										$sql = MySql::connect()->prepare($query);
										$sql->execute();
										if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
										else{ $result = $sql->fetchAll(); }
										foreach($result as $key => $row){
											echo 	"<div class=\"ms-3\">
												<h3> {$row['titulo']} IDHM</h3>
												<h6 class=\"mb-0\">[{$row['texto']}]</h6>
											</div>";
										}	?>
									
										</div>
									</div>
								</div>
							</div>

		<?php //INDICADORES : PIB ====== ?>

							<!-- Counter item -->
							<div class="col-sm-12 col-lg-4">
								<div class="card card-body border p-3">
									<div class="d-flex align-items-center">
										<!-- Icon -->
										<div class="icon-xl fs-1 bg-warning bg-opacity-10 rounded-3 text-warning">&nbsp;<i class="bi bi-cash"></i>&nbsp;</div>
										<!-- Content -->
										<div class="ms-3">
											<?php	
												$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = 'PIB' ORDER BY id DESC LIMIT 1";
												$sql = MySql::connect()->prepare($query);
												$sql->execute();
												if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
												else{ $result = $sql->fetchAll(); }
												foreach($result as $key => $row){
													echo 	"<div class=\"ms-3\">
														<h3>R$ {$row['titulo']} PIB</h3>
														<h6 class=\"mb-0\">Per capita [{$row['texto']}]</h6>
													</div>";
												}	
											?>
										</div>
									</div>
								</div>
							</div>

		<?php //INDICADORES : POPULAÇÃO ====== ?>

							<!-- Counter item -->
							<div class="col-sm-12 col-lg-4">
								<div class="card card-body border p-3">
									<div class="d-flex align-items-center">
										<!-- Icon -->
										<div class="icon-xl fs-1 bg-warning bg-opacity-10 rounded-3 text-warning">&nbsp;<i class="bi bi-people"></i>&nbsp;</div>
										<!-- Content -->
										<div class="ms-3">
											<?php	
												$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = 'População' ORDER BY id DESC LIMIT 1";
												$sql = MySql::connect()->prepare($query);
												$sql->execute();
												if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
												else{ $result = $sql->fetchAll(); }
												foreach($result as $key => $row){
													echo 	"<div class=\"ms-3\">
														<h3> {$row['titulo']} pessoas</h3>
														<h6 class=\"mb-0\">[{$row['texto']}]</h6>
													</div>";	
												}
											?>
										</div>
									</div>
								</div>
							</div>


		 		</div>
		 		<hr>
		 	</div>
		 </section>

		 </main>


		<?php	//include "2023_pagesconfig_layout_rodape.php";	?>

		<!-- Back to top --><div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

		<? 	//JS libraries, plugins and custom scripts 		?>
		<? 	//Bootstrap JS 		?><script src="<?=INCLUDE_PATH?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<? 	//JS.SCRIPTS 		?><script src="<?=INCLUDE_PATH?>assets/scripts.js"></script>
		<? 	//JS.vendors 		?><script src="<?=INCLUDE_PATH?>assets/vendor/tiny-slider/tiny-slider.js"></script>
		<? 	//JS.vendors 		?><script src="<?=INCLUDE_PATH?>assets/vendor/sticky-js/sticky.min.js"></script>
		<? 	//JS.vendors 		?><script src="<?=INCLUDE_PATH?>assets/vendor/glightbox/js/glightbox.js"></script>
		<? 	//JS.vendors 		?><script src="<?=INCLUDE_PATH?>assets/vendor/plyr/plyr.js"></script>
		<? 	//JS.template.functions	?><script src="<?=INCLUDE_PATH?>assets/js/functions.js"></script>
	</body>
</html>