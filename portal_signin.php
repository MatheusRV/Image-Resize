<!DOCTYPE html>
<html lang="en">
<head>
	<title>Canal Içara - curta essa cidade!</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="canalicara.com">
	<meta name="description" content="Içara - curta essa cidade!">

<?php 	//Favicon 		?><link rel="shortcut icon" href="https://www.canalicara.com/assets/images/favicon.ico">
<?php 	//Google Font	?><link rel="preconnect" href="https://fonts.gstatic.com">
<?php 	//Google Font	?><link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
<?php 	//Plugins CSS 	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/font-awesome/css/all.min.css">
<?php 	//Plugins CSS	?><link rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/vendor/bootstrap-icons/bootstrap-icons.css">
<?php 	//Theme CSS 	?><link id="style-switch" rel="stylesheet" type="text/css" href="https://www.canalicara.com/assets/css/style.css">

</head>

<body>

<!-- =======================
Header START -->
<header class="navbar-light navbar-sticky header-static">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="https://www.canalicara.com/">
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
				<ul class="navbar-nav navbar-nav-scroll ms-auto">
					
					<!-- Nav item 1 Demos -->
					<li class="nav-item"><a class="nav-link" href="https://www.canalicara.com/"><i class="bi bi-house-door me-1"></i>Home</a></li>

					<!-- Nav item 2 Pages -->
					<li class="nav-item"><a class="nav-link" href="https://www.canalicara.com/_instagram.php"><i class="bi bi-instagram me-1"></i>Insta</a></li>

					<!-- Nav item 5 link-->
					<li class="nav-item"> <a class="nav-link" href="dashboard.html">Dashboard</a></li>
				</ul>
			</div>
			<!-- Main navbar END -->

			<!-- Nav right START -->
			<div class="nav ms-sm-3 flex-nowrap align-items-center">
				<!-- Dark mode switch -->
				<div class="nav-item">
					<div class="modeswitch" id="darkModeSwitch">
						<div class="switch"></div>
					</div>
				</div>
				<!-- Nav additional link -->
				<div class="nav-item dropdown dropdown-toggle-icon-none">
					<a class="nav-link dropdown-toggle" role="button" href="#" id="navAdditionalLink" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots fs-4"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded text-end" aria-labelledby="navAdditionalLink">
						<li><a class="dropdown-item fw-normal" href="#">About</a></li>
						<li><a class="dropdown-item fw-normal" href="#">Newsletter</a></li>
						<li><a class="dropdown-item fw-normal" href="#">Author</a></li>
						<li><a class="dropdown-item fw-normal" href="#">#Tags</a></li>
						<li><a class="dropdown-item fw-normal" href="#">Contact</a></li>
						<li><a class="dropdown-item fw-normal" href="#"><span class="badge bg-danger me-2 align-middle">2 Job</span>Careers</a></li>
					</ul>
				</div>
				<!-- Nav Search -->
				<div class="nav-item dropdown nav-search dropdown-toggle-icon-none">
					<a class="nav-link pe-0 dropdown-toggle" role="button" href="#" id="navSearch" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-search fs-4"> </i>
					</a>
					<div class="dropdown-menu dropdown-menu-end shadow rounded p-2" aria-labelledby="navSearch">
					  <form class="input-group">
					    <input class="form-control border-success" type="search" placeholder="Search" aria-label="Search">
					    <button class="btn btn-success m-0" type="submit">Search</button>
					  </form>
					</div>
				</div>
			</div>
			<!-- Nav right END -->
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Inner intro START -->
<section>
	<div class="container">
		<div class="row">
      <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
        <div class="p-4 p-sm-5 bg-primary bg-opacity-10 rounded">
					<h2>Painel de controle!</h2>
					<!-- Form START -->
					<form class="mt-4" action="portal_logar.php" method="post"><fieldset>
						<!-- Email -->
						<div class="mb-3">
							<label class="form-label" for="exampleInputEmail1">Login</label>
							<input type="text" name="login" class="form-control" id="exampleInputEmail1" placeholder="login">
						</div>
						<!-- Password -->
						<div class="mb-3">
							<label class="form-label" for="exampleInputPassword1">Senha</label>
							<input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="*********">
						</div>
						<!-- Button -->
						<div class="row align-items-center">
							<div class="col-sm-4">
								<button type="submit" class="btn btn-success">Entrar</button>
							</div>
						</div>
					</fieldset></form>
					<!-- Form END -->
					<hr>
					<!-- Social-media btn -->
        </div>
      </div>
    </div>
	</div>
</section>
<!-- =======================
Inner intro END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<?php 	//JS libraries, plugins and custom scripts 		?>
<?php 	//Bootstrap JS 			?><script src="https://www.canalicara.com/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<?php 	//JS.template.functions	?><script src="https://www.canalicara.com/assets/js/functions.js"></script>


</body>
</html>