		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
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
													<h2 class="title-group gfont-1">Категорії</h2><br>
												</div>
												<div>
													<table class="table">
														<tr>
															<th>Id</th>
															<th>Назва</th>
															<th>Parent Id</th>
															<th>видалити</th>
															<th>редагувати</th>
														</tr>
													<?php foreach ( $data['categories'] as $category): ?>
														<tr>
															<td><?=$category->getId()?></td>
															<td><?=$category->getName()?></td>
															<td><?=$category->getParent_id()?></td>
															<td>
																<a href="http://localhost/category/delete/<?=$category->getId()?>" >видалити</a>
															</td>
															<td>
																<a href="http://localhost/category/edit/<?=$category->getId()?>" >редагувати</a>
															</td>
														</tr>
													<?php endforeach; ?>
													</table>
													<div class="add-category"><a href="http://localhost/category/add">Додати категорію</a></div>
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