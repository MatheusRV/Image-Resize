<?php	
	header('Content-type: text/html; charset=iso-8859-1');
	//require "portal_autenticacao.php";						// Verificador de sessão
	require("config.php"); 							// Conexão com o banco de dados	?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Canal Içara - curta essa cidade</title>

	<!-- Meta Tags -->
	<META charset=iso-8859-1>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="canalicara.com">

<?php 	//Favicon 		?><link rel="shortcut icon" href="https://www.canalicara.com/assets/images/favicon.ico">
<?php 	//Google Font	?><link rel="preconnect" href="https://fonts.gstatic.com">
<?php 	//Google Font	?><link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
<?php 	//Plugins CSS 	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/font-awesome/css/all.min.css">
<?php 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/bootstrap-icons/bootstrap-icons.css">
<?php 	//Theme CSS 	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/apexcharts/css/apexcharts.css">
<?php 	//Theme CSS 	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/quill/css/quill.snow.css">
<?php 	//Theme CSS 	?><link id="style-switch" rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/css/style.css">
<?php 	//Padrão CSS	?><link rel="stylesheet" type="text/css" media="screen" href="https://www.canalicara.com/assets/padrao.css" />


</head>

<body>

<!-- =======================
Header START -->
<header class="navbar-light navbar-sticky header-static border-bottom navbar-dashboard">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand me-3" href="https://www.canalicara.com/">
				<img class="navbar-brand-item light-mode-item" style="height: 65px;" src="https://www.canalicara.com/assets/images/logo.svg" alt="logo">			
				<img class="navbar-brand-item dark-mode-item" style="height: 65px;" src="https://www.canalicara.com/assets/images/logo-light.svg" alt="logo">			
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="text-body h6 d-none d-sm-inline-block">Menu</span>
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Main navbar START -->
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav navbar-nav-scroll mx-auto">

					<!-- Nav item 1 Demos -->
					<li class="nav-item"><a class="nav-link" href="portal_admin.php"><i class="bi bi-house-door me-1"></i>Dashboard</a></li>

					<!-- Nav item 2 Post -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="portal_admin.php?adicionarnews" id="postMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pencil me-1"></i>Post</a>
						<ul class="dropdown-menu" aria-labelledby="postMenu">
							<li> <a class="dropdown-item" href="portal_admin.php?action=adicionarnews"><i class="text-info fa-fw bi bi-file-earmark-plus me-2"></i> Adicionar</a> </li>
							<li> <a class="dropdown-item" href="portal_admin.php?action=mostrarnews"><i class="text-warning fa-fw bi bi-pencil-square me-2"></i>Editar</a> </li></ul>
					</li>

					<!-- Nav item 3 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-folder me-1"></i>Pages</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
							<li> <a class="dropdown-item" href="dashboard-author-list.html">Author List</a></li>
							<li> <a class="dropdown-item" href="dashboard-author-single.html">Author Single</a></li>
							<li> <a class="dropdown-item" href="dashboard-edit-profile.html">Edit Profile</a></li>
							<li> <a class="dropdown-item" href="dashboard-reviews.html">Reviews</a></li>
							<li> <a class="dropdown-item" href="dashboard-settings.html">Settings</a></li>
							<li class="dropdown-divider"></li>
							<li> <a class="dropdown-item" href="https://support.webestica.com/" target="_blank"> <i class="text-warning fa-fw bi bi-life-preserver me-2"></i>Support</a></li>
							<li> <a class="dropdown-item" href="docs/index.html" target="_blank"> <i class="text-danger fa-fw bi bi-card-text me-2"></i>Documentation</a></li>
							<li class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="https://blogzine.webestica.com/rtl" target="_blank"> <i class="text-info fa-fw bi bi-toggle-off me-2"></i>RTL demo</a></li>
							<li><a class="dropdown-item" href="https://themes.getbootstrap.com/store/webestica/" target="_blank"> <i class="text-success fa-fw bi bi-cloud-download-fill me-2"></i>Buy blogzine!</a> </li>
						</ul>
					</li>
				</ul>
				
				<!-- Search dropdown START -->
				<div class="nav my-3 my-xl-0 px-4 px-lg-1 flex-nowrap align-items-center">
					<div class="nav-item w-100">
						<form class="position-relative">
							<input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
							<button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
						</form>
					</div>
				</div>
				<!-- Search dropdown END -->
			</div>
			<!-- Main navbar END -->

			<!-- Nav right START -->
			<div class="nav flex-nowrap align-items-center">

				<!-- Profile dropdown START -->
				<div class="nav-item ms-2 ms-md-3 dropdown">
					<!-- Avatar -->
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fa bi-person-circle fs-1 dark"></i>
					</a>

					<!-- Profile dropdown START -->
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<div><a class="h6 mt-2 mt-sm-0" href="#"><?php echo $_SESSION["nome_usuario"] ?></a></div>
							</div>
							<hr>
						</li>
						<!-- Links -->
						<li><a class="dropdown-item" href="portal_admin.php?action=usuario"><i class="bi bi-person fa-fw me-2"></i>Editar perfil</a></li>
						<li><a class="dropdown-item" href="portal_logout.php"><i class="bi bi-power fa-fw me-2"></i>Sair</a></li>
						<li class="dropdown-divider mb-3"></li>
						<li>
							<div class="dropdown-item">
								<div class="modeswitch m-0" id="darkModeSwitch">
									<div class="switch"></div>
								</div>
							</div>
						</li>
					</ul>
					<!-- Profile dropdown END -->
				</div>
				<!-- Profile dropdown END -->

			<!-- Nav right END -->
			</div>
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>


<div class="small-12 columns"><?php	include("portal_comandos.php");	?></DIV>


</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer class="mb-3">
	<div class="container">
		<div class="card card-body bg-light">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<!-- Copyright -->
					<div class="text-center text-lg-start">©2022 <a href="https://www.webestica.com/" class="text-reset btn-link" target="_blank">Webestica</a>. All rights reserved
					</div>
				</div>
				<div class="col-lg-6 d-sm-flex align-items-center justify-content-center justify-content-lg-end">
					<!-- Language switcher -->
					<div class="dropup me-0 me-sm-3 mt-3 mt-md-0 text-center text-sm-end">
						<a class="dropdown-toggle text-body" href="#" role="button" id="languageSwitcher" data-bs-toggle="dropdown" aria-expanded="false">
							English Edition
						</a>
						<ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
							<li><a class="dropdown-item" href="#">English</a></li>
							<li><a class="dropdown-item" href="#">German </a></li>
							<li><a class="dropdown-item" href="#">French</a></li>
						</ul>
					</div>
					<!-- Links -->
					<ul class="nav text-center text-sm-end justify-content-center justify-content-center mt-3 mt-md-0">
						<li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
						<li class="nav-item"><a class="nav-link pe-0" href="#">Cookies</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="https://www.canalicara.com/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="https://www.canalicara.com/assets/vendor/apexcharts/js/apexcharts.min.js"></script>
<script src="https://www.canalicara.com/assets/vendor/quill/js/quill.min.js"></script>

<!-- Template Functions -->
<script src="https://www.canalicara.com/assets/js/functions.js"></script>

</body>
</html>