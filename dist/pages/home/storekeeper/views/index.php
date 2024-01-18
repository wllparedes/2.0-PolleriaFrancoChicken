<?php

include("./../../../../php/empezar_session.php");
include("./../../../../php/verificar_session.php");
include('./../models/calculateRecords.php')
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
													<svg class="icon-dashboard text-white" height="20" width="20" viewBox="0 0 512 512"><path d="M462.8 49.6a169.4 169.4 0 0 0 -239.5 0C187.8 85 160.1 128 160.1 192v85.8l-40.6 40.6c-9.7 9.7-24 11.1-36.8 6a60.3 60.3 0 0 0 -65 98.7C33 438.4 54.2 442.7 73.9 438.2c-4.5 19.6-.2 40.8 15.1 56.1a60.4 60.4 0 0 0 98.8-65c-5.1-12.7-3.7-27 6-36.8L234.4 352h85.9a187.9 187.9 0 0 0 61.9-10c-39.6-43.9-39.8-110.2 1.1-151.1 34.4-34.4 86.8-39.5 128.7-16.8 1.3-45-14.8-90.3-49.1-124.6z"/></svg>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">
													Productos
												</h6>
												<h6 class="font-extrabold mb-0">
													<?php echo calculateRecords('products') ?>
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
													<i class="fas fa-users"></i>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">
													Usuarios
												</h6>
												<h6 class="font-extrabold mb-0">
													<?php echo calculateRecords('users') ?>
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
													<i class="iconly-boldAdd-User"></i>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">
													Proveedores
												</h6>
												<h6 class="font-extrabold mb-0">
													<?php echo calculateRecords('suppliers') ?>
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
													<i class="fas fa-sticky-note"></i>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">
													Requerimientos
												</h6>
												<h6 class="font-extrabold mb-0">
													<?php echo calculateRecords('requirements') ?>
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
											<?php echo $_SESSION["user_name"] ?>
											</h6>
											<span class="text-muted mb-0 text-truncate">
												<?php echo $_SESSION["email"] ?>
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
