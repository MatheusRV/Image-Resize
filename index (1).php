<?php
	header('Content-type: text/html; charset=iso-8859-1');
	include_once "2023_pagesconfig_functions.php";
	include_once "portal_config_bdconnect.php";
	require_once "_xtras_config.php"; 							// Conexão com o banco de dados PDO


	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM paginas WHERE id='11'";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());	while ($row = mysqli_fetch_array($res))	{	$destaque_texto = $row['texto'];	$destaque2 = $row['imagem'];		}
	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM paginas WHERE id='17'";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());	while ($row = mysqli_fetch_array($res))	{	$destaque = $row['texto'];			}

	//MAIS-RECENTE
	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND NOT id='$destaque' AND NOT id='$destaque2' AND NOT especial='trabalho-e-emprego' AND abrangencia='icara' ORDER BY pdate DESC LIMIT 1";
				$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
					while ($row = mysqli_fetch_array($res))	{	$id1 = $row['id'];	}

	//MAIS-LIDAS
	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND NOT id='$id1' AND NOT especial='trabalho-e-emprego' AND abrangencia='icara' ORDER BY pdate DESC LIMIT 1";
				$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
					while ($row = mysqli_fetch_array($res))	{	$id2 = $row['id'];	}

	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate between now() - INTERVAL 2 DAY and now() AND NOT id='$id1' AND NOT id='$id2' AND NOT especial='trabalho-e-emprego'  ORDER BY cont DESC LIMIT 1";
				$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
					while ($row = mysqli_fetch_array($res))	{	$id3 = $row['id'];	}	
	
	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate between now() - INTERVAL 2 DAY and now() AND NOT id='$id1' AND NOT id='$id2' AND NOT id='$id3' AND NOT especial='trabalho-e-emprego' ORDER BY cont DESC LIMIT 1";
				$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
					while ($row = mysqli_fetch_array($res))	{	$id4 = $row['id'];	}
	
	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE pdate between now() - INTERVAL 2 DAY and now() AND NOT id='$id1' AND NOT id='$id2' AND NOT id='$id3' AND NOT id='$id4' AND NOT especial='trabalho-e-emprego' ORDER BY pdate DESC LIMIT 1";
				$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
					while ($row = mysqli_fetch_array($res))	{	$id5 = $row['id'];	}

	?>


<!DOCTYPE html PUBLIC><html xmlns="http://www.w3.org/1999/xhtml">
<!--[if IE 9]><html class="lt-ie10" lang="pt-br" > <![endif]-->
<HEAD><META charset=iso-8859-1>
<title>Canal Içara - curta essa cidade!</title>

<? 	//META TAGS 		?>
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

<? 	//Favicon 		?><link rel="shortcut icon" href="https://www.canalicara.com/assets/images/favicon.ico">
<? 	//Google Font	?><link rel="preconnect" href="https://fonts.gstatic.com">
<? 	//Google Font	?><link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
<? 	//Plugins CSS 	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/font-awesome/css/all.min.css">
<? 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/bootstrap-icons/bootstrap-icons.css">
<? 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/tiny-slider/tiny-slider.css">
<? 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/glightbox/css/glightbox.css">
<? 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/plyr/plyr.css">
<? 	//Theme CSS 	?><link id="style-switch" rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/css/style.css">
<? 	//Padrão CSS	?><link rel="stylesheet" type="text/css" media="screen" href="https://www.canalicara.com/assets/padrao.css" />

</head><body>

<?php	include "2023_pagesconfig_layout_topo.php";
		include "2023_pagesconfig_scripts.php";	?>


<!-- ======================= Trending END -->

<?php include "pagesconfig_banners_premium.php";	?>

<!-- ======================= Main hero START -->
<section class="pt-4 pb-0 card-grid">

<div class="container">
<div class="row g-4">

