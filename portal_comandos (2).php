<?php

	if (strstr($_SERVER["PHP_SELF"], "/admin/"))  die ("<html><head><title>Error</title></head><body scroll=\"no\"><BR><BR><center><font face=\"Verdana\" size=\"1\">Acesso negado!</font></center></body></html>");

	include "2023_pagesconfig_functions.php";
	include "portal_config_bdconnect.php";

	function index()	{
		echo "<section class=\"py-4\">
						<div class=\"container\">
    					<div class=\"row pb-4\">
								<div class=\"col-12\"><h1 class=\"mb-0 h2\">Dashboard </h1></div>
							</div>";	?>

<!-- =======================
Main contain START -->
		<div class="row g-4">

			<div class="col-12">
				<!-- Counter START -->
				<div class="row g-4">
					
					<!-- Counter item -->
					<div class="col-sm-6 col-lg-3">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success"><i class="bi bi-image"></i></div>
								<!-- Content -->
								<div class="ms-3"><h3>

							<?php
								$result = Db::selectAll('noticias_galerias');
								$total = count($result);
								echo $total;	?>

							</h3><h6 class="mb-0">Galerias</h6></div>
							</div>
						</div>
					</div>

					<!-- Counter item -->
					<div class="col-sm-6 col-lg-3">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-primary bg-opacity-10 rounded-3 text-primary"><i class="bi bi-file-earmark-text-fill"></i></div>
								<!-- Content -->
								<div class="ms-3"><h3>

							<?php
								$result = Db::selectAll('noticias');
								$total = count($result);
								echo $total;	?>
									
								</h3><h6 class="mb-0">Posts</h6></div>
							</div>
						</div>
					</div>

					<!-- Counter item -->
					<div class="col-sm-6 col-lg-3">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-danger bg-opacity-10 rounded-3 text-danger"><i class="bi bi-suit-heart-fill"></i></div>
								<!-- Content -->
								<div class="ms-3"><h3>2150</h3><h6 class="mb-0">Likes</h6></div>
							</div>
						</div>
					</div>

					<!-- Counter item -->
					<div class="col-sm-6 col-lg-3">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-info bg-opacity-10 rounded-3 text-info"><i class="bi bi-bar-chart-line-fill"></i></div>
								<!-- Content -->
								<div class="ms-3"><h3>

							<?php
								$result = Db::selectAll('usersonline');
								$total = count($result);
								echo $total;	?>
									

								</h3><h6 class="mb-0">online</h6></div>
							</div>
						</div>
					</div>

				</div>
				<!-- Counter END -->
			</div>



			<div class="col-xl-8">

				<div class="col-12">
				<!-- Blog list table START -->
				<div class="card border bg-transparent rounded-3">
					<!-- Card header START -->
					<div class="card-header bg-transparent border-bottom p-3">
						<div class="d-sm-flex justify-content-between align-items-center">
							<h5 class="mb-2 mb-sm-0">Notícias</h5>
							<a href="https://www.canalicara.com/portal_admin.php?action=adicionarnews" class="btn btn-sm btn-primary mb-0">Adicionar</a>
						</div>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body">

						<!-- Blog list table START -->
						<div class="table-responsive border-0">
							<table class="table align-middle p-4 mb-0 table-hover table-shrink">
								<!-- Table head -->
								<thead class="table-dark">
									<tr>
										<th scope="col" class="border-0 rounded-start">Título</th>
										<th scope="col" class="border-0">Data</th>
										<th scope="col" class="border-0">Categoria</th>
										<th scope="col" class="border-0 rounded-end">Ação</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0">

<!-- Table item -->
				<?php
						$result = Db::selectLimited('noticias', 0, 10, 'id', 'DESC');
						foreach($result as $key => $row){
							$data=date('d/m/y', strtotime($row['pdate'])).' | '.date('H:i', strtotime($row['pdate']));
							echo "<tr>
										<td><h6 class=\"course-title mt-2 mt-md-0 mb-0\"><a href=\"{$_SERVER['PHP_SELF']}?action=editarnews&id={$row['id']}\">{$row['titulo']}</a></h6></td>
										<td>$data</td>
										<td><a href=\"#\" class=\"badge bg_{$row['tema']} mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>{$row['tema']}</a></td>
										<td><div class=\"d-flex gap-2\">
                        <a href=\"{$_SERVER['PHP_SELF']}?action=editarnews&id={$row['id']}\" class=\"btn btn-light btn-round mb-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Editar\"><i class=\"bi bi-pencil-square\"></i></a>
                        <a href=\"#\" class=\"btn btn-light btn-round mb-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Deletar\"><i class=\"bi bi-trash\"></i></a>
                        <a href=\"whatsapp://send?text=*{$row['titulo']}*+Veja+mais+em+https://www.canalicara.com/shortlink/{$row['id']}.html\" class=\"btn btn-light btn-round mb-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Compartilhar\"><i class=\"bi bi-whatsapp\"></i></a>
                      </div>
										</td>
									</tr>";
					}
				?>

								</tbody>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Blog list table END -->

						<!-- Pagination START -->
						<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
							<!-- Content -->
							<p class="mb-sm-0 text-center text-sm-start"></p>
							<!-- Pagination -->
							<nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
								<ul class="pagination pagination-sm pagination-bordered mb-0">
									<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Prev</a></li>
									<li class="page-item"><a class="page-link" href="https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina=0">1</a></li>
									<li class="page-item"><a class="page-link" href="https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina=1">2</a></li>
									<li class="page-item"><a class="page-link" href="https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina=2">3</a></li>
									<li class="page-item"><a class="page-link" href="https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina=3">4</a></li>
									<li class="page-item"><a class="page-link" href="https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina=4">...</a></li>
								</ul>
							</nav>
						</div>
						<!-- Pagination END -->
					</div>
				</div>
				<!-- Blog list table END -->

			</div>
</div>


			<div class="col-md-6 col-xxl-4">
				<!-- Latest blog START -->
				<div class="card border h-100">
					<!-- Card header -->
					<div class="card-header border-bottom p-3">
						<h5 class="card-header-title mb-0">Ranking (3 dias)</h5>
					</div>

					<!-- Card body START -->
					<div class="card-body p-3">

						<div class="row">


			<?php	
			$query = "SELECT id, titulo, tema, imagem, cont, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM noticias WHERE pdate between now() - INTERVAL 2 DAY and now() ORDER BY cont DESC LIMIT 5";
			$sql = MySql::connect()->prepare($query);
			$sql->execute();
			if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
			else{ $result = $sql->fetchAll(); }
						foreach($result as $key => $row){
							$data=date('d/m/y', strtotime($row['pdate'])).' | '.date('H:i', strtotime($row['pdate']));
							$img=substr($row['imagem'], 26);
							$URL_titulo = seoUrl($row['titulo']);	
							$URL_tema = seoUrl($row['tema']);
							echo "<div class=\"col-12\">
								<div class=\"d-flex align-items-center position-relative\">
									<img class=\"w-90 rounded\" src=\"https://www.canalicara.com/imgtemp/?largura=300&altura=300&arquivo=$img\" alt=\"product\">
									<div class=\"ms-3\">
										<p class=\"small mb-0\"><a href=\"#\" class=\"badge bg_{$row['tema']} mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>{$row['tema']}</a></p>
										<a href=\"https://www.canalicara.com/$URL_tema/$URL_titulo-{$row['id']}.html\" class=\"h6 stretched-link\" target=_blank>{$row['titulo']}</a>
										<p class=\"small mb-0\">$data  <i class=\"fas fa-eye small fw-bold\"></i> {$row['cont']}</p>
									</div>
								</div>
							</div>
					<hr class=\"my-3\">";
					}
				?>

						</div>
					</div>
					<!-- Card body END -->
				</div>
				<!-- Latest blog END -->
			</div>


	<!-- BANNERS PREMIUM -->
			<div class="col-md-6 col-xxl-4">
				<div class="card border h-100">

	<?php	$query = "SELECT * FROM banners WHERE data_inicial < now() AND data_final > now() AND categoria = 'Premium' ORDER BY titulo ASC";
			$sql = MySql::connect()->prepare($query);
			$sql->execute();
			if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
			else{ $result = $sql->fetchAll(); }

						foreach($result as $key => $row){	

							$resultados = $sql->rowCount();
							$cont = $row['cont'];							
							$data_atual=date_create(date('Y-m-d'));
							$data_inicial=date_create($row['date']);
							$diff=date_diff($data_atual,$data_inicial);
							$period = $diff->format("%a");
								if($period>0)			{	$periodo = $period;	}
								else if($period<=0)		{	$periodo = 1;	}
							$media = number_format(($cont)/($periodo),2);
							$total += $media;
						}

						$media_total = number_format(($total)/($resultados),2);

						echo "<!-- Card header -->
						<div class=\"card-header bg-transparent border-bottom p-3\">
						<div class=\"d-sm-flex justify-content-between align-items-center\">
							<h5 class=\"mb-2 mb-sm-0\"><i class=\"bi bi-star-fill fa-fw\"></i> Banner Premium <span class=\"badge bg-primary bg-opacity-10 text-primary\">$media_total</span></h5>
							<a href=\"https://www.canalicara.com/portal_admin.php?action=ADD_banners\" class=\"btn btn-sm btn-primary mb-0\">+</a>
						</div>
					</div>

					<!-- Card body START -->
					<div class=\"card-body p-3\">

						<!-- tabela responsiva -->
						<div class=\"table-responsive border-0\">
							<table class=\"table align-middle p-4 mb-0 table-hover table-shrink\">
								<tbody class=\"border-top-0\">";

						foreach($result as $key => $row){

							$cont = $row['cont'];							
							$data_atual=date_create(date('Y-m-d'));
							$data_inicial=date_create($row['date']);
							$diff=date_diff($data_atual,$data_inicial);
							$period = $diff->format("%a");
								if($period>0)			{	$periodo = $period;	}
								else if($period<=0)		{	$periodo = 1;	}
							$media = number_format(($cont)/($periodo),2);

							echo "<tr>
										<td><h6 class=\"course-title mt-2 mt-md-0 mb-0\"><a href=\"{$_SERVER['PHP_SELF']}?action=EDIT_banners&id={$row['id']}\">{$row['titulo']}</a></h6></td>";

										if($media>=$media_total)		{	echo "<td><div class='badge bg-success'>$media</div></td>";	}
										else if($media<=$media_total)	{	echo "<td><div class='badge bg-secondary'>$media</div></td>";	}

							echo "</tr>";
					}

				?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		<!-- BANNERS PREMIUM END -->


	<!-- BANNERS EXPERT-->
			<div class="col-md-6 col-xxl-4">
				<div class="card border h-100">

	<?php	$query = "SELECT * FROM banners WHERE data_inicial < now() AND data_final > now() AND categoria = 'Expert' ORDER BY titulo ASC";
			$sql = MySql::connect()->prepare($query);
			$sql->execute();
			if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
			else{ $result = $sql->fetchAll(); }

						foreach($result as $key => $row){	

							$resultados = $sql->rowCount();
							$cont = $row['cont'];							
							$data_atual=date_create(date('Y-m-d'));
							$data_inicial=date_create($row['date']);
							$diff=date_diff($data_inicial,$data_atual);
							$period = $diff->format("%a");
								if($period>0)			{	$periodo = $period;	}
								else if($period<=0)		{	$periodo = 1;	}
							$media_expert = number_format(($cont)/($periodo),2);
							$total_expert += $media_expert;
						}

						$media_total = number_format(($total_expert)/($resultados),2);

						echo "<!-- Card header -->
						<div class=\"card-header bg-transparent border-bottom p-3\">
						<div class=\"d-sm-flex justify-content-between align-items-center\">
							<h5 class=\"mb-2 mb-sm-0\"><i class=\"bi bi-star fa-fw\"></i> Banner Expert <span class=\"badge bg-primary bg-opacity-10 text-primary\">$media_total</span></h5>
							<a href=\"https://www.canalicara.com/portal_admin.php?action=ADD_banners\" class=\"btn btn-sm btn-primary mb-0\">+</a>
						</div>
					</div>

					<!-- Card body START -->
					<div class=\"card-body p-3\">

						<!-- tabela responsiva -->
						<div class=\"table-responsive border-0\">
							<table class=\"table align-middle p-4 mb-0 table-hover table-shrink\">
								<tbody class=\"border-top-0\">";

						foreach($result as $key => $row){

							$cont = $row['cont'];							
							$data_atual=date_create(date('Y-m-d'));
							$data_inicial=date_create($row['date']);
							$diff=date_diff($data_inicial,$data_atual);
							$period = $diff->format("%a");
								if($period>0)			{	$periodo = $period;	}
								else if($period<=0)		{	$periodo = 1;	}
							$media = number_format(($cont)/($periodo),2);

							echo "<tr>
										<td><h6 class=\"course-title mt-2 mt-md-0 mb-0\"><a href=\"{$_SERVER['PHP_SELF']}?action=EDIT_banners&id={$row['id']}\">{$row['titulo']}</a></h6></td>";

										if($media>=$media_total)		{	echo "<td><div class='badge bg-success'>$media</div></td>";	}
										else if($media<=$media_total)	{	echo "<td><div class='badge bg-secondary'>$media</div></td>";	}

							echo "</tr>";
					}

				?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		<!-- BANNERS EXPERT END -->


		<!-- BANNERS START-->
			<div class="col-md-6 col-xxl-4">
				<div class="card border h-100">

	<?php	$query = "SELECT * FROM banners WHERE data_inicial < now() AND data_final > now() AND categoria = 'Start' ORDER BY titulo ASC";
			$sql = MySql::connect()->prepare($query);
			$sql->execute();
			if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
			else{ $result = $sql->fetchAll(); }

						foreach($result as $key => $row){	

							$resultados = $sql->rowCount();
							$cont = $row['cont'];							
							$data_atual=date_create(date('Y-m-d'));
							$data_inicial=date_create($row['date']);
							$diff=date_diff($data_inicial,$data_atual);
							$period = $diff->format("%a");
								if($period>0)			{	$periodo = $period;	}
								else if($period<=0)		{	$periodo = 1;	}
							$media_start = number_format(($cont)/($periodo),2);
							$total_start += $media_start;
						}

						$media_total = number_format(($total_start)/($resultados),2);

						echo "<!-- Card header -->
						<div class=\"card-header bg-transparent border-bottom p-3\">
						<div class=\"d-sm-flex justify-content-between align-items-center\">
							<h5 class=\"mb-2 mb-sm-0\"><i class=\"bi bi-stars fa-fw\"></i> Banner Start <span class=\"badge bg-primary bg-opacity-10 text-primary\">$media_total</span></h5>
							<a href=\"https://www.canalicara.com/portal_admin.php?action=ADD_banners\" class=\"btn btn-sm btn-primary mb-0\">+</a>
						</div>
					</div>

					<!-- Card body START -->
					<div class=\"card-body p-3\">

						<!-- tabela responsiva -->
						<div class=\"table-responsive border-0\">
							<table class=\"table align-middle p-4 mb-0 table-hover table-shrink\">
								<tbody class=\"border-top-0\">";

						foreach($result as $key => $row){

							$cont = $row['cont'];							
							$data_atual=date_create(date('Y-m-d'));
							$data_inicial=date_create($row['date']);
							$diff=date_diff($data_inicial,$data_atual);
							$period = $diff->format("%a");
								if($period>0)			{	$periodo = $period;	}
								else if($period<=0)		{	$periodo = 1;	}
							$media = number_format(($cont)/($periodo),2);

							echo "<tr>
										<td><h6 class=\"course-title mt-2 mt-md-0 mb-0\"><a href=\"{$_SERVER['PHP_SELF']}?action=EDIT_banners&id={$row['id']}\">{$row['titulo']}</a></h6></td>";

										if($media>=$media_total)		{	echo "<td><div class='badge bg-success'>$media</div></td>";	}
										else if($media<=$media_total)	{	echo "<td><div class='badge bg-secondary'>$media</div></td>";	}

							echo "</tr>";
					}

				?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		<!-- BANNERS EXPERT END -->

			<div class="col-md-6 col-xxl-4">
				<!-- Notice board START -->
				<div class="card border h-100">
					<!-- Card header -->
					<div class="card-header border-bottom d-flex justify-content-between align-items-center  p-3">
						<h5 class="card-header-title mb-0">Atalhos</h5>
            <!-- Dropdown button -->
						<div class="dropdown text-end">
							<a href="#" class="btn border-0 p-0 mb-0" role="button" id="dropdownShare3" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots fa-fw"></i></a>
							<!-- dropdown button -->
							<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare3">
								<li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-trash fa-fw me-2"></i>Remove</a></li>
							</ul>
						</div>
					</div>

					<!-- Card body START -->
					<div class="card-body p-3">
						<div class="custom-scrollbar h-350">
							<div class="row">
								<!-- Notice board item -->
								<div class="col-12">
									<div class="d-flex justify-content-between position-relative">
										<div class="d-sm-flex">
											<div class="icon-lg bg-warning bg-opacity-15 text-warning rounded-2 flex-shrink-0">
												<i class="fas fa-link fs-5"></i>
											</div>
											<!-- Info -->
											<div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
												<h6 class="mb-0"><a href="#" class="stretched-link">Link</a></h6>
												<p class="mb-0">Crie url curta para links monitoráveis</p>
											</div>
										</div>
									</div>
								</div>

								<!-- Divider -->
								<hr class="my-3">

								<!-- Notice board item -->
								<div class="col-12">
									<div class="d-flex justify-content-between position-relative">
										<div class="d-sm-flex">
											<div class="icon-lg bg-success bg-opacity-10 text-success rounded-2 flex-shrink-0">
												<i class="bi bi-bar-chart-line-fill fs-5"></i>
											</div>
											<!-- Info -->
											<div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
												<h6 class="mb-0"><a href="https://www.canalicara.com/portal_admin.php?action=ADD_cidindicadores" class="stretched-link">Adicionar indicador</a></h6>
												<p class="mb-0">Chegou a hora de atualizar os dados!</p>
											</div>
										</div>
									</div>
								</div>

								<!-- Divider -->
								<hr class="my-3">

								<!-- Notice board item -->
								<div class="col-12">
									<div class="d-flex justify-content-between position-relative">
										<div class="d-sm-flex">
											<div class="icon-lg bg-danger bg-opacity-10 text-danger rounded-2 flex-shrink-0">
												<i class="bi bi-bell-fill fs-5"></i>
											</div>
											<!-- Info -->
											<div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
												<h6 class="mb-0"><a href="#" class="stretched-link">5 New Subscribers</a></h6>
												<p class="mb-0">Weddings believed prospect Arrived</p>
												<span class="small">4 hour ago</span>
											</div>
										</div>
									</div>
								</div>

								<!-- Divider -->
								<hr class="my-3">

								<!-- Notice board item -->
								<div class="col-12">
									<div class="d-flex justify-content-between position-relative">
										<div class="d-sm-flex">
											<div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-2 flex-shrink-0"><i class="fas fa-globe fs-5"></i></div>
											<!-- Info -->
											<div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
												<h6 class="mb-0"><a href="#" class="stretched-link">Update New Feature</a></h6>
												<span class="small">3 days ago</span>
											</div>
										</div>
									</div>
								</div>
							</div><!-- Row END -->
						</div>
					</div>
					<!-- Card body END -->
				</div>
				<!-- Notice board END -->
			</div>

			<div class="col-md-6 col-xxl-4">
				<div class="card border h-100">

					<!-- Card header -->
					<div class="card-header border-bottom d-flex justify-content-between align-items-center p-3">
						<h5 class="card-header-title mb-0">Traffic sources</h5>
						<a href="#" class="btn btn-sm btn-link p-0 mb-0 text-reset">View all</a>
					</div>

					<!-- Card body START -->
					<div class="card-body p-4">
						<!-- Chart -->
						<div class="mx-auto"><div id="apexChartTrafficSources"></div></div>
						<!-- Content -->
						<ul class="list-inline text-center mt-3">
							<li class="list-inline-item pe-2"><i class="text-primary fas fa-circle pe-1"></i> Search </li>
							<li class="list-inline-item pe-2"><i class="text-success fas fa-circle pe-1"></i> Direct </li>
							<li class="list-inline-item pe-2"><i class="text-danger fas fa-circle pe-1"></i> Social </li>
							<li class="list-inline-item pe-2"><i class="text-warning fas fa-circle pe-1"></i> Display ads </li>
						</ul>
					</div>
				</div>
			</div>


			</div>
		</div>
	</div>
</section>
<!-- =======================
Main contain END -->


<?php	
			}

