<!-- history -->
<section class="jumbotron jumbotron-fluid bg-transparent" id="Story_page">
	<div class="container">
		<?php foreach ($story as $str) : ?>
			<div class="row margin-top">
				<div class="box-line-story"></div>
				<div class="col-xl-5 col-10 col-sm-8 margin-auto">
					<img src="<?= base_url('assets/img/website/') . $str->image;?>" class="w-100">
				</div>
				<div class="col-xl-7" id="story-teks">
					<span id="story_page">
					<div class="history"><h2>Story</h2></div>
					<br>
					<p>
						<?= $str->p1; ?>
					</p>
					<p>
						<?= $str->p2; ?>
					</p>
				</div>
			</div>
		<?php endforeach ?>
		
	</div>
</section>