<!-- Left big card ---->	<div class="col-lg-6">
<!-- Card item START -->	<?php	$sql = "SELECT id, titulo, tema, imagem, resumo, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE id='$id1'";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
											while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
												echo 	"<div class=\"card card-overlay-bottom card-grid-lg card-bg-scale\" style=\"background-image:url(https://www.canalicara.com/imgtemp/?largura=500&altura=550&arquivo=$img); background-position: center left; background-size: cover;\">
												<!-- Card featured ------->	<span class=\"card-featured bg_$tema\" title=\"Notícia mais recente\"><i class=\"fas fa-star\"></i></span>
												<!-- Card Image overlay -->	<div class=\"card-img-overlay d-flex align-items-center p-3 p-sm-4\"><div class=\"w-100 mt-auto\">
												<!-- Card category ------->	<a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"badge bg_$tema mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a>
												<!-- Card title ---------->	<h2 class=\"text-white h1\"><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset\">$titulo</a></h2>
												<!-- Card resumo --------->	<p class=\"text-white\">$resumo</p>
												<!-- Card info ----------->	<ul class=\"nav nav-divider text-white-force align-items-center d-none d-sm-inline-block\">
													<li class=\"nav-item\">$data</li></ul></div></div></div>\n";		}	?></div>

	<!-- Right small cards --><div class="col-lg-6"><div class="row g-4">

		<!-- Card item START -->	<?php	$sql = "SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE id='$id2'";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
							while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
							echo 	"<div class=\"col-12\"><div class=\"card card-overlay-bottom card-grid-sm card-bg-scale\" style=\"background-image:url(https://www.canalicara.com/imgtemp/?largura=700&altura=350&arquivo=$img); background-position: center left; background-size: cover;\">
								<!-- Card Image overlay -->	<div class=\"card-img-overlay d-flex align-items-center p-3 p-sm-4\"><div class=\"w-100 mt-auto\">
								<!-- Card category ------->	<a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"badge bg_$tema  mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a>
								<!-- Card title ---------->	<h4 class=\"text-white\"><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset\">$titulo</a></h4>
								<!-- Card info ----------->	<ul class=\"nav nav-divider text-white-force align-items-center d-none d-sm-inline-block\">
													<li class=\"nav-item\">$data</li></ul></div></div></div></div>\n";		}	?>

		<!-- Card item START -->	<?php	$sql = "SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE id='$id3' OR id='$id4' ORDER BY RAND() LIMIT 2";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
							while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
							echo 	"<div class=\"col-md-6\">	<div class=\"card card-overlay-bottom card-grid-sm card-bg-scale\" style=\"background-image:url(https://www.canalicara.com/imgtemp/?largura=700&altura=350&arquivo=$img); background-position: center left; background-size: cover;\">
								<!-- Card Image overlay -->	<div class=\"card-img-overlay d-flex align-items-center p-3 p-sm-4\"><div class=\"w-100 mt-auto\">
								<!-- Card category ------->	<a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"badge bg_$tema mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a>
								<!-- Card title ---------->	<h4 class=\"text-white\"><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset\">$titulo</a></h4>
								<!-- Card info ----------->	<ul class=\"nav nav-divider text-white-force align-items-center d-none d-sm-inline-block\">
													<li class=\"nav-item\">$data</li></ul></div></div></div></div>\n";		}	?>

		</div></div>
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


			<!-- Card item START -->	<?php	$sql = "SELECT id, titulo, tema, imagem, resumo, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND NOT id='$id1' AND NOT id='$id2' AND NOT id='$id3' AND NOT id='$id4' ORDER BY pdate DESC LIMIT 6";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
							while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
							echo 	"<div class=\"col-sm-6\"><div class=\"card\">
							<!-- Card img -->	<div class=\"position-relative\"><img class=\"card-img\" src=\"https://www.canalicara.com/imgtemp/?largura=700&altura=450&arquivo=$img\" alt=\"Card image\">
										<div class=\"card-img-overlay d-flex align-items-start flex-column p-3\"><div class=\"w-100 mt-auto\">
							<!-- Card category -->	<a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"badge bg_$tema  mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a></div></div></div>

							<div class=\"card-body px-0 pt-3\">	<h4 class=\"card-title mt-2\"><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-reset fw-bold\">$titulo</a></h4>
												<p class=\"card-text\">$resumo</p>
								<!-- Card info -->		<ul class=\"nav nav-divider align-items-center d-none d-sm-inline-block\">
													<li class=\"nav-item\">$data</li></ul></div>

						</div></div>\n";		}	?>

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

						<!-- BANNER START --><div class="col-12 col-sm-12 col-lg-12 my-4"><?php include "pagesconfig_banners_start.php";	?></div>

						<!-- BLOGOSFERA --><div class="row"><div class="col-12 col-sm-6 col-lg-12">
							<h4 class="mt-4 mb-3"><i class="bi bi-globe"></i> BLOGOSFERA</h4>

							<!-- Recent post item -->	<?php	$sql = "SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND blog!='' ORDER BY pdate DESC LIMIT 3";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
											while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
											echo 	"<div class=\"card mb-3\"><div class=\"row g-3\">
												<div class=\"col-4\"><img class=\"rounded\" src=\"https://www.canalicara.com/imgtemp/?largura=700&altura=450&arquivo=$img\" alt=\"\"></div>
												<div class=\"col-8\"><h6><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset fw-bold\">$titulo</a></h6>
												<div class=\"small mt-1\">$data</div>
												</div></div></div>\n";		}	?>

						</div></div>

						<!-- BANNER EXPT 2 --><div class="col-12 col-sm-6 col-lg-12 my-4"><?php include "pagesconfig_banners_expert.php";	?></div>

						<!-- VAGAS DE TRABALHO --><div class="row"><div class="col-12 col-sm-6 col-lg-12">
							<h4 class="mt-4 mb-3"><i class="bi bi-list-stars"></i> OPORTUNIDADES</h4>

							<!-- Recent post item -->	<?php	$sql = "SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND especial='trabalho-e-emprego' ORDER BY pdate DESC LIMIT 3";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
											while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
											echo 	"<div class=\"card mb-3\"><div class=\"row g-3\">
												<div class=\"col-4\"><img class=\"rounded\" src=\"https://www.canalicara.com/imgtemp/?largura=700&altura=450&arquivo=$img\" alt=\"\"></div>
												<div class=\"col-8\"><h6><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link stretched-link text-reset fw-bold\">$titulo</a></h6>
												<div class=\"small mt-1\">$data</div>
												</div></div></div>\n";		}	?>

						</div></div>

						<!-- BANNER EXPT 2 --><div class="col-12 col-sm-6 col-lg-12 my-4"><?php include "pagesconfig_banners_expert.php";	?></div>
	
					</div>
				</div>
			</div>
			<!-- Sidebar END -->
		</div> <!-- Row end -->
	</div>
