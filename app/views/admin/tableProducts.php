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
													<h2 class="title-group gfont-1">Продукти</h2><br>
												</div>
												<div>
													<table class="table table-bordered"> 
														<tr>
															<th>Id</th>
															<th>Id Категорії</th>
															<th>Назва</th>
															<th>Зображення</th>
															<th>Опис</th>
															<th>Характеристики</th>
															<th>Ціна</th>
															<th>Кількість</th>
															<th>видалити</th>
															<th>редагувати</th>
														</tr>
														<?php foreach ($data['products'] as $product): ?>
														<tr>
															<td><?= $product->getId(); ?></td>
															<td><?= $product->getCategory_id(); ?></td>
															<td><?= $product->getName(); ?></td>
															<td><a href="http://localhost/app/images/<?= $product->getImages(); ?>"><img src="http://localhost/app/images/<?= $product->getImages(); ?>" height="60px"></a><?= $product->getImages(); ?></td>
															<td><?= mb_strimwidth($product->getDescription(), 0, 100, "..."); ?></td>
															<td><?= $product->getProperties(); ?></td>
															<td><?= $product->getPrice(); ?></td>
															<td><?= $product->getCount(); ?></td>
															<td><a href="http://localhost/product/delete/<?php echo $product->getId(); ?>">видалити</a></td>
															<td><a href="http://localhost/product/edit/<?php echo $product->getId(); ?>">редагувати</a></td>
														</tr>
														<?php endforeach; ?>
													</table>
													<a href="http://localhost/product/add"><h2>Додати продукт</h2></a>
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
			
			
		</section>
		<!-- END PAGE-CONTENT -->