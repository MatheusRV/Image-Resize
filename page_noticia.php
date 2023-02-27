<?php	header('Content-type: text/html; charset=iso-8859-1');
	//include_once "2023_pagesconfig_functions.php";									// Funções
	//include_once "portal_config_bdconnect.php";											// Conexão com o banco de dados mySQLi
	require_once "config.php"; 															// Conexão com o banco de dados PDO

	$news = addslashes(htmlspecialchars($_GET["news"]));
	$sql = "UPDATE noticias SET cont=cont+1, pdate = pdate  WHERE id='$news'";				$res = mysqli_query($conn, $sql) or die("Ops: " . mysqli_error());	
	$sql = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y | %H:%i') as date FROM noticias WHERE id='$news'";	$res = mysqli_query($conn, $sql) or die ("Ops: $sql. " .mysqli_error());		if(mysqli_num_rows($res) >0)			{
		$row = mysqli_fetch_object($res);	$rowcanal = "$row->tema";	$rowcoments = "$row->id";	$rowid = "$row->id";	$rowtitulo = "$row->titulo";	$rowresumo = "$row->resumo";	$rowtema = "$row->tema";	$rowespecial = "$row->especial";	$rowagencia = "$row->agencia";	$rowblog = "$row->blog";	$rowautor = "$row->autor";	$rowimagem = "$row->imagem";	$rowimg=substr($rowimagem, 26);	$rowimagem_autor = "$row->imagem_autor";	$rowimagem_exibicao = "$row->imagem_exibicao";	$rowimagemfb=substr($rowimagem, 26);	$rowtexto = "$row->texto";	$rowtext = cortar_texto($texto,"150","...");	$rowatualizacao = "$row->atualizacao";	$rowendereco = seoUrl($rowtitulo);	$roweditoria = seoUrl($rowtema);	$rowgaleria = "$row->galeria"; $rowdate = "$row->date";
	?>

<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="pt-br">
<!--[if IE 9]><html class="lt-ie10" lang="pt-br" > <![endif]-->
<HEAD><title><?php echo $row->titulo; ?> - Canal Içara</title>

<?php 	//META TAGS 		?>
	<META charset=iso-8859-1>
	<META HTTP-EQUIV="REFRESH" CONTENT="3600">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="expires" content="0" />
	<link href="https://www.canalicara.com/<?php echo $rowimg; ?>" rel="image_src" />
	<link rel="canonical" href="ttps://www.canalicara.com/<?php echo $roweditoria; ?>/<?php echo $rowendereco; ?>-<?php echo $rowcoments; ?>.html"/>
	<meta property="og:locale" content="pt_BR"/>
	<meta property="og:type" content="article"/>
	<meta property="og:title" content="<?php echo $row->titulo; ?>" />
	<meta property="og:description" content="<?php echo $rowresumo; ?>" />
	<meta property="og:url" content="https://www.canalicara.com/<?php echo $roweditoria; ?>/<?php echo $rowendereco; ?>-<?php echo $rowcoments; ?>.html" />
	<meta property="og:site_name" content="Canal Içara" />
	<meta property="article:publisher" content="https://www.facebook.com/portalcanalicara"/>
	<meta property="article:section" content="<?php echo $rowtema; ?>" />
	<meta property="article:published_time" content="<?php echo $row->pdate; ?>" />
	<meta property="fb:app_id" content="161408190577760"/>
	<meta property="og:image" content="https://www.canalicara.com/<?php echo $rowimg; ?>" />
	<meta property="og:image:width" content="1000"/>
	<meta property="og:image:height" content="500"/>
	<meta property="og:image:secure_url" content="https://www.canalicara.com/<?php echo $rowimg; ?>"/>

	<meta name="description" content="<?php echo $resumo; ?>" />
	<meta name="keywords" content="içara, notícias, internet, canal, portal, içarense, jornalismo, esporte, economia, educação, política, saúde, segurança, tecnologia, trânsito, cultura, entretenimento, festas, vídeos" />
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
	<meta name="copyright" content="Copyright (c) by Canalicara.com" />
	<meta name="ROBOS"content="INDEX,FOLLOW" />
	<meta name="revisit-after" content="7 Days" />
	<meta http-equiv="expires" content="0" />

<?php 	//Favicon 		?><link rel="shortcut icon" href="https://www.canalicara.com/assets/images/favicon.ico">
<?php 	//Google Font	?><link rel="preconnect" href="https://fonts.gstatic.com">
<?php 	//Google Font	?><link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
<?php 	//Plugins CSS ?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/font-awesome/css/all.min.css">
<?php 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/bootstrap-icons/bootstrap-icons.css">
<?php 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/tiny-slider/tiny-slider.css">
<?php 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/glightbox/css/glightbox.css">
<?php 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/plyr/plyr.css">
<?php 	//Theme CSS 	?><link id="style-switch" rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/css/style.css">
<?php 	//Padrão CSS	?><link rel="stylesheet" type="text/css" media="screen" href="https://www.canalicara.com/assets/padrao.css" />

</head><body>

<?php	include "2023_pagesconfig_layout_topo.php";		//CABEÇALHO
			include "2023_pagesconfig_scripts.php";				//SCRIPTS			?>