</section>
<!-- =======================
Main content END -->

<!-- Divider -->
<div class="container"><div class="border-bottom border-primary border-2 opacity-1"></div></div>

<!-- ======================= Featured video START -->
<section class="bg-dark">
	<div class="container"><div class="row">
			<!-- Title -->	<div class="col-md-12">
						<div class="mb-4 d-sm-flex justify-content-between align-items-center">
							<h2 class="m-sm-0 text-white"><i class="bi bi-camera-video me-2"></i>Vídeos</h2>
							<a href="https://www.youtube.com/portalcanalicara" class="btn btn-sm bg-youtube" target=_blank><i class="bi bi-youtube me-2 align-middle"></i>YouTube</a></div></div>


			<!-- Card big START -->	<?php	$sql = "SELECT id, titulo, tema, imagem, video_youtube, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND video_youtube!='' ORDER BY pdate DESC LIMIT 1";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
							while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
							echo 	"<div class=\"col-lg-6\"><div class=\"card card-overlay-bottom card-fold h-400 h-lg-540\" style=\"background-image:url(https://www.canalicara.com/imgtemp/?largura=700&altura=450&arquivo=$img); background-position: center left; background-size: cover;\">
								<!-- Card featured -->		<span class=\"card-featured\" title=\"Featured post\"><i class=\"fas fa-star\"></i></span>
								<!-- Card Image overlay -->	<div class=\"card-img-overlay d-flex flex-column p-3 p-sm-5\">
								<!-- Card play button -->	<div class=\"position-absolute top-50 start-50 translate-middle pb-5\">
								<!-- Popup video -->		<a href=\"https://youtu.be/$video_youtube\" class=\"icon-lg bg-primary d-block text-white rounded-circle\" data-glightbox data-gallery=\"y-video\">&nbsp;<i class=\"bi bi-play-btn\"></i>&nbsp;</a></div>
								<!-- Card overlay Bottom  -->	<div class=\"w-100 mt-auto\">
												<div class=\"col text-center\">
													<!-- Card category -->	<a href=\"#\" class=\"badge bg_$tema mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>$tema</a>
													<!-- Card title -->	<h2 class=\"text-white\"><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-reset fw-normal\">$titulo</a></h2>
							</div></div></div></div></div>\n";		}	?>

			<!-- Card small START --><div class="col-lg-3 mt-4 mt-lg-0">

				<!-- Card item START --><?php	$sql = "SELECT id, titulo, tema, imagem, video_youtube, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND video_youtube!='' ORDER BY pdate DESC LIMIT 1,2";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
							while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
							echo 	"<div class=\"card bg-transparent overflow-hidden mb-4\">
								<!-- Card img -->		<div class=\"position-relative rounded-3 overflow-hidden\">
								<!-- Video -->			<div class=\"card-image\"><div class=\"overflow-hidden w-100\">
								<!-- HTML video START -->	<div class=\"player-wrapper rounded-3 overflow-hidden\"><div class=\"player-youtube\" ><iframe src=\"https://www.youtube.com/embed/$video_youtube\"></iframe></div></div></div></div></div>
								<!-- Card titulo -->		<div class=\"card-body px-0 pt-3\"><h5 class=\"card-title\"><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-white fw-bold\">$titulo</a></h5>
								<!-- Card info -->		<ul class=\"nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6\">
													<li class=\"nav-item\">$data</li></ul></div></div>\n";		}	?>

			</div><div class="col-lg-3">

				<!-- Card item START --><?php	$sql = "SELECT id, titulo, tema, imagem, video_youtube, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND video_youtube!='' ORDER BY pdate DESC LIMIT 3,2";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
							while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
							echo 	"<div class=\"card bg-transparent overflow-hidden mb-4\">
								<!-- Card img -->		<div class=\"position-relative rounded-3 overflow-hidden\">
								<!-- Video -->			<div class=\"card-image\"><div class=\"overflow-hidden w-100\">
								<!-- HTML video START -->	<div class=\"player-wrapper rounded-3 overflow-hidden\"><div class=\"player-youtube\" ><iframe src=\"https://www.youtube.com/embed/$video_youtube\"></iframe></div></div></div></div></div>
								<!-- Card titulo -->		<div class=\"card-body px-0 pt-3\"><h5 class=\"card-title\"><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-white fw-bold\">$titulo</a></h5>
								<!-- Card info -->		<ul class=\"nav nav-divider align-items-center d-none d-sm-inline-block text-white-force small opacity-6\">
													<li class=\"nav-item\">$data</li></ul></div></div>\n";		}	?>

			</div><!-- Card small END -->

