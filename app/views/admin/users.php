<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="page-menu">
							<li><a href="index.html">Home</a></li>
							<li class="active"><a href="#">Categories</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<?php require_once 'sidebar.php'; ?>
					<div class="col-md-9 col-xs-12">
						<!-- START PRODUCT-AREA -->
						<div class="product-area">
							<div class="row">
								<div class="col-xs-12 col-md-12">		
									<!-- Start Product -->
									<div class="product">
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
												<div class="area-title">
													<h2 class="title-group gfont-1">Користувачі</h2><br>
												</div>
												<div class="users-table">
													<table class="table">
														<tr>
															<th>Id</th>
															<th>ім'я</th>
															<th>Фамілія</th>
															<th>Телефон</th>
															<th>Email</th>
															<th>Логін</th>
															<th>Привілеї</th>
															<th>Блок</th>
															<th>Видалити</th>
															<th>Заблокувати</th>
														</tr>
													<?php foreach ( $data['users'] as $user): ?>
														<tr>
															<td><?=$user->getId()?></td>
															<td><?=$user->getName()?></td>
															<td><?=$user->getSurname()?></td>
															<td><?=$user->getPhone()?></td>
															<td><?=$user->getEmail()?></td>
															<td><?=$user->getLogin()?></td>
															<td><?=$user->getPrivileges()?></td>
															<td><?=$user->getBlock()?></td>
															<td>
																<a href="http://localhost/user/delete/<?=$user->getId()?>" >видалити</a>
															</td>
															<td>
																<a href="http://localhost/user/block/<?=$user->getId()?>" >Заблокувати</a>
															</td>
														</tr>
													<?php endforeach; ?>
													</table>
												</div>
												<!-- Start Pagination Area -->
												<div class="pagination-area">
													<div class="row">
														<div class="col-xs-5">
															<div class="pagination">
																<?= $data['pagin']; ?>
															</div>
														</div>
														<div class="col-xs-7">
															<div class="product-result">
																<span>Showing 1 to 16 of 19 (2 Pages)</span>
															</div>
														</div>
													</div>
												</div>
												<!-- End Pagination Area -->
											</div>
											<!-- End Product = TV -->
										</div>
									</div>
									<!-- End Product -->
								</div>
							</div>
						</div>
						<!-- END PRODUCT-AREA -->
					</div>
				</div>
			</div>
			<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/BrandLogo.php'; ?>
		</section>
		<!-- END PAGE-CONTENT -->