//NOTÍCIAS=============================================================

function mostrarnews($pagina = 0)	{
	if(isset($_SESSION['id_usuario']) && is_numeric($_SESSION['id_usuario'])){
		if(($_SESSION["nivel"] >= "1") && ($_SESSION["nivel"] <= "49")){
			echo '<!--LISTAR-NOTICIAS-->';
			$result = Db::selectAllByVar('noticias', 'id_usuario', $_SESSION['id_usuario']);

			if(is_array($result) && count($result) > 0){
				die('Não foi possível selecionar as notícias do usuário!');
				$total = count($result);
			}
			$lpp = 50;
			$paginas = ceil($total / $lpp);
			$inicio = $pagina * $lpp;
			echo '<!--DEFINIDO PAGINAS-->';

			$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM noticias WHERE id_usuario = ? ORDER BY pdate DESC LIMIT $inicio, $lpp";
			$sql = MySql::connect()->prepare($query);
			$sql->execute([$_SESSION['id_usuario']]);

			echo '<!--SELECIONADO-->';
			if($sql->rowCount() == 0){ die('Error '.$sql->errorInfo()[1].': '.$sql->errorInfo()[2]); }
			else{ $result = $sql->fetchAll(); }
			// ==EXIBIÇÃO==
			echo "<div class='small-12 columns'><h3><a href='https://www.canalicara.com/portal_admin.php?action=adicionarnews' class='button radius sucess marge fi-plus size-60'></a> Adicionar Notícias ".$_SESSION['id_usuario']."
				<ul class='button-group radius right'>
					<li><a href='javascript:UPLOAD()' class='button secondary small fi-photo size-60' style='padding:10px;'><label>imagem</label></a></li>
					<li><a href='https://www.canalicara.com/portal_admin.php?action=mostrarnoticias_galerias' class='button secondary small fi-camera size-60' style='padding:10px;'><label>galeria</label></a></li>
					<li><a href='https://www.canalicara.com/portal_admin.php?action=mostrarnoticias_agencia' class='button secondary small fi-megaphone size-60' style='padding:10px;'><label>agência</label></a></li>
					<li><a href='https://www.canalicara.com/portal_admin.php?action=mostrarnoticias_blogs' class='button secondary small fi-social-blogger size-60' style='padding:10px;'><label>blogs</label></a></li>
					<li><a href='https://www.canalicara.com/portal_admin.php?action=mostrarnoticias_especiais' class='button secondary small fi-pricetag-multiple size-60' style='padding:10px;'><label>especias</label></a></li>
					<li><a href='https://www.canalicara.com/portal_admin.php?action=mostrarnoticias_temas' class='button secondary small fi-price-tag size-60' style='padding:10px;'><label>editorias</label></a></li>
					<li><a href='https://www.canalicara.com/portal_admin.php?action=mostrarnoticias_abrangencia' class='button secondary small fi-price-tag size-60' style='padding:10px;'><label>região</label></a></h3></li></ul></DIV>";
			echo "<div class='small-12 columns'>";
			foreach ($result as $key => $row) {
				$titulo = $row['titulo'];
				$tema = $row['tema'];
				echo "<div class='panel clearfix' style='padding:0; padding-left:10;'><a class='small button secondary fi-trash size-21 right alert' href=\"#\" data-reveal-id=\"myModal-{$row['id']}\"  style='margin-bottom:0'></a> <a href=\"{$_SERVER['PHP_SELF']}?action=editarnews&id={$row['id']}\"><p style='margin-top:10'><b>$tema</b>: $titulo</a></p></Div>
				<div id=\"myModal-{$row['id']}\" class=\"reveal-modal\" data-reveal><h2>Deletar notícia?</h2><p class=\"lead\"><a href=\"{$_SERVER['PHP_SELF']}?action=deletarnews&id={$row['id']}\">confirmar exclusão de <b>$titulo</b></a></p><a class=\"close-reveal-modal\">&#215;</a></div>\n";
			}
			// ==PAGINAÇÃO==
			echo "</DIV><div class='small-12 columns' style='margin-top:35px;'><center><FONT class=links>\n";
			if($pagina > 0) {
				$menos = $pagina - 1;
				$url = "https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina=".$menos;
				echo "<a href='$url'><FONT color=#808080>&laquo;&laquo;</a></FONT> ";
			}
			$atual = ($pagina + 1);
			for($i = 0;$i<$paginas;$i++){
				$pg = $i + 1;
				if ($pg == $atual){
					$pg = "<Font color=#000000><b>[".$pg."]</b></Font>";
				}
				$url = "https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina=$i";
				echo "<a href='$url'><Font color=#808080>$pg</Font></a> | ";
			}
			if($pagina < $paginas - 1){
				$mais = $pagina + 1;
				$url = "https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina=$mais";
				echo " <a href='$url'><FONT color=#808080>&raquo;&raquo;</FONT></a>";
			}
			echo "</FONT></center></div><br><br>\n";
		}
		else if($_SESSION["nivel"] >= "50")	{?>
			<!--LISTAR-NOTICIAS-->
			<?php	
			$result = Db::selectAll('noticias');
			$lpp = 50;
			$total = count($result);
			$paginas = ceil($total / $lpp);
			$inicio = $pagina * $lpp;
			$fim = $inicio + $lpp;
			$query = "SELECT *, DATE_FORMAT(pdate, '%d/%m/%Y') as date FROM noticias ORDER BY pdate DESC LIMIT $inicio, $lpp";
			$sql = MySql::connect()->prepare($query);
			$sql->execute();

			if($sql->rowCount() == 0){ die("Error: ".$sql->errorInfo()[2]); }
			else{ $result = $sql->fetchAll(); }
			// ==EXIBIÇÃO==
			echo "<section class=\"py-4\">
	<div class=\"container\">
    <div class=\"row pb-4\">
			<div class=\"col-12\">
				<h1 class=\"mb-0 h2\"><i class=\"bi bi-newspaper primary\"></i> Listar notícias</h1>
				<p class=\"mb-sm-0 text-center text-sm-start\">$inicio a $fim de $total posts</p>
			</div>
		</div>
		<div class=\"row\">
			<div class=\"col-12\">
				<!-- Chart START -->
				<div class=\"card border\">
					<!-- Card body -->
					<div class=\"card-body\">
						<!-- Blog list table START -->
						<div class=\"table-responsive border-0\">
							<table class=\"table align-middle p-4 mb-0 table-hover table-shrink\">
								<!-- Table head -->
								<thead class=\"table-dark\">
									<tr>
										<th scope=\"col\" class=\"border-0 rounded-start\">Título</th>
										<th scope=\"col\" class=\"border-0\">Data</th>
										<th scope=\"col\" class=\"border-0\">Categoria</th>
										<th scope=\"col\" class=\"border-0 rounded-end\">Ação</th>
									</tr>
								</thead>
								<!-- Table body START -->
								<tbody class=\"border-top-0\">";


						foreach($result as $key => $row){
							$data=date('d/m/y', strtotime($row['pdate'])).' | '.date('H:i', strtotime($row['pdate']));
							$URL_titulo = seoUrl($row['titulo']);	
							$URL_tema = seoUrl($row['tema']);
							echo "<tr>
										<td><h6 class=\"course-title mt-2 mt-md-0 mb-0\"><a href=\"{$_SERVER['PHP_SELF']}?action=editarnews&id={$row['id']}\">{$row['titulo']}</a></h6></td>
										<td>$data</td>
										<td><a href=\"#\" class=\"badge bg_{$row['tema']} mb-2\"><i class=\"fas fa-circle me-2 small fw-bold\"></i>{$row['tema']}</a></td>
										<td><div class=\"d-flex gap-2\">
                        <a href=\"{$_SERVER['PHP_SELF']}?action=editarnews&id={$row['id']}\" class=\"btn btn-light btn-round mb-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Editar\"><i class=\"bi bi-pencil-square\"></i></a>
                        <a href=\"#\" class=\"btn btn-light btn-round mb-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Deletar\"><i class=\"bi bi-trash\"></i></a>
                        <a href=\"whatsapp://send?text=*{$row['titulo']}*+Veja+mais+em+https://www.canalicara.com/$URL_tema/$URL_titulo-{$row['id']}.html\" class=\"btn btn-light btn-round mb-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Compartilhar\"><i class=\"bi bi-whatsapp\"></i></a>
                      </div>
										</td>
									</tr>";
					}
				?>

								</tbody>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Blog list table END -->

<?php // ==PAGINAÇÃO==

      echo "<!-- Pagination -->
        <div class=\"d-sm-flex justify-content-center align-items-sm-center mt-4 mt-sm-3\">
        <nav class=\"mb-sm-0 d-flex justify-content-center\" aria-label=\"navigation\">
        <ul class=\"pagination pagination-sm pagination-bordered mb-0\">";
			$atual = ($pagina + 1);
        	if($pagina > 0){
				$url = 'https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina='.($pagina-1);	
				echo '<li class="page-item"><a class="page-link" href="'.$url.'" tabindex="-1" aria-disabled="true">Anterior</a></li>';
			}

			for($i = 10; $i >= 0; $i--){
				$pg = $atual + 5 - $i;
				if($pg == $atual){
					$url = 'https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina='.$pagina;
					echo '<li class="page-item active"><a class="page-link" href="#">'.$atual.'</a></li>';
				}
				else if($pg > 0 && $pg <= $paginas){
					$url = 'https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina='.($pg-1);
					echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$pg.'</a></li>';
				}
			}

			if($pagina < $paginas-1){
				$url = 'https://www.canalicara.com/portal_admin.php?action=mostrarnews&pagina='.($atual);
				echo '<li class="page-item"><a class="page-link" href="'.$url.'">Próxima</a></li>';
			}
			echo "</ul>
                </nav>
              </div>
           </div>
              <!-- Pagination END -->\n";
		}
		else{	echo "Ops... você não tem acesso para isso!";	}
	}
	else{	echo "Ops... não foi possível reconhecer o usuário";	}
}