</div></div></section>
<!-- ======================= Featured video END -->


<!-- ======================= EMPREENDA MAIS -->
<section class="pt-4">
	<div class="container"  style="margin-top:50px;"><div class="row"><div class="col-md-12">
	<!-- Title -->	<div class="mb-4 d-md-flex justify-content-between align-items-center"><h2 class="m-0"><i class="bi bi-chat-right-text"></i> Empreenda Mais</h2>
			<a href="https://www.canalicara.com/especial/empreenda-mais/" class="text-body small"><u>Aproveite muito conteúdo para o seu desenvolvimento!</u></a></div>

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
				<!-- Card item START --><?php	$sql = "SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND especial='empreenda-mais' ORDER BY pdate DESC LIMIT 10";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
							while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
							echo 	"<div class=\"card\">
								<!-- Card img -->	<div class=\"position-relative\"><img class=\"card-img\" src=\"https://www.canalicara.com/imgtemp/?largura=700&altura=400&arquivo=$img\" alt=\"Card image\">
											<div class=\"card-img-overlay d-flex align-items-start flex-column p-3\"></div></div>
								<!-- Card title -->	<div class=\"card-body px-0 pt-3\"><h5 class=\"card-title\"><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-reset fw-bold\">$titulo</a></h5>
								<!-- Card date -->	<ul class=\"nav nav-divider align-items-center d-none d-sm-inline-block\"><li class=\"nav-item\">$data</li></ul></div></div>\n";		}	?>

	</div></div></div></div></div></section>

<!-- **************** INDICADORES **************** -->

<section class="pt-1">
	<div class="container" style="margin-top:50px;">
		<div class="row">
			<div class="col-md-12">
