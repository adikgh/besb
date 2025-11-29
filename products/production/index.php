<?php include "../../config/core.php";


	$brand_id = 9;


	// filter
	if ($_GET['on'] == 1) $product_all = db::query("select * from product where brand_id = '$brand_id'");
	elseif ($_GET['off'] == 1) $product_all = db::query("select * from product where brand_id = '$brand_id'");
	else $product_all = db::query("select * from product where brand_id = '$brand_id'");
	$page_result = mysqli_num_rows($product_all);

	// page number
	$page = 1; if ($_GET['page'] && is_int(intval($_GET['page']))) $page = $_GET['page'];
	$page_age = 24;
	$page_all = ceil($page_result / $page_age);
	if ($page > $page_all) $page = $page_all;
	$page_start = ($page - 1) * $page_age;
	$number = $page_start;

	// filter
	if ($_GET['on'] == 1) $product = db::query("select * from product where brand_id = '$brand_id' order by ins_dt desc limit $page_start, $page_age");
	elseif ($_GET['off'] == 1) $product = db::query("select * from product where brand_id = '$brand_id' order by ins_dt desc limit $page_start, $page_age");
	else $product = db::query("select * from product where brand_id = '$brand_id' order by ins_dt desc limit $page_start, $page_age");


	
	// site setting
	$menu_name = 'production';

	$site_set['swiper'] = true;
	$site_set['nav_header'] = true;
   $site_set['nav_header_back'] = '/products/ph.php';
   $site_set['nav_header_tr'] = 'item';
   $site_set['nav_header_name'] = 'Категорий';

	$css = ['product', 'production'];
	$js = ['production'];
?>
<? include "../../block/header.php"; ?>

	<div class="">
		<div class="bl_c">
			<div class="head_c head_c1">
				<h3 class="">Invisible | Встраевыемые гипсовые споты</h3>
			</div>
			<div class="">

				<div class="products_c">

					<? while ($pr_d = mysqli_fetch_assoc($product)): ?>
						<? $number++; $pr_id = $pr_d['id']; ?>

						<div class="swiper mySwiper_<?=$pr_id?>">
							<div class="swiper-wrapper">

								<? $pr_item = db::query("select * from product_item where product_id = '$pr_id'"); $i = 1; ?>
								<? while ($pr_item_d = mysqli_fetch_array($pr_item)): ?>
									<div class="swiper-slide item">
										<div class="item_c">
											<a href="item/?id=<?=$pr_item_d['id']?>">
												<div class="item_con">
													<div class="item_cons">
														<div class="item_name"><?=$pr_d['name_ru']?> | <?=$pr_item_d['article']?></div>
														<div class="item_desc"><?=$pr_d['description_ru']?></div>
													</div>
													<? if ($pr_item_d['price']): ?>
														<div class="item_price">
															<span><?=$pr_item_d['price']?></span>
															<i class="fas fa-tenge"></i>
														</div>
													<? endif ?>
												</div>
											</a>
											<a href="item/?id=<?=$pr_item_d['id']?>">
												<div class="item_img">
													<? if ($pr_item_d['img'] || $pr_item_d['img_room']): ?>
														<div class="item_img_c lazy_img" data-src="/assets/uploads/products/<?=$pr_item_d['img']?>"></div>
														<? if ($pr_item_d['img_room']): ?> <div class="item_img_c item_img_abs lazy_img" data-src="/assets/uploads/products/<?=$pr_item_d['img_room']?>"></div> <? endif ?>
													<? else: ?> <div class="item_img_c"><span>Фото скоро появится</span></div> <? endif ?>
													<div class="item_img_ppe">Сделано в KZ</div>
												</div>
											</a>
											<div class="item_cn">
												<div class="item_cn_yy">
													<div class="item_cn_yyi">
														<div class="item_cn_yyit">Материал</div>
														<div class="item_cn_yyic">GIPS</div>
													</div>
													<div class="item_cn_yyi">
														<div class="item_cn_yyit">Монтажное отверстие</div>
														<div class="item_cn_yyic">200x130</div>
													</div>
													<div class="item_cn_yyi">
														<div class="item_cn_yyit">Тип цоколя</div>
														<div class="item_cn_yyic">GU10</div>
													</div>
													<div class="item_cn_yyi">
														<div class="item_cn_yyit">Требуемая толшина потолка</div>
														<div class="item_cn_yyic">9-15см</div>
													</div>
												</div>
												<div class="item_cart">
													<button class="btn btn_p add_cart" data-id="<?=$pr_item_d['id']?>">Купить</button>
												</div>
											</div>
										</div>
									</div>
		
									<!-- <a class="item_others_i <?=($i==1?'item_others_act':'')?>" href="item/?id=<?=$pr_item_d['id']?>">
										<div class="lazy_img" data-src="/assets/uploads/products/<?=$pr_item_d['img']?>"></div>
									</a> -->
								<? endwhile ?>

							</div>
							<div class="swiper-button-prev swiper_prev_<?=$pr_id?>"><i class="fal fa-long-arrow-left"></i></div>
							<div class="swiper-button-next swiper_next_<?=$pr_id?>"><i class="fal fa-long-arrow-right"></i></div>
						</div>

						<script>
							var swiper_<?=$pr_id?> = new Swiper(".mySwiper_<?=$pr_id?>", {
								navigation: {
									nextEl: ".swiper_next_<?=$pr_id?>",
									prevEl: ".swiper_prev_<?=$pr_id?>",
								},
								breakpoints: {
									320: {
										slidesPerView: 1,
										spaceBetween: 20,
									},
									501: {
										slidesPerView: 2,
										spaceBetween: 30,
									},
									1025: {
										slidesPerView: 3,
										spaceBetween: 40,
									}
								}
							});
						</script>

					<? endwhile ?>
					
				</div>

			</div>
		</div>
	</div>

<? include "../../block/footer.php"; ?>

	<script>
		// 
		var swiper_bl23 = new Swiper(".swiper_bl23", {
			slidesPerView: "auto",
			// navigation: {
			// 	nextEl: ".swiper_next_bl23",
			// 	prevEl: ".swiper_prev_bl23",
			// },
		});
	</script>

