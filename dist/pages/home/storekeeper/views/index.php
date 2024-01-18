<?php

include("./../../../../php/empezar_session.php");
include('./../models/InformationDashboard.php');
include("./../../../../php/verificar_session.php");
$informationDashboard = new InformationDashboard();
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<?php include('./../../../../includes/_head.php'); ?>
</head>

<body>
	<div id="app">

		<!-- start siderbar -->
		<?php include('./../../../../includes/_sidebar.php'); ?>
		<!-- end siderbar -->

		<div id="main">
			<header class="mb-3">
				<a href="#" class="burger-btn d-block d-xl-none">
					<i class="bi bi-justify fs-3"></i>
				</a>
			</header>

			<div class="page-heading" id="heading">
				<h3>Estadisticas</h3>
			</div>
			<div class="page-content">
				<section class="row">
					<div class="col-12 col-lg-9">
						<div class="row">
							<div class="col-6 col-lg-3 col-md-6">
								<div class="card" id="card">
									<div class="card-body px-3 py-4-5">
										<div class="row">
											<div class="col-md-4">
												<div class="stats-icon purple">
													<svg class="icon-dashboard icon icon-tabler icon-tabler-meat"
														width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path
															d="M13.62 8.382l1.966 -1.967a2 2 0 1 1 3.414 -1.415a2 2 0 1 1 -1.413 3.414l-1.82 1.821" />
														<path
															d="M5.904 18.596c2.733 2.734 5.9 4 7.07 2.829c1.172 -1.172 -.094 -4.338 -2.828 -7.071c-2.733 -2.734 -5.9 -4 -7.07 -2.829c-1.172 1.172 .094 4.338 2.828 7.071z" />
														<path d="M7.5 16l1 1" />
														<path
															d="M12.975 21.425c3.905 -3.906 4.855 -9.288 2.121 -12.021c-2.733 -2.734 -8.115 -1.784 -12.02 2.121" />
													</svg>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">
													Productos
												</h6>
												<h6 class="font-extrabold mb-0">
													<?php echo $informationDashboard->calculateRecords('products') ?>
												</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 col-lg-3 col-md-6">
								<div class="card" id="card">
									<div class="card-body px-3 py-4-5">
										<div class="row">
											<div class="col-md-4">
												<div class="stats-icon blue">
													<svg class="icon-dashboard icon icon-tabler icon-tabler-users"
														width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
														<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
														<path d="M16 3.13a4 4 0 0 1 0 7.75" />
														<path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
													</svg>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">
													Usuarios
												</h6>
												<h6 class="font-extrabold mb-0">
													<?php echo $informationDashboard->calculateRecords('users') ?>
												</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 col-lg-3 col-md-6">
								<div class="card" id="card">
									<div class="card-body px-3 py-4-5">
										<div class="row">
											<div class="col-md-4">
												<div class="stats-icon green">
													<svg class="icon-dashboard icon icon-tabler icon-tabler-user-shield"
														width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M6 21v-2a4 4 0 0 1 4 -4h2" />
														<path
															d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z" />
														<path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
													</svg>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">
													Proveedores
												</h6>
												<h6 class="font-extrabold mb-0">
													<?php echo $informationDashboard->calculateRecords('suppliers') ?>
												</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 col-lg-3 col-md-6">
								<div class="card" id="card">
									<div class="card-body px-3 py-4-5">
										<div class="row">
											<div class="col-md-4">
												<div class="stats-icon red">
													<svg class="icon-dashboard icon icon-tabler icon-tabler-file-description"
														width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M14 3v4a1 1 0 0 0 1 1h4" />
														<path
															d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
														<path d="M9 17h6" />
														<path d="M9 13h6" />
													</svg>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">
													Requerimientos
												</h6>
												<h6 class="font-extrabold mb-0">
													<?php echo $informationDashboard->calculateRecords('requirements') ?>
												</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="card" id="profile">
									<div class="card-header" id="cardHeader">
										<h4>Profile Visit</h4>
									</div>
									<div class="card-body">
										<div id="chart-profile-visit"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-xl-4">
								<div class="card" id="profile">
									<div class="card-header" id="cardHeader">
										<h4>Profile Visit</h4>
									</div>
									<div class="card-body" id="cardBody">
										<div class="row">
											<div class="col-6">
												<div class="d-flex align-items-center">
													<svg class="bi text-primary" width="32" height="32" fill="blue"
														style="width: 10px">
														<use
															xlink:href="./../../../../assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
													</svg>
													<h5 class="mb-0 ms-3">
														Europe
													</h5>
												</div>
											</div>
											<div class="col-6">
												<h5 class="mb-0">862</h5>
											</div>
											<div class="col-12">
												<div id="chart-europe"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="d-flex align-items-center">
													<svg class="bi text-success" width="32" height="32" fill="blue"
														style="width: 10px">
														<use
															xlink:href="./../../../../assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
													</svg>
													<h5 class="mb-0 ms-3">
														America
													</h5>
												</div>
											</div>
											<div class="col-6">
												<h5 class="mb-0">375</h5>
											</div>
											<div class="col-12">
												<div id="chart-america"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="d-flex align-items-center">
													<svg class="bi text-danger" width="32" height="32" fill="blue"
														style="width: 10px">
														<use
															xlink:href="./../../../../assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
													</svg>
													<h5 class="mb-0 ms-3">
														Indonesia
													</h5>
												</div>
											</div>
											<div class="col-6">
												<h5 class="mb-0">1025</h5>
											</div>
											<div class="col-12">
												<div id="chart-indonesia"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-xl-8">
								<div class="card" id="profile">
									<div class="card-header" id="cardHeader">
										<h4>Latest Comments</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-lg" id="table">
												<thead>
													<tr>
														<th>Name</th>
														<th>Comment</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="col-3">
															<div class="d-flex align-items-center">
																<div class="avatar avatar-md">
																	<img
																		src="./../../../../assets/images/faces/5.jpg" />
																</div>
																<p class="font-bold ms-3 mb-0">
																	Si
																	Cantik
																</p>
															</div>
														</td>
														<td class="col-auto">
															<p class="mb-0">
																Congratulations
																on your
																graduation!
															</p>
														</td>
													</tr>
													<tr>
														<td class="col-3">
															<div class="d-flex align-items-center">
																<div class="avatar avatar-md">
																	<img
																		src="./../../../../assets/images/faces/2.jpg" />
																</div>
																<p class="font-bold ms-3 mb-0">
																	Si
																	Ganteng
																</p>
															</div>
														</td>
														<td class="col-auto">
															<p class="mb-0">
																Wow amazing
																design! Can
																you make
																another
																tutorial for
																this design?
															</p>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-3">
						<div class="card" id="perfil">
							<div class="card-body py-4 px-5">
								<div class="d-flex align-items-center">
									<div class="avatar avatar-xl">
										<img src="./../../../../assets/images/faces/1.jpg" alt="Face 1" />
									</div>
									<div class="ms-3 name text-truncate">
										<h5 class="font-bold">
											<?php echo $informationDashboard->getUser('user_name') ?>
										</h5>
										<span class="text-muted mb-0 text-truncate">
											<?php echo $informationDashboard->getUser('email') ?>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="card" id="profile">
							<div class="card-header" id="cardHeader">
								<h4>Recent Messages</h4>
							</div>
							<div class="card-content pb-4">
								<div class="recent-message d-flex px-4 py-3">
									<div class="avatar avatar-lg">
										<img src="./../../../../assets/images/faces/4.jpg" />
									</div>
									<div class="name ms-4">
										<h5 class="mb-1">Hank Schrader</h5>
										<h6 class="text-muted mb-0">
											@johnducky
										</h6>
									</div>
								</div>
								<div class="recent-message d-flex px-4 py-3">
									<div class="avatar avatar-lg">
										<img src="./../../../../assets/images/faces/5.jpg" />
									</div>
									<div class="name ms-4">
										<h5 class="mb-1">
											Dean Winchester
										</h5>
										<h6 class="text-muted mb-0">
											@imdean
										</h6>
									</div>
								</div>
								<div class="recent-message d-flex px-4 py-3">
									<div class="avatar avatar-lg">
										<img src="./../../../../assets/images/faces/1.jpg" />
									</div>
									<div class="name ms-4">
										<h5 class="mb-1">John Dodol</h5>
										<h6 class="text-muted mb-0">
											@dodoljohn
										</h6>
									</div>
								</div>
								<div class="px-4">
									<button class="btn btn-block btn-xl btn-light-primary font-bold mt-3">
										Start Conversation
									</button>
								</div>
							</div>
						</div>
						<div class="card" id="profile">
							<div class="card-header" id="cardHeader">
								<h4>Visitors Profile</h4>
							</div>
							<div class="card-body">
								<div id="chart-visitors-profile"></div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- * footer -->
			<?php include('./../../../../includes/_footer.php') ?>
			<!-- * footer -->

		</div>
	</div>
	<?php include('./../../../../includes/_scripts.php') ?>
</body>

</html>
