<? include "../../config/core.php";



	$cat_id = $_GET['id'];

	// filter
	if ($_GET['on'] == 1) $product_all = db::query("select * from product where catalog_id = '$cat_id' and sale_online = 1 and arh = 0");
	elseif ($_GET['off'] == 1) $product_all = db::query("select * from product where catalog_id = '$cat_id' and sale_online = 1 and arh = 0");
	else $product_all = db::query("select * from product where catalog_id = '$cat_id' and sale_online = 1 and arh = 0");
	$page_result = mysqli_num_rows($product_all);

	// page number
	$page = 1; if ($_GET['page'] && is_int(intval($_GET['page']))) $page = $_GET['page'];
	$page_age = 24;
	$page_all = ceil($page_result / $page_age);
	if ($page > $page_all) $page = $page_all;
	$page_start = ($page - 1) * $page_age;
	$number = $page_start;

	// filter
	if ($_GET['on'] == 1) $product = db::query("select * from product where catalog_id = '$cat_id' and sale_online = 1 and arh = 0 order by ins_dt desc limit $page_start, $page_age");
	elseif ($_GET['off'] == 1) $product = db::query("select * from product where catalog_id = '$cat_id' and sale_online = 1 and arh = 0 order by ins_dt desc limit $page_start, $page_age");
	else $product = db::query("select * from product where catalog_id = '$cat_id' and sale_online = 1 and arh = 0 order by ins_dt desc limit $page_start, $page_age");


	$cats_d = product::pr_catalog($cat_id);


	// site setting
	$menu_name = 'cat';

	$site_set['nav_header'] = true;
	$site_set['nav_header_back'] = '/';
	$site_set['nav_header_tr'] = 'item';
	$site_set['nav_header_name'] = 'Name 1';

	$css = ['product'];
	$js = [];
?>
<? include "../../block/header.php"; ?>

	<div class="">
		<div class="bl_c">
			<div class="head_c head_c1">
				<h3><?=$cats_d['name_ru']?></h3>
			</div>
			<div class="">
				<div class="products_c">

					<? while ($pr_d = mysqli_fetch_assoc($product)): ?>
						<? $number++; $pr_id = $pr_d['id']; ?>
						<? $item_d = product::product_item($pr_id); ?>

						<div class="item">
							<div class="item_c">
								<div class="item_img">
									<? if ($pr_d['img'] || $pr_d['img_room']): ?>
										<div class="item_img_c lazy_img" data-src="/assets/uploads/products/<?=$pr_d['img']?>"></div>
										<? if ($pr_d['img_room']): ?> <div class="item_img_c item_img_abs lazy_img" data-src="/assets/uploads/products/<?=$item_d['img_room']?>"></div> <? endif ?>
									<? else: ?> <div class="item_img_c"><span>Фото скоро появится</span></div> <? endif ?>
								</div>
								<div class="item_cn">
									<div class="item_con">
										<div class="item_cons">
											<div class="item_name"><?=$pr_d['name_ru']?></div>
											<? if ($pr_d['brand_id']): ?> <div class="item_desc"><?=(product::pr_brand($pr_d['brand_id']))['name']?></div> <? endif ?>
										</div>
										<? if ($pr_d['price']): ?>
											<div class="item_price">
												<span><?=$pr_d['price']?></span>
												<i class="fas fa-tenge"></i>
											</div>
										<? endif ?>
										<div class=""></div>
									</div>
								</div>
							</div>

						</div>
					<? endwhile ?>
					
				</div>

			</div>
		</div>
	</div>

<? include "../../block/footer.php"; ?>