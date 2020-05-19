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
					<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/sidebar.php'; ?>
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
													<h3 class="title-group gfont-1">Ура , ви завершили реєстрацію!</h3><br>
												</div>
												<div>
													<?=$data;?>
												</div>
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