<?php  //Inner intro START ?>
<section class="container bg-dark-overlay-4" style="background-image:url(https://www.canalicara.com/<?php echo $rowimg ?>); background-position: center left; background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 py-md-5 ms-3 my-lg-5">
        <a href="#" class="badge bg_<?php	echo	$rowtema;	?> mb-2"><i class="fas fa-circle me-2 small fw-bold"></i><?php	echo	$rowtema;	?></a>
				<h1 class="text-white"><?php	echo	$rowtitulo;	?></h1>
        <p class="lead text-white"><?php	echo	$rowresumo;	?></p>
        <!-- Info -->
        <ul class="nav nav-divider text-white-force align-items-center">
          <li class="nav-item"><div class="nav-link"><div class="d-flex align-items-center text-white position-relative"><a href="#" class="stretched-link text-reset btn-link"><?php	echo	$rowautor;	?></a></div></div></li>
          <li class="nav-item"><?php	echo	$rowdate;	?></li>
          <li class="nav-item"><?php echo $rowatualizacao; ?></li>
        </ul>
        <!-- Share post -->
        <div class="d-md-flex align-items-center mt-4">
          <h5 class="text-white me-3">Compartilhar: </h5>
					<ul class="nav text-white-force">
						<li class="nav-item"><a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg_Esportes" href="whatsapp://send?text=*<?php echo $rowtitulo; ?>*+Veja+mais+em+https://www.canalicara.com/shortlink/<?php echo $rowcoments; ?>.html"><i class="fs-1 bi-whatsapp align-middle"></i></a></li>
						<li class="nav-item"><div class="fb-like" data-href="https://www.canalicara.com/<?php echo $roweditoria; ?>/<?php echo $rowendereco; ?>-<?php echo $rowcoments; ?>.html" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div></li>
					</ul>
        </div>
      </div>
    </div>
	</div>
</section>

<?php  //Inner intro END ?>

<?php include "pagesconfig_banners_premium.php";	 		//BANNER PREMIUM			?>

<?php  //MAIN CONTENT START ?>

<main>
<section>
	<div class="container position-relative" data-sticky-container>
		<div class="row">
			<div class="col-lg-9 mb-5" align=left><p><?php	echo nl2br($rowtexto)	?></p>

	<?php //GALERIAS
		$sql_galeria = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y às %Hh%imin') as date FROM noticias_galerias WHERE id='$rowgaleria' AND NOT id=''";
			$res_galeria = mysqli_query($conn, $sql_galeria) or die ("Ops: $sql_galeria. " .mysqli_error());	
				if(mysqli_num_rows($res_galeria) >0)		{		$row = mysqli_fetch_object($res_galeria);
					{	$autorimg = "$row->autor";	$pasta = "$row->pasta";	$dir = "upload/photos/$pasta/";	$i=0;	foreach (glob ($dir."*.jpg") as $arquivo)
						{	$a[$i] = $arquivo;	$i++;	$photos = count($a);	}
			echo "<div class=\"text-center h5 mb-4\" style=\"margin-top:50px;\"><i class=\"text-success fa-fw bi bi-camera-fill me-2\"></i> Confira mais $photos imagens</div>\n";
			echo "<div class=\"row\">\n";
				$contend1 = $photos-3;	while ($photos >= 2)	{	echo "<div class=\"col-4 mb-4\"><a href=\"https://www.canalicara.com/upload/photos/$pasta/$photos.jpg\" data-glightbox data-gallery=\"image-popup\"><img class=\"rounded\" src=\"https://www.canalicara.com/upload/photos/$pasta/$photos.jpg\" alt=\"$titulo ($autorimg)\"></a></div>\n"; $photos--;	if($photos==$contend1)	{	break;	}	}
				$contend2 = $photos-=0;	while ($photos >= 2)	{	echo "<a href=\"https://www.canalicara.com/upload/photos/$pasta/$photos.jpg\" data-glightbox data-gallery=\"image-popup\"></a>"; $photos--;	if($photos==$contend2)	{	break;	}	}	}
			echo "</DIV>\n";	}	?>

	<?php //FACEBOOK ?>
				<div class="card card-body border p-3">
					<div class="fb-comments" data-href="https://www.canalicara.com/<?php echo $roweditoria; ?>/<?php echo $rowendereco; ?>-<?php echo $rowcoments; ?>.html" data-width="100%" data-numposts="5"></div>
				</div>

			</div>

<?php //PUBLICIDADE ?>
			<div class="col-lg-3">
				<div data-sticky data-margin-top="80" data-sticky-for="991">
					<?php include "pagesconfig_banners_expert.php";	 	//BANNER EXPT 1				?>
					<?php include "pagesconfig_banners_expert.php";	 	//BANNER EXPT 2				?>
					<?php include "pagesconfig_banners_start.php";	 	//BANNER EXPT START		?>
				</div>
			</div>

		</div>
	</div>
</section>
</main>
		<?php  //MAIN CONTENT END ?>

<?php		}
		include "2023_pagesconfig_layout_rodape.php";	 		//RODAPÉ			?>


<?php //Back to top ?><div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<?php 	//JS libraries, plugins and custom scripts 		?>
<?php 	//Bootstrap JS 					?><script src="https://www.canalicara.com/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<?php 	//JS.SCRIPTS 						?><script src="https://www.canalicara.com/assets/scripts.js"></script>
<?php 	//JS.vendors 						?><script src="https://www.canalicara.com/assets/vendor/tiny-slider/tiny-slider.js"></script>
<?php 	//JS.vendors 						?><script src="https://www.canalicara.com/assets/vendor/sticky-js/sticky.min.js"></script>
<?php 	//JS.vendors 						?><script src="https://www.canalicara.com/assets/vendor/glightbox/js/glightbox.js"></script>
<?php 	//JS.vendors 						?><script src="https://www.canalicara.com/assets/vendor/plyr/plyr.js"></script>
<?php 	//JS.template.functions	?><script src="https://www.canalicara.com/assets/js/functions.js"></script>
</body></html>