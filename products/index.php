<? include "../config/core.php";


	



	// site setting
	$menu_name = 'products';

	$site_set['nav_header'] = true;
   $site_set['nav_header_back'] = '/products/ph.php';
   $site_set['nav_header_tr'] = 'item';
   $site_set['nav_header_name'] = 'Категорий';

	$css = ['product'];
	$js = [];
?>
<? include "../block/header.php"; ?>

	<div class="">
		<div class="bl_c">

			<div class="catq">				
				<div class="head_c head_c1">
					<h3>Меню</h3>
				</div>
				<div class="catalog">

					<? $catalog = db::query("select * from product_catalog where arh is null"); ?>
					<? if (mysqli_num_rows($catalog)): ?>
						<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
							<? $cat_id = $cat_d['id']; ?>

							<div class="catalog_i">
								<a class="catalog_img" href="cat/?id=<?=$cat_id?>">
									<div class="catalog_imgc lazy_img" data-src="/assets/uploads/catalog/<?=$cat_d['img']?>"></div>
									<div class="catalog_imgc2 lazy_img" data-src="/assets/uploads/catalog/<?=$cat_d['img_f']?>"></div>
								</a>
								<div class="catalog_ic">
									<div class="catalog_in"><?=$cat_d['name_ru']?></div>
									<div class="catalog_ics">
										<a class="catalog_icsi" href="cat/?id=<?=$cat_id?>">Показать все</a>
										
										<? $pod_cat = db::query("select * from product_catalog where parent_id = '$cat_id'"); ?>
										<? if (mysqli_num_rows($pod_cat)): ?>
											<? while ($pod_cat_d = mysqli_fetch_assoc($pod_cat)): ?>
												<a class="catalog_icsi" href="cat/?id=<?=$pod_cat_d['id']?>">Pod cat 1</a>
											<? endwhile ?>
										<? endif ?>
										
									</div>
								</div>
							</div>
						<? endwhile ?>
					<? endif ?>
					
				</div>
			</div>

			<div class="ph_catq">
				<div class="head_c head_c1">
					<h5>Меню</h5>
				</div>
				<div class="ph_cat">

					<? $catalog = db::query("select * from product_catalog"); ?>
					<? if (mysqli_num_rows($catalog)): ?>
						<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
							<a class="ph_cat_i" href="cat/?id=<?=$cat_d['id']?>">
								<div class="ph_cat_in"><?=$cat_d['name_ru']?></div>
								<div class="catalog_img"></div>
							</a>
						<? endwhile ?>
					<? endif ?>

					<!-- <a class="ph_cat_i" href="/products/">
						<div class="ph_cat_in">Показать все</div>
						<div class="ph_cat_img"><i class="fal fa-long-arrow-right"></i></div>
					</a> -->

				</div>
			</div>

		</div>
	</div>

<? include "../block/footer.php"; ?>