		<section class="page-content">
			<div class="container">
	            <div class="row">
					<div class="col-md-12">
						<ul class="page-menu">
							<li><a href="../../../index.html">Home</a></li>
							<li class="active"><a href="../../../#">Bestseller Product</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/Sidebar.php'; ?>
					<div class="col-md-9 col-xs-12">
						<div class="col-md-12"><br>
							<div class="area-title">
								<h2 class="title-group gfont-1">Реєстрація</h2><br>
							</div>
						</div>
						<div class="register">
						<?php echo $data; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- End Account-Create-Area -->
			<!-- START BRAND-LOGO-AREA -->
			<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/BrandLogo.php'; ?>
			<!-- END BRAND-LOGO-AREA -->
		</section>
		<!-- END PAGE-CONTENT -->