function adicionarnews(){
	if(isset($_SESSION['news_result'])){
		echo $_SESSION['news_result'];
		unset($_SESSION['news_result']);
	}
	if($_SESSION["nivel"] >= "1")	{?>

<section class="py-4">
	<div class="container">
    <div class="row pb-4">
			<div class="col-12"><h1 class="mb-0 h2"><i class="bi bi-newspaper primary"></i> Criar notícia 

				<?php
						$result = Db::selectLimited('noticias', 0, 1, 'id', 'DESC');
						foreach($result as $key => $row){
							$id = $row['id'];
							$newID = $id + 1;
						echo "<span class=\"badge bg-primary bg-opacity-10 text-primary\">$newID</span>";
					}	?>

				</h1></div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- Chart START -->
				<div class="card border">
					<!-- Card body -->
					<div class="card-body">
            <!-- Form START -->
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <!-- Main form -->
              <div class="row">

                <!-- titulo -->
                <div class="col-lg-8">
                  <div class="mb-3">
                    <input required id="con-name" name="titulo" type="text" class="form-control" placeholder="Título">
                  </div>
                </div>
  
                  <!-- data -->
                <div class="col-lg-2">
                  <div class="mb-3">
                  	 <input type="date" id="date" class="form-control" type="date" name="pdate_data" placeholder="data" required="" value="<?= date("Y-m-d") ?>">
                  </div>
                </div>

                <!-- hora -->
                <div class="col-lg-2">
                  <div class="mb-3">
                  	 <input type="time" id="time" class="form-control" type="time" name="pdate_hora" placeholder="hora" required="" value="<?= date("H:i") ?>">
                  </div>
                </div>

              <!-- Short description -->
              <div class="col-12">
                <div class="mb-3">
                    <textarea name="resumo" class="form-control" rows="2" placeholder="Descrição"></textarea>
                </div>
              </div>


				<!-- editoria -->
        <div class="col-lg-3">
         	<div class="mb-3">
          	<select name="tema" required="" class="form-select"><option value="">editoria</option>
					<?php
						$result = Db::selectAll('noticias_temas', 'titulo', 'ASC');
						foreach($result as $key => $row){
							echo "<option value=".$row['identificador'].">".$row['titulo'].'</option>';
					}
				?>
					</select>
         </div>
        </div>
 
				<!-- abrangencia -->
				<div class="col-lg-3">
                  <div class="mb-3">
					<select name="abrangencia" required="" class="form-select"><option value="">abrangencia</option>
					<?php
						$result = Db::selectAll('noticias_abrangencia', 'titulo', 'ASC');
						foreach($result as $key => $row){
							echo "<option value=".$row['identificador'].">".$row['titulo'].'</option>';
					}
				?>
					</select>
                  </div>
                </div>

				<!-- especiais -->
				<div class="col-lg-2">
                  <div class="mb-3">
					<select name="especial" class="form-select"><option value="">especiais</option>
					<?php
						$result = Db::selectAll('noticias_especiais', 'titulo', 'ASC');
						foreach($result as $key => $row){
							echo "<option value=".$row['identificador'].">".$row['titulo'].'</option>';
						}
					?>
					</select>
                  </div>
                </div>


				<!-- agencia -->
				<div class="col-lg-2">
                  <div class="mb-3">
					<select name="agencia" class="form-select"><option value="">agência</option>
					<?php
						$result = Db::selectAll('noticias_agencia', 'titulo', 'ASC');
							foreach($result as $key => $row){
							echo "<option value=".$row['identificador'].">".$row['titulo'].'</option>';
						}
					?>
					</select>
                  </div>
                </div>

				<!-- blog-->
				<div class="col-lg-2">
                  <div class="mb-3">
					<select name="blog" class="form-select"><option value="">blog</option>
					<?php
						$result = Db::selectAll('noticias_blogs', 'titulo', 'ASC');
						foreach($result as $key => $row){
							echo "<option value=".$row['identificador'].">".$row['titulo'].'</option>';
						}
					?>
					</select>
                  </div>
                </div>


                <!-- autor -->
                <div class="col-12">
                  <div class="mb-3">
                  	<input class="form-control" list="datalistOptions_autor" type="text" name="autor" placeholder="autor" required="" value=""/>
                  		<datalist id="datalistOptions_autor">
  							<option value="Lucas Lemos - lucas.lemos@canalicara.com">
 							<option value="Andreia Limas - andreia.limas@canalicara.com">
 							<option value="Redação">
 							<option value="Especial de">
						</datalist>
                  </div>
                </div>


                <!-- imagem -->
                <div class="col-6">
                  <div class="mb-3">
                  	<input class="form-control" type="text" name="imagem" placeholder="imagem" required="" value="http://www.canalicara.com/upload/noticias/photo.jpg"/>
                  </div>
                </div>

                <!-- imagem_autor -->
                <div class="col-4">
                  <div class="mb-3">
                  	<input class="form-control" list="datalistOptions_imgautor" type="text" name="imagem_autor" placeholder="autor da imagem" value=""/>
                  	    <datalist id="datalistOptions_imgautor">
  							<option value="Lucas Lemos [Canal Içara]">
						</datalist>
                  </div>
                </div>

                <!-- imagem_exibição -->
                <div class="col-2">
                  <div class="mb-3">
                  	<select name="imagem_exibicao" class="form-select">
						<option value="SIM">exibir imagem</option>
						<option value="NÃO">não exibir</option>
					</select>
                  </div>
                </div>

                <!-- upload -->
                <div class="col-12">
                  <div class="mb-3">
                  	<IFRAME class="col-12" Style='HEIGHT: 58px' border=0 marginWidth=0 marginHeight=0 src="https://www.canalicara.com/portal_upload.php?action=upload&diretorio=httpdocs/upload/noticias/" frameBorder=no scrolling=no></IFRAME>
                  </div>
                </div>


                <!-- galeria de imagens -->
                <div class="col-6">
                  <div class="mb-3">
					<select name="galeria" class="form-select"><option value="">galeria de imagens</option>
					<?php
						$result = Db::selectAll('noticias_galerias', 'id', 'DESC');
						foreach($result as $key => $row){
							echo "<option value=".$row['id'].">".$row['id'].' - '.$row['titulo'].'</option>';
					}
				?>
					</select>
                  </div>
                </div>


                <!-- youtube -->
                <div class="col-2">
                  <div class="mb-3">
                  	<input class="form-control" type="text" name="video_youtube" placeholder="video_youtube ID" value=""/>
                  </div>
                </div>


                <!-- youtube_exibição -->
                <div class="col-2">
                  <div class="mb-3">
                  	<select name="video" class="form-select">
						<option value="">sem vídeo</option>
						<option value="SIM">com vídeo</option>
					</select>
                  </div>
                </div>


                <!-- agenda -->
                <div class="col-2">
                  <div class="mb-3">
                  	<input type="datetime-local" id="datetime-local" class="form-control" type="datetime" name="agendar" placeholder="inserir na agenda" value="">
                  </div>
                </div>


              <!-- Main toolbar -->
                <div class="col-md-12">
                     	<textarea name="texto" class="form-control" rows="15" placeholder="texto"></textarea>
                </div>
 


                <!-- citação -->
                <div class="col-8">
                  <div class="mb-3">
                  	<input class="form-control" type="text" name="frase_texto" placeholder="citação"/>
                  </div>
                </div>

                <!-- citação_autor -->
                <div class="col-4">
                  <div class="mb-3">
                  	<input class="form-control" type="text" name="frase_autor" placeholder="citação: autor"/>
                  </div>
                </div>

                <!-- Create post button -->
                <div class="col-md-12 text-start">
                  <button class="btn btn-primary w-100" name="submit" type="submit">Inserir notícia</button>
                  <input type="hidden" name="type" value="new" />
                </div>
              </div>
            </form>
            <!-- Form END -->
					</div>
				</div>
				<!-- Chart END -->
			</div>
    </div>
	</div>
</section>

		<?php
	}
	else { echo "Ops... você não tem acesso para isso!"; }
}

