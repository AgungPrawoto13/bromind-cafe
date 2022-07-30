<!-- Menu -->
<section class="jumbotron jumbotron-fluid bg-transparent" id="Produk">
	<div class="container shopping-cart">
		<div class="row margin-top">
			<div class="col-4 col-md-6">
				<h5>Product</h5>
			</div>
			<div class="col-8 col-xl-3 col-md-6">
				<input type="text" name="cari" id="cari" class="form-control search" placeholder="Search ...">
		    	<span class="glyphicon glyphicon-search form-control-feedback"></span>
			</div>
			<div class="col-xl-12 mt-3" id="type">
		    	<ul>
		    		<li>
		    			<a href="<?= base_url('LandingPage/menu') ?>">
		    				<h5>All</h5>
		    			</a>
		    		</li>
		    		<li>
		    			<a href="#">
		    				<h5>Food</h5>
		    			</a>
		    		</li>
		    		<li>
		    			<a href="<?= base_url('LandingPage/baverage') ?>">
		    				<h5>Baverage</h5>
		    			</a>
		    		</li>
		    	</ul>
		    </div>
		    <div class="row m-auto" id="data" style="width: 100%;">
		    	<?php
		    	foreach($product as $pd) :?>
					<div class="form-group col-12 col-xl-4 col-md-6 mt-5">
						<div class="col-xl-12 col-md-12 col-12 produk list-product">
							<a href="#" data-toggle="modal" data-target="#MenuDetail<?= $pd['product_id'];?>" class="text-dark">
								<div class="image-prduk col-10 col-xl-12 m-auto">
									<img src="<?= base_url('assets/img/product/') . $pd['product_img']; ?>" class="w-100">
									<div class="mt-4 col-12 text-center col-md-12 col-xl-10" id="name_produk">
										<h3 class="noto-sans6 col-md-12 margin-auto"><?= $pd['product_name']; ?></h3>
									</div>
								</div>
								<div class="harga"><h5 class="text-center mt-1 text-white">
									Rp
									<span><?= $pd['price']; ?><span></h5>
								</div>
							</a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>