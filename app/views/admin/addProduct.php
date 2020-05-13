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
					<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/admin/Sidebar.php'; ?>
					<div class="col-md-9 col-xs-12">
						<!-- START PRODUCT-AREA -->
						<div class="product-area">
							<div class="row">
								<div class="col-xs-12 col-md-12">		
									<div class="area-title">
										<h2 class="title-group gfont-1">Додайте продукт</h2><br>
									</div>
									<?php echo $data; ?>
								</div>
							</div>
						</div>
						<!-- END PRODUCT-AREA -->
					</div>
					<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/BrandLogo.php'; ?>
				</div>
			</div>
		</section>
		<!-- END PAGE-CONTENT -->