function deletarnews($id){
	if($_SESSION["nivel"] >= "100")	{
		$query = "DELETE FROM noticias WHERE id = ?";
		$sql = MySql::connect()->prepare($query);
		$sql->execute([$id]);

		if($sql == false){
			die ("Error in query: $query. " .$sql->errorInfo()[2]);
		}
		else{
			echo "<font face=\"verdana\" size=\"2\">Notícia deletada com sucesso</font>";
		}
	}
	else{	echo "Ops... você não tem acesso para isso!";	}
}

function editarnews($id){
	if(isset($_SESSION['news_result'])){
		echo $_SESSION['news_result'];
		unset($_SESSION['news_result']);
	}
	if($_SESSION["nivel"] >= "1"){	
		$row = Db::selectId('noticias', $id);

		if(!is_array($row)){
			echo "<font face=\"verdana\" size=\"2\">Notícia inexistente</font>";
			die("Error in query:");
		}

		if(($_SESSION["nivel"] < "50") && ($_SESSION["id_usuario"] != $row['id_usuario'])){
			echo "<font face=\"verdana\" size=\"2\">Você não tem autorização para esta edição</font>";
		}
		else{
			$data = explode(" ", $row['pdate'])[0];
			$hora = explode(" ", $row['pdate'])[1];
			$dia = explode("-", $row['agenda'])[2];
			$mes = explode("-", $row['agenda'])[1];
			$ano = explode("-", $row['agenda'])[0];?>


<section class="py-4">
	<div class="container">
    <div class="row pb-4">
			<div class="col-12"><h1 class="mb-0 h2">Editar notícia
			<span class="badge bg-primary bg-opacity-10 text-primary"><?= $id ?></span></h1></div>
		</div>

		<div class="row">
			<div class="col-12">
				<!-- Chart START -->
				<div class="card border">
					<!-- Card body -->
					<div class="card-body">

        <!-- Form START -->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            	<input type="hidden" name="id" value="<?= $id ?>">

              <!-- Main form -->
              <div class="row">

                <!-- titulo -->
                <div class="col-12">
                  <div class="mb-3">
                    <input name="titulo" type="text" class="form-control" placeholder="Título" required="" value="<?= $row['titulo'] ?>"/>
                  </div>
                </div>

                <!-- data -->
                <div class="col-4">
                  <div class="mb-3">
                  	 <input id="date" class="form-control" type="date" name="pdate_data" placeholder="data" required="" value="<?= $data ?>"/>
                  </div>
                </div>

                <!-- hora -->
                <div class="col-4">
                  <div class="mb-3">
                  	 <input id="time" class="form-control" type="time" name="pdate_hora" placeholder="hora" required="" value="<?= $hora ?>"/>
                  </div>
                </div>

				<!-- atualização -->
      			<div class="col-4">
        			<div class="mb-3">
                  	 <input name="atualizacao" placeholder="atualização" value="<?= $row['atualizacao'] ?>" class="form-control" type="text"/>
                   </div>
                </div>


              <!-- Short description -->
              <div class="col-12">
                <div class="mb-3">
                    <textarea name="resumo" placeholder="Descrição" class="form-control" type="text" rows="2" /><?= $row['resumo'] ?></textarea>
                </div>
              </div>

				<!-- editoria -->
      			<div class="col-lg-3">
        			<div class="mb-3">
                  	 <input name="tema" placeholder="editoria" value="<?= $row['tema'] ?>" class="form-control" type="text" required=""/>
                   </div>
                </div>


				<!-- abrangencia -->
				<div class="col-lg-3">
              		<div class="mb-3">
                  	 <input name="abrangencia" placeholder="abrangência" required="" value="<?= $row['abrangencia'] ?>" class="form-control" type="text"/>
                  </div>
                </div>

				<!-- especiais -->
				<div class="col-lg-2">
                  <div class="mb-3">
                 	 <input name="especial" placeholder="especial" value="<?= $row['especial'] ?>" class="form-control" type="text"/>
                   </div>
                </div>

				<!-- agencia -->
				<div class="col-lg-2">
                  <div class="mb-3">
                 	 <input name="agencia" placeholder="agencia" value="<?= $row['agencia'] ?>" class="form-control" type="text"/>
                   </div>
                </div>

				<!-- blog -->
				<div class="col-lg-2">
                  <div class="mb-3">
                 	 <input name="blog" placeholder="blog" value="<?= $row['blog'] ?>" class="form-control" type="text"/>
                   </div>
                </div>


                <!-- autor -->
                <div class="col-12">
                  <div class="mb-3">
                  	<input name="autor"placeholder="autor" required="" value="<?= $row['autor'] ?>" class="form-control" list="datalistOptions_autor" type="text" />
                  		<datalist id="datalistOptions_autor">
  							<option value="Lucas Lemos - lucas.lemos@canalicara.com">
 							<option value="Andreia Limas - andreia.limas@canalicara.com">
 							<option value="Redação">
 							<option value="Especial de">
						</datalist>
                  </div>
                </div>


                <!-- imagem -->
                <div class="col-6">
                  <div class="mb-3">
                  	<input name="imagem" placeholder="imagem" required="" value="<?= $row['imagem'] ?>" class="form-control" type="text"/>
                  </div>
                </div>

                <!-- imagem_autor -->
                <div class="col-4">
                  <div class="mb-3">
                  	<input name="imagem_autor" placeholder="autor da imagem" value="<?= $row['imagem_autor'] ?>" class="form-control" list="datalistOptions_imgautor" type="text"/>
                  	    <datalist id="datalistOptions_imgautor">
  							<option value="Lucas Lemos [Canal Içara]">
						</datalist>
                  </div>
                </div>

                <!-- imagem_exibição -->
                <div class="col-2">
                  <div class="mb-3">
                   	<input name="imagem_exibicao" placeholder="exibição da imagem" required="" value="<?= $row['imagem_exibicao'] ?>" class="form-control" list="datalistOptions_imgexib" type="text"/>
                  	    <datalist id="datalistOptions_imgexib">
  							<option value="SIM">
						</datalist>
					</select>
                  </div>
                </div>


               <!-- galeria de imagens -->
                <div class="col-6">
                  <div class="mb-3">
                 	 <input name="galeria" placeholder="galeria" value="<?= $row['galeria'] ?>" class="form-control" type="text"/>
                  </div>
                </div>


                <!-- youtube -->
                <div class="col-2">
                  <div class="mb-3">
                  	<input name="video_youtube" placeholder="video_youtube ID" value="<?= $row['video_youtube'] ?>" class="form-control" type="text"/>
                  </div>
                </div>


                <!-- youtube_exibição -->
                <div class="col-2">
                  <div class="mb-3">
                  	<input name="video" placeholder="exibição do video" value="<?= $row['video'] ?>" class="form-control" type="text"/>
                 </div>
                </div>

                <!-- agenda -->
                <div class="col-2">
                  <div class="mb-3">
                  	<input name="agenda" placeholder="inserir na agenda" value="<?= $row['datab'] ?>" class="form-control" type="date" id="date" />
                  </div>
                </div>


              <!-- Main toolbar -->
                <div class="col-md-12">
                      <!-- Main toolbar -->
                      <textarea name="texto" type="text" class="form-control" type="text" rows="15" /><?= $row['texto'] ?></textarea>
                </div>


                <!-- citação -->
                <div class="col-8">
                  <div class="mb-3">
                  	<input name="frase_texto" placeholder="citação" value="<?= $row['frase_texto'] ?>" class="form-control" type="text"/>
                  </div>
                </div>

                <!-- citação_autor -->
                <div class="col-4">
                  <div class="mb-3">
                  	<input name="frase_autor" placeholder="citação: autor" value="<?= $row['frase_autor'] ?>" class="form-control" type="text"/>
                  </div>
                </div>

                <div class="col-md-12 text-start">
                 	<button class="btn btn-primary w-100" name="submit" type="submit">Atualizar notícia</button>
                	<input type="hidden" name="id" value="<?= $row['id'] ?>">
                	<input type="hidden" name="type" value="edit" />
                </div>
    	</form>


		<?php
		}
	}
	else{	echo "Ops... você não tem acesso para isso!";	}
}


