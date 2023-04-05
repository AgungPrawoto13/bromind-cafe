<!-- bagian hero / tampilan awal -->
<section class="Hero" class="carousel slide mobile" data-ride="carousel">
	<div class="full">
		<div class="carousel-inner">
			<div class="carousel-caption d-md-block bromind bromind-text">
				<img src="<?= base_url('assets/');?>img/BROMIND.png">
			</div>
			<?php foreach ($website as $web) : ?>
			<div class="carousel-caption d-md-block teks kopi1 cofe1 h-25 w-75">
				<img src="<?= base_url('assets/');?>img/tumpah 1.png" class="w-100">
			</div>
			<div class="carousel-caption d-md-block teks kopi2 cofe2 h-25">
				<img src="<?= base_url('assets/');?>img/tumpah 2.png" class="w-100">
			</div>
			<div class="carousel-caption d-md-block tombol tombol-btn col-xl-2 col-4">
				<a href="#Produk">
					<img src="<?= base_url('assets/');?>img/Group 108.png" class="w-100">
				</a>
			</div>
			<div class="carousel-caption d-md-block teks follow_us">
				<a href="<?= $web['fb']; ?>" target="blank">
					<div id="blackr" class="text-center">
                        <i class="fab fa-facebook-f"></i>
                    </div>
				</a>
				<a href="<?= $web['ig']; ?>" target="blank">
					<div id="blackr" class="text-center">
                        <i class="fab fa-instagram"></i>
                    </div>
				</a>
				<a href="<?= $web['wa']; ?>" target="blank">
					<div id="blackr" class="text-center">
                        <i class="fab fa-whatsapp"></i>
                    </div>
				</a>
				<a href="<?= $web['yt']; ?>" target="blank">
					<div id="blackr" class="text-center">
                        <i class="fab fa-youtube"></i>
                    </div>
				</a>
			</div>
			<?php endforeach ?>
			<div class="carousel-item active">
				<img src="<?= base_url('assets/');?>img/menu.png" class="w-100 background" alt="gambar 1">
			</div>
		</div>
	</div>
</section>

<!-- bagian fasilitas -->
<section class="jumbotron jumbotron-fluid bg-transparent my-0 margin-top" id="Fasilitas">
	<div class="container mt-5">
		<div class="col-sm-9 col-xl-7 m-auto facilities">
			<h3>Facilities</h3>
		</div>
		<div class="col-sm-9 col-xl-7 m-auto" id="facilities">
			<img src="<?= base_url('assets/');?>img/Group 120.png" class="w-100">
		</div>
	</div>
</section>

<!-- bagian Story -->
<section class="jumbotron jumbotron-fluid bg-transparent" id="Story">
	<div class="container mt-5">
		<div class="row">
        <?php foreach($story as $str) : ?>
        	<div class="box-line"></div>
			<div class="col-sm-9 col-xl-5 right margin-auto col-md-6 m-auto Group_121 ">
				<img src="<?= base_url('assets/img/website/'.$str->image);?>" class="w-100">
			</div>
			<div class="col-sm-12 col-xl-6 col-md-6" id="story">
				<div class="col-xl-12">
					<h2 class="text-dark"><b>Story</b></h2>
					<?php foreach ($story as $str) : ?>
						<p>
							<?= substr($str->p1, 0, 500) . '...'; ?>
						</p>
					<?php endforeach ?>
				</div>
				<div class="col-xl-4 col-5 col-sm-3 mt-4 col-md-5 margin-left-d" id="button-story">
					<a href="<?= base_url('LandingPage/story');?>">
						<button type="button" class="btn btn-outline-danger">Full Story</button>
					</a>
				</div>
			</div>
        <?php endforeach; ?>
		</div>
	</div>
</section>

<!-- bagian best menu -->
<section class="jumbotron jumbotron-fluid bg-transparent" id="Produk">
	<div class="container">
		<div class="col-12 col-sm-5 col-xl-2" id="best-menu">
			<h3>Best Menu</h3>
		</div>
		<div class="row mt-5">
			<?php
			foreach ($product as $p) :?>
				<div class="form-group col-xl-4 col-md-12">
					<div class="col-xl-12 col-md-7 col-12 produk margin-auto mt-3">
						<div class="harga"><h5 class="text-center mt-1 text-white"><?= 'Rp ' . number_format($p->price,0,"",".") ?></h5></div>
						<div class="image-prduk margin-auto">
							<img src="<?= base_url('assets/img/product/') . $p->product_img ?>" class="w-100 margin-let">
						</div>
						<div class="card-body mt-4 text-center margin-auto" id="name_produk">
							<h3 class="noto-sans6 col-xl-12"><?= $p->product_name ?></h3>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			<div class="col-6 col-xl-2 col-sm-3 col-md-3 m-auto" id="all-produk">
				<a href="<?= base_url('LandingPage/menu');?>">
					<button class="btn btn-danger col-sm-12">All Product</button>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- bagian promo pembayaran-->
<section class="jumbotron jumbotron-fluid bg-transparent mt-5" id="Promo">
	<div class="container mt-5">
		<div class="row">
            <?php foreach ($promo as $pm) : ?>
                <div class="form-group col-sm-9 col-xl-6 mt-5 col-md-7 margin-auto margin-bottom">
                    <div class="card">
                        <div class="col-xl-5 discount discount-m">
                            <img src="<?= base_url('assets/');?>img/label-promo.png">
                        </div>
                        <div class="row p-5">
                            <div class="col-xl-5 col-6 col-sm-6 col-md-6 m-auto ovo">
                                <img src="<?= base_url('assets/img/website/') . $pm->promo_img; ?>" class="icon-photo w-100">
                            </div>
                            <div class="col-xl-7 col-12 gopay">
                                <h4><b><?= $pm->promo_name ?></b></h4>
                                <?= $pm->promo_detail ?>
                                <br><br>
                                <b><?= $pm->period ?></b>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
		</div>
	</div>
</section>

<!-- bagian location -->
<section class="jumbotron jumbotron-fluid bg-transparent mt-5" id="Lokasi">
	<div class="container mt-5">
		<div class="row">
            <?php foreach ($website as $web) : ?>
            	<div class="box-line"></div>
				<div class="col-xl-5 col-sm-9 col-md-6 geser margin-auto Group_124" id="image-resto">
					<img src="<?= base_url('assets/img/website/'.$web['loc_img']);?>" class="w-100">
				</div>
				<div class="col-xl-6 col-md-5" id="location">
					<div class="col-xl-12">
						<h3>Location</h3>
						<font class="nunito2"><?= $web['location'] ?></font>
					</div>
					<div class="col-6 col-sm-4 col-xl-6 mt-5 col-md-6" id="button-maps">
						<a href="<?= $web['maps'] ?>" target="blank">
							<button class="btn btn-danger col-xl-6">Maps</button>
						</a>
					</div>
				</div>
            <?php endforeach; ?>
		</div>
	</div>
</section>