<!-- Title -->	<div class="mb-4 d-md-flex justify-content-between align-items-center"><h2 class="m-0"><i class="bi bi-graph-up-arrow"></i> Indicadores de Içara</h2></div>
				<div class="row g-4 pb-4">

     			<!-- Card item START --><?php	$sql = "SELECT id, titulo, tema, imagem, DATE_FORMAT(pdate, '%d/%m | %H:%i') as date FROM noticias WHERE pdate <= NOW() AND especial='indicadores-de-icara' ORDER BY pdate DESC LIMIT 4";		$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());
							while ($row = mysqli_fetch_array($res))	{	$titulo = $row['titulo'];	$URL = seoUrl($titulo);	$resumo = $row['resumo'];	$data = $row['date'];	$texto = $row['texto'];	$tema = $row['tema'];	$URL_tema = seoUrl($tema);	$imagem = $row['imagem'];	$img=substr($imagem, 26);	$video_youtube = $row['video_youtube'];
							echo 	"<div class=\"col-sm-6 col-lg-3\"><div class=\"card card-overlay-bottom card-img-scale\">
								<!-- Card Image -->		<img class=\"card-img\" src=\"https://www.canalicara.com/imgtemp/?largura=500&altura=500&arquivo=$img\" alt=\"\">
								<!-- Card Image overlay -->	<div class=\"card-img-overlay d-flex flex-column p-3 p-sm-4\"><div></div>
       								<!-- Card title -->		<div class=\"w-100 mt-auto\"><h4 class=\"text-white\"><a href=\"https://www.canalicara.com/$URL_tema/$URL-{$row['id']}.html\" class=\"btn-link text-reset stretched-link\">$titulo</a></h4>
        							<!-- Card info -->		<ul class=\"nav nav-divider text-white-force align-items-center d-none d-sm-inline-block small\">
													<li class=\"nav-item\">$data</li></ul></div></div></div></div>\n";		}	?>
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
									echo 	"<h3><div class=\"ms-3\"><h3> {$row['titulo']} empregos</h3>
											<h6 class=\"mb-0\">[até {$row['texto']}]</h6></div>";	}	?>
							
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
								$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM cidade_indicadores WHERE categoria = 'Empresas' ORDER BY id DESC LIMIT 1";
								$sql = MySql::connect()->prepare($query);
								$sql->execute();
								if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
								else{ $result = $sql->fetchAll(); }
									foreach($result as $key => $row){
									echo 	"<h3><div class=\"ms-3\"><h3> {$row['titulo']} empresas</h3>
											<h6 class=\"mb-0\">[até {$row['texto']}]</h6></div>";	}	?>
							
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
									echo 	"<h3><div class=\"ms-3\"><h3> US$ {$row['titulo']} </h3>
											<h6 class=\"mb-0\">Balança Comercial [até {$row['texto']}]</h6></div>";	}	?>
							
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
									echo 	"<h3><div class=\"ms-3\"><h3> {$row['titulo']} IDEB</h3>
											<h6 class=\"mb-0\">5ª ano [{$row['texto']}]</h6></div>";	}	?>
							
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
									echo 	"<h3><div class=\"ms-3\"><h3> {$row['titulo']} IDEB</h3>
											<h6 class=\"mb-0\">9ª ano [{$row['texto']}]</h6></div>";	}	?>
							
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
									echo 	"<h3><div class=\"ms-3\"><h3> {$row['titulo']} IDEB</h3>
											<h6 class=\"mb-0\">Ensino Médio [{$row['texto']}]</h6></div>";	}	?>
							
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
									echo 	"<h3><div class=\"ms-3\"><h3> {$row['titulo']} IDHM</h3>
											<h6 class=\"mb-0\">[{$row['texto']}]</h6></div>";	}	?>
							
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
									echo 	"<h3><div class=\"ms-3\"><h3>R$ {$row['titulo']} PIB</h3>
											<h6 class=\"mb-0\">Per capita [{$row['texto']}]</h6></div>";	}	?>
							
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
									echo 	"<h3><div class=\"ms-3\"><h3> {$row['titulo']} pessoas</h3>
											<h6 class=\"mb-0\">[{$row['texto']}]</h6></div>";	}	?>
							
								</div>
							</div>
						</div>
					</div>


 		</div>
 		<hr>
 	</div>
 </section>

 </main>


<?php	include "2023_pagesconfig_layout_rodape.php";	?>


<!-- Back to top --><div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<? 	//JS libraries, plugins and custom scripts 		?>
<? 	//Bootstrap JS 		?><script src="https://www.canalicara.com/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<? 	//JS.SCRIPTS 		?><script src="https://www.canalicara.com/assets/scripts.js"></script>
<? 	//JS.vendors 		?><script src="https://www.canalicara.com/assets/vendor/tiny-slider/tiny-slider.js"></script>
<? 	//JS.vendors 		?><script src="https://www.canalicara.com/assets/vendor/sticky-js/sticky.min.js"></script>
<? 	//JS.vendors 		?><script src="https://www.canalicara.com/assets/vendor/glightbox/js/glightbox.js"></script>
<? 	//JS.vendors 		?><script src="https://www.canalicara.com/assets/vendor/plyr/plyr.js"></script>
<? 	//JS.template.functions	?><script src="https://www.canalicara.com/assets/js/functions.js"></script>
</body></html>