//CIDADE-INDICADORES=====================================================

function ADD_cidindicadores(){
  if(isset($_SESSION['cidadeindicadores_result'])){
		echo $_SESSION['cidadeindicadores_result'];
		unset($_SESSION['cidadeindicadores_result']);
	}
	if($_SESSION["nivel"] >= "1")	{?>

<section class="py-4">
	<div class="container">
    	<div class="row pb-4">
			<div class="col-12">
				<h1 class="mb-0 h2"><i class="bi bi-bar-chart-line-fill primary"></i> Adicionar indicador 

				<?php
						$result = Db::selectLimited('cidade_indicadores', 0, 1, 'id', 'DESC');
						foreach($result as $key => $row){
							$id = $row['id'];
							$newID = $id + 1;
						echo "<span class=\"badge bg-primary bg-opacity-10 text-primary\">$newID</span>";
					}	?>

				</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<!-- Chart START -->
				<div class="card border">
					<!-- Card body -->
					<div class="card-body">
    			        <!-- Form START -->
        	    		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    	          			<!-- Main form -->
	              			<div class="row">

 			            	   <!-- titulo -->
            				   <div class="col-lg-8">
                	  				<div class="mb-3">
            	        				<input required id="con-name" name="titulo" type="text" class="form-control" placeholder="Indicador numérico">
        	          				</div>
    	            			</div>
  
                  				<!-- data -->
                				<div class="col-lg-2">
        	          				<div class="mb-3">
            	      	 				<input type="date" id="date" class="form-control" type="date" name="pdate_data" placeholder="data" required="" value="<?= date("Y-m-d") ?>">
 	                 				</div>
    	            			</div>

			        	        <!-- hora -->
            				    <div class="col-lg-2">
            	      				<div class="mb-3">
        	          	 				<input type="time" id="time" class="form-control" type="time" name="pdate_hora" placeholder="hora" required="" value="<?= date("H:i") ?>">
    	              				</div>
	                			</div>

								<!-- editoria -->
        						<div class="col-lg-3">
         							<div class="mb-3">
          								<select name="categoria" required="" class="form-select"><option value="">categoria</option>
											<option value="Balança Comercial">Balança comercial</option>
											<option value="CAD Único">CAD Único</option>
											<option value="Eleitores">Eleitores</option>
											<option value="Empregos">Empregos</option>
											<option value="Empresas">Empresas</option>
											<option value="IDEB - 5º ano">IDEB - 5º ano</option>
											<option value="IDEB - 9º ano">IDEB - 9º ano</option>
											<option value="IDEB - Ensino Médio">IDEB - Ensino Médio</option>
											<option value="IDHM">IDHM</option>
											<option value="PIB">PIB</option>
											<option value="População">População</option>
										</select>
       								</div>
    	    					</div>
 
								<!-- info adicional -->
									<div class="col-lg-9">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="texto" placeholder="informação adicional" value=""/>
                  						</div>
                					</div>

                				<!-- Create post button -->
               						<div class="col-md-12 text-start">
                 						<input class="btn btn-primary w-100" name="submitCidIndicadores" type="submit" value="Inserir indicador"/>
                  					<input type="hidden" name="type" value="new" />
                					</div>
              				</div>
            			</form>
           				<!-- Form END -->

					</div>
				</div>
				<!-- Chart END -->

			</div>
  	  	</div>
	</div>
</section>

		<?php
	}
	else { echo "Ops... você não tem acesso para isso!"; }
}



