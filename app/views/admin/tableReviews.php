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
													<h2 class="title-group gfont-1">Відгуки</h2><br>
												</div>
												<div>
													<table class="table table-bordered">
														<tr>
															<th>Id</th>
															<th>Id продукту</th>
															<th>Ім'я</th>
															<th>Відгук</th>
															<th>Дата</th>
															<th>Активація</th>
															<th>Редагування</th>
															<th>Видалення</th>
														</tr>
														<?php foreach ( $data['reviews'] as $review): ?>
														<tr>
															<td><?=$review->getId()?></td>
															<td><?=$review->getProduct_id()?></td>
															<td><?=$review->getUser_name()?></td>
															<td><?=$review->getReview()?></td>
															<td><?=$review->getDate()?></td>
															<td><a href="http://localhost/reviews/activate/<?=$review->getId()?>">активувати</a></td>
															<td>
																<a href="http://localhost/reviews/edit/<?=$review->getId()?>" >редагувати</a>
															</td>
															<td>
																<a href="http://localhost/reviews/delete/<?=$review->getId()?>" >видалити</a>
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