function EDIT_cidindicadores($id){
	if(isset($_SESSION['cidadeindicadores_result'])){
		echo $_SESSION['cidadeindicadores_result'];
		unset($_SESSION['cidadeindicadores_result']);
	}
	if($_SESSION["nivel"] >= "1"){	
		$row = Db::selectId('cidade_indicadores', $id);

		if(!is_array($row)){
			echo "<font face=\"verdana\" size=\"2\">Indicador inexistente</font>";
			die("Error in query:");
		}

		if($_SESSION["nivel"] < "50"){
			echo "<font face=\"verdana\" size=\"2\">Você não tem autorização para esta edição</font>";
		}
		else {
				$data = explode(" ", $row['pdate'])[0];
				$hora = explode(" ", $row['pdate'])[1];	?>


<section class="py-4">
	<div class="container">
    	<div class="row pb-4">
			<div class="col-12">
				<h1 class="mb-0 h2"><i class="bi bi-bar-chart-line-fill primary"></i> Editar indicador
					<span class="badge bg-primary bg-opacity-10 text-primary"><?= $id ?></span></h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<!-- Chart START -->
				<div class="card border">
					<!-- Card body -->
					<div class="card-body">
    			        <!-- Form START -->
        	    		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        	    			<input type="hidden" name="id" value="<?= $id ?>">
    	          			<!-- Main form -->
	              			<div class="row">

 			            	   <!-- titulo -->
            				   <div class="col-lg-8">
                	  				<div class="mb-3">
            	        				<input required id="con-name" name="titulo" type="text" class="form-control" placeholder="Indicador numérico" value="<?= $row['titulo'] ?>">
        	          				</div>
    	            			</div>
  
                  				<!-- data -->
                				<div class="col-lg-2">
        	          				<div class="mb-3">
            	      	 				<input type="date" id="date" class="form-control" name="pdate_data" placeholder="data" required="" value="<?= $data ?>">
 	                 				</div>
    	            			</div>

			        	        <!-- hora -->
            				    <div class="col-lg-2">
            	      				<div class="mb-3">
        	          	 				<input type="time" id="time" class="form-control" name="pdate_hora" placeholder="hora" required="" value="<?= $hora ?>">
    	              				</div>
	                			</div>

								<!-- editoria -->
        						<div class="col-lg-3">
         							<div class="mb-3">
          								<input type="text" id="time" class="form-control" name="categoria" placeholder="categoria" required="" value="<?= $row['categoria'] ?>">
       								</div>
    	    					</div>
 
								<!-- info adicional -->
									<div class="col-lg-9">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="texto" placeholder="informação adicional" value="<?= $row['texto'] ?>"/>
                  						</div>
                					</div>

                				<!-- Create post button -->
               						<div class="col-md-12 text-start">
                 						<input class="btn btn-primary w-100" name="submitCidIndicadores" type="submit" value="Editar indicador"/>
                 						<input type="hidden" name="id" value="<?= $row['id'] ?>">
                  						<input type="hidden" name="type" value="edit" />
                					</div>
              				</div>
            			</form>
           				<!-- Form END -->

					</div>
				</div>
				<!-- Chart END -->

			</div>
  	  	</div>
	</div>
</section>

		<?php
		}
	}
	else{	echo "Ops... você não tem acesso para isso!";	}
}



//PORTAL-BANNERS=====================================================

function ADD_banners(){
  if(isset($_SESSION['banners_result'])){
		echo $_SESSION['banners_result'];
		unset($_SESSION['banners_result']);
	}
	if($_SESSION["nivel"] >= "1")	{?>

<section class="py-4">
	<div class="container">
    	<div class="row pb-4">
			<div class="col-12">
				<h1 class="mb-0 h2"><i class="bi bi-megaphone primary"></i> Adicionar banner

				<?php
						$result = Db::selectLimited('banners', 0, 1, 'id', 'DESC');
						foreach($result as $key => $row){
							$id = $row['id'];
							$newID = $id + 1;
						echo "<span class=\"badge bg-primary bg-opacity-10 text-primary\">$newID</span>";
					}	?>

				</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<!-- Chart START -->
				<div class="card border">
					<!-- Card body -->
					<div class="card-body">
    			        <!-- Form START -->
        	    		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    	          			<!-- Main form -->
	              			<div class="row">

 			            	   <!-- titulo -->
            				   <div class="col-lg-8">
                	  				<div class="mb-3">
            	        				<input required id="con-name" name="titulo" type="text" class="form-control" placeholder="Cliente">
        	          				</div>
    	            			</div>
  
								<!-- editoria -->
        						<div class="col-lg-4">
         							<div class="mb-3">
          								<select name="categoria" required="" class="form-select"><option value="">categoria</option>
											<option value="Premium">Premium</option>
											<option value="Advanced">Advanced</option>
											<option value="Expert">Expert</option>
											<option value="Start">Start</option>
										</select>
       								</div>
    	    					</div>
 
                   				<!-- data inicial -->
                				<div class="col-lg-6">
        	          				<div class="mb-3">
            	      	 				<input type="date" id="date" class="form-control" name="data_inicial" placeholder="data" required="" value="<?= date("Y-m-d") ?>">
 	                 				</div>
    	            			</div>

                   				<!-- data inicial -->
                				<div class="col-lg-6">
        	          				<div class="mb-3">
            	      	 				<input type="date" id="date" class="form-control" name="data_final" placeholder="data" required="" value="<?= date("Y-m-d") ?>">
 	                 				</div>
    	            			</div>


								<!-- info adicional -->
									<div class="col-lg-12">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="link" placeholder="link" value=""/>
                  						</div>
                					</div>

                				<!-- imagem 1 -->
									<div class="col-lg-12">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="imagem1" placeholder="imagem do banner" value=""/>
                  						</div>
                					</div>

                				<!-- imagem 2 -->
									<div class="col-lg-12">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="imagem2" placeholder="imagem do banner" value=""/>
                  						</div>
                					</div>

                				<!-- imagem 3 -->
									<div class="col-lg-12">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="imagem3" placeholder="imagem do banner" value=""/>
                  						</div>
                					</div>

                				<!-- Create post button -->
               						<div class="col-md-12 text-start">
                 						<input class="btn btn-primary w-100" name="submitBanners" type="submit" value="Inserir banner"/>
                  					<input type="hidden" name="type" value="new" />
                					</div>
              				</div>
            			</form>
           				<!-- Form END -->

					</div>
				</div>
				<!-- Chart END -->

			</div>
  	  	</div>
	</div>
</section>

		<?php
	}
	else { echo "Ops... você não tem acesso para isso!"; }
}



function EDIT_banners($id){
	if(isset($_SESSION['banners_result'])){
		echo $_SESSION['banners_result'];
		unset($_SESSION['banners_result']);
	}
	if($_SESSION["nivel"] >= "1"){	
		$row = Db::selectId('banners', $id);

		if(!is_array($row)){
			echo "<font face=\"verdana\" size=\"2\">Banner inexistente</font>";
			die("Error in query:");
		}

		if($_SESSION["nivel"] < "50"){
			echo "<font face=\"verdana\" size=\"2\">Você não tem autorização para esta edição</font>";
		}
		else {
				$data_inicial = explode(" ", $row['data_inicial'])[0];
				$data_final = explode(" ", $row['data_final'])[0];	?>


<section class="py-4">
	<div class="container">
    	<div class="row pb-4">
			<div class="col-12">
				<h1 class="mb-0 h2"><i class="bi bi-megaphone primary"></i> Editar banner
					<span class="badge bg-primary bg-opacity-10 text-primary"><?= $id ?></span></h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<!-- Chart START -->
				<div class="card border">
					<!-- Card body -->
					<div class="card-body">
    			        <!-- Form START -->
        	    		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        	    			<input type="hidden" name="id" value="<?= $id ?>">
    	          			<!-- Main form -->
	              			<div class="row">

 			            	   <!-- titulo -->
            				   <div class="col-lg-8">
                	  				<div class="mb-3">
            	        				<input required id="con-name" name="titulo" type="text" class="form-control" placeholder="Cliente" value="<?= $row['titulo'] ?>">
        	          				</div>
    	            			</div>
  
								<!-- categoria -->
        						<div class="col-lg-4">
         							<div class="mb-3">
          								<input required id="con-name" name="categoria" type="text" class="form-control" placeholder="Categoria" value="<?= $row['categoria'] ?>">
       								</div>
    	    					</div>

                  				<!-- data -->
                				<div class="col-lg-6">
        	          				<div class="mb-3">
            	      	 				<input type="date" id="date" class="form-control" name="data_inicial" placeholder="data inicial" required="" value="<?= $data_inicial ?>">
 	                 				</div>
    	            			</div>

                  				<!-- data -->
                				<div class="col-lg-6">
        	          				<div class="mb-3">
            	      	 				<input type="date" id="date" class="form-control" name="data_final" placeholder="data final" required="" value="<?= $data_final ?>">
 	                 				</div>
    	            			</div>

								<!-- link -->
									<div class="col-lg-12">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="link" placeholder="link" value="<?= $row['link'] ?>"/>
                  						</div>
                					</div>

                					<!-- imagem1 -->
									<div class="col-lg-12">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="imagem1" placeholder="imagem1" value="<?= $row['imagem1'] ?>"/>
                  						</div>
                					</div>

                					<!-- imagem2 -->
									<div class="col-lg-12">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="imagem2" placeholder="imagem2" value="<?= $row['imagem2'] ?>"/>
                  						</div>
                					</div>

                					<!-- imagem3 -->
									<div class="col-lg-12">
                						<div class="mb-3">
                  							<input class="form-control" type="text" name="imagem3" placeholder="imagem3" value="<?= $row['imagem3'] ?>"/>
                  						</div>
                					</div>

                				<!-- Create post button -->
               						<div class="col-md-12 text-start">
                 						<input class="btn btn-primary w-100" name="submitBanners" type="submit" value="Editar banner"/>
                 						<input type="hidden" name="id" value="<?= $row['id'] ?>">
                  						<input type="hidden" name="type" value="edit" />
                					</div>
              				</div>
            			</form>
           				<!-- Form END -->

					</div>
				</div>
				<!-- Chart END -->

			</div>
  	  	</div>
	</div>
</section>

		<?php
		}
	}
	else{	echo "Ops... você não tem acesso para isso!";	}
}


//GERAR-FEED=============================================================

function gerarfeed(){
	if($_SESSION["nivel"] >= "1")	{
		$sql = MySql::connect()->prepare("SELECT *, DATE_FORMAT(pdate, '%W, %d %M %Y %H:%i -0300')  as date FROM noticias WHERE pdate <= NOW() ORDER BY pdate DESC LIMIT 5");

		if(!$sql->execute()){ die("Erro no SQL"); }
		else{ $result = $sql->rowCount(); }

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

					foreach($sql->fetchAll() as $k => $v){
						// PEGA OS DADOS DO SQL
						$title = $v['titulo'];
						$imagem = $v['imagem'];
						$texto = nl2br($v['texto']);
						$text = $v['resumo'];
						$endereco = $v['id'];
						$description = $v['date'];

						// MONTA AS TAGS DO XML
						$conteudox  = "			<item>\r\n";
						$conteudox .= "				<title><![CDATA[$title]]></title>\r\n";
						$conteudox .= "				<pubDate>$description</pubDate>\r\n";
						$conteudox .= "				<link>https://www.canalicara.com/shortlink/$endereco.html</link>\r\n";
						$conteudox .= "				<guid>https://www.canalicara.com/shortlink/$endereco.html</guid>\r\n";
						$conteudox .= "				<description><![CDATA[<img src='$imagem'/><br>$text]]></description>\r\n";
						$conteudox .= "			</item>\r\n";
						$conteudox .= "\r\n";
						fwrite($ponteiro, $conteudox);			//ESCREVE NO ARQUIVO
					}
				fwrite($ponteiro, "</channel>");		//FECHA A TAG CHANNEL
			fwrite($ponteiro, "</rss>\r\n");		// FECHA A TAG RSS
			fclose($ponteiro);				//FECHA O ARQUIVO
			echo "<div class=\"alert alert-success text-center\" role=\"alert\">".$arquivo." gerado com sucesso!</div><br>";	//MENSAGEM
	  }
	}
	else{	echo "Ops... você não tem acesso para isso!";	}
}



//MEU-USUARIO=============================================================

function usuario(){
	if(isset($_SESSION['user_result'])){
		echo $_SESSION['user_result'];
		unset($_SESSION['user_result']);
	}?>

	<section>
	<div class="container">
		<div class="row">
      <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
        <div class="p-4 p-sm-5 bg-primary bg-opacity-10 rounded">
					<h2>Painel de controle!</h2>
					<!-- Form START -->
					<form class="mt-4" method="post">
						<input type="hidden" name="id" value="<?=$_SESSION['id_usuario']?>"><fieldset>
						<!-- Email -->
						<div class="mb-3">
							<label class="form-label" for="exampleInputEmail1">Novo nome</label>
							<input type="text" name="novonome" class="form-control" placeholder="nome" required="" value="<?=$_SESSION['nome_usuario']?>">
						</div>
						<!-- Password -->
						<div class="mb-3">
							<label class="form-label" for="exampleInputPassword1">Senha atual</label>
							<input type="password" name="senha" placeholder="senha atual" class="form-control" placeholder="*********">
						</div>
						<!-- NEW Password 1-->
						<div class="mb-3">
							<label class="form-label" for="exampleInputPassword1">Nova senha</label>
							<input type="password" name="novasenha1" placeholder="nova senha" class="form-control" placeholder="*********">
						</div>		
						<!-- NEW Password 2-->
						<div class="mb-3">
							<label class="form-label" for="exampleInputPassword1">Confirmação da nova senha</label>
							<input type="password" name="novasenha2" placeholder="nova senha" class="form-control" placeholder="*********">
						</div>						
						<!-- Button -->
						<div class="row align-items-center">
							<div class="col-sm-4">
								<button type="submit" name="submitPass" class="btn btn-success">Enviar</button>
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
	<?php
}

//--------------   SUBMIT
function submitnews($p){
	if(isset($p['submit']) && isset($p['type'])){
		$type = $p['type'];
		if($p['type'] == 'new' || $p['type'] == 'edit'){
			if($_SESSION["nivel"] >= "1"){
				$dataSend = array();

				if($type == 'new'){
					$dataSend[] = $p['pdate_data'].' '.$p['pdate_hora'];
					$dataSend[] = $p['titulo'];
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

					if(Db::insert('noticias', $dataSend)){
						$lastId = MySql::connect()->lastInsertId();
						$_SESSION['news_result'] = "<div class=\"alert alert-success text-center\" role=\"alert\">Notícia <b>$lastId</b> inserida com sucesso</div>";
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



function submitcidade_indicadores($p){
	if(isset($p['submitCidIndicadores']) && isset($p['type'])){
		$type = $p['type'];
		if($p['type'] == 'new' || $p['type'] == 'edit'){
			if($_SESSION["nivel"] >= "1"){
				$dataSend = array();

				if($type == 'new'){
					$dataSend[] = $p['pdate_data'].' '.$p['pdate_hora'];
					$dataSend[] = $p['titulo'];
					$dataSend[] = $p['categoria'];
					$dataSend[] = $p['texto'];

					if(Db::insert('cidade_indicadores', $dataSend)){
						$lastId = MySql::connect()->lastInsertId();
						$_SESSION['cidadeindicadores_result'] = "<div class=\"alert alert-success text-center\" role=\"alert\">Indicador <b>$lastId</b> inserido com sucesso</div>";
					}
				}
				else if($type == 'edit'){
					$dataSend['id'] = $p['id'];
					$dataSend['pdate'] = $p['pdate_data'].' '.$p['pdate_hora'];
					$dataSend['titulo'] = $p['titulo'];
					$dataSend['categoria'] = $p['categoria'];
					$dataSend['texto'] = $p['texto'];

					if(!Db::update('cidade_indicadores', $dataSend)){
						die("Error in update");
					}
					else{
						$_SESSION['cidadeindicadores_result'] = "<div class=\"alert alert-success text-center\" role=\"alert\">Indicador editado com sucesso</div>";
					}
				}
			}
			else{ $_SESSION['cidadeindicadores_result'] = "<div class=\"alert alert-danger text-center\" role=\"alert\">Você não possui permissão para submeter este formulário!</div>"; }
		}
		else{ $_SESSION['cidadeindicadores_result'] = "<div class=\"alert alert-warning text-center\" role=\"alert\">Sorry! Não foi possível identificar o tipo do formulário!</div>"; }
	}
	else{
		$_SESSION['cidadeindicadores_result'] = "<div class=\"alert alert-warning text-center\" role=\"alert\">Ops! Nenhum formulário foi encontrado!</div>";
	}
}


function submitBanners($p){
	if(isset($p['submitBanners']) && isset($p['type'])){
		$type = $p['type'];
		if($p['type'] == 'new' || $p['type'] == 'edit'){
			if($_SESSION["nivel"] >= "1"){
				$dataSend = array();

				if($type == 'new'){
					$dataSend[] = $p['titulo'];
					$dataSend[] = $p['categoria'];
					$dataSend[] = $p['data_inicial'];
					$dataSend[] = $p['data_final'];
					$dataSend[] = $p['link'];
					$dataSend[] = $p['imagem1'];
					$dataSend[] = $p['imagem2'];
					$dataSend[] = $p['imagem3'];
					$dataSend[] = 0;

					if(Db::insert('banners', $dataSend)){
						$lastId = MySql::connect()->lastInsertId();
						$_SESSION['banners_result'] = "<div class=\"alert alert-success text-center\" role=\"alert\">Banner <b>$lastId</b> inserido com sucesso</div>";
					}
				}
				else if($type == 'edit'){
					$dataSend['id'] = $p['id'];
					$dataSend['titulo'] = $p['titulo'];
					$dataSend['categoria'] = $p['categoria'];
					$dataSend['data_inicial'] = $p['data_inicial'];
					$dataSend['data_final'] = $p['data_final'];
					$dataSend['link'] = $p['link'];
					$dataSend['imagem1'] = $p['imagem1'];
					$dataSend['imagem2'] = $p['imagem2'];
					$dataSend['imagem3'] = $p['imagem3'];

					if(!Db::update('banners', $dataSend)){
						die("Error in update");
					}
					else{
						$_SESSION['banners_result'] = "<div class=\"alert alert-success text-center\" role=\"alert\">Banner editado com sucesso</div>";
					}
				}
			}
			else{ $_SESSION['banners_result'] = "<div class=\"alert alert-danger text-center\" role=\"alert\">Você não possui permissão para submeter este formulário!</div>"; }
		}
		else{ $_SESSION['banners_result'] = "<div class=\"alert alert-warning text-center\" role=\"alert\">Sorry! Não foi possível identificar o tipo do formulário!</div>"; }
	}
	else{
		$_SESSION['banners_result'] = "<div class=\"alert alert-warning text-center\" role=\"alert\">Ops! Nenhum formulário foi encontrado!</div>";
	}
}



function submitPassword($p){
	$db = Db::selectVar('admin_usuarios', 'id', $_SESSION['id_usuario']);
	if(is_array($db) && md5($p['senha']) == $db['senha']){
		if($p['novasenha1'] == $p['novasenha2']){
			if(strlen($p['novasenha1']) >= 6){
				if($p['novasenha1'] != $p['senha']){
					$dataSend = array('nome' => $p['novonome'], 'senha' => md5($p['novasenha1']), 'id' => $p['id']);
					if(Db::update('admin_usuarios', $dataSend)){
						$_SESSION['nome_usuario'] = $p['novonome'];
						$_SESSION['user_result'] = "<div class=\"alert alert-success text-center\" role=\"alert\">Senha alterada com sucesso</div>";
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
if(isset($_POST['submitCidIndicadores'])){submitcidade_indicadores($_POST); $_POST = array();}
if(isset($_POST['submitBanners'])){submitBanners($_POST); $_POST = array();}
else if(isset($_POST['submitPass'])){submitPassword($_POST); $_POST = array();}

if(isset($_GET['action'])){
	if($_GET['action'] == 'ferramentas_facebook'){ ferramentas_facebook(); }
	if($_GET['action'] == 'usuario'){ usuario(); }
	if($_GET['action'] == 'gerarfeed'){ gerarfeed(); }

	else if($_GET['action'] == 'adicionarnews'){ adicionarnews(); }
	else if($_GET['action'] == 'editarnews' && isset($_GET['id']) && is_numeric($_GET['id'])){ editarnews($_GET['id']); }
	else if($_GET['action'] == 'deletarnews' && isset($_GET['id']) && is_numeric($_GET['id'])){ deletarnews($_GET['id']); }
	else if($_GET['action'] == 'mostrarnews'){
		if(isset($_GET['pagina']) && is_numeric($_GET['pagina'])){ mostrarnews($_GET['pagina']);}
		else{ mostrarnews(); }
	}

	else if($_GET['action'] == 'ADD_cidindicadores'){ ADD_cidindicadores(); }
	else if($_GET['action'] == 'EDIT_cidindicadores' && isset($_GET['id']) && is_numeric($_GET['id'])){ EDIT_cidindicadores($_GET['id']); }
	else if($_GET['action'] == 'DEL_cidindicadores' && isset($_GET['id']) && is_numeric($_GET['id'])){ DEL_cidindicadores($_GET['id']); }
	else if($_GET['action'] == 'VIEW_cidindicadores'){
		if(isset($_GET['pagina']) && is_numeric($_GET['pagina'])){ VIEW_cidindicadores($_GET['pagina']);}
		else{ VIEW_cidindicadores(); }
	}

	else if($_GET['action'] == 'ADD_banners'){ ADD_banners(); }
	else if($_GET['action'] == 'EDIT_banners' && isset($_GET['id']) && is_numeric($_GET['id'])){ EDIT_banners($_GET['id']); }
	else if($_GET['action'] == 'DEL_banners' && isset($_GET['id']) && is_numeric($_GET['id'])){ DEL_banners($_GET['id']); }
	else if($_GET['action'] == 'VIEW_banners'){
		if(isset($_GET['pagina']) && is_numeric($_GET['pagina'])){ VIEW_banners($_GET['pagina']);}
		else{ VIEW_banners(); }
	}

	else{ index(); }
}
else{ index(); }
?>