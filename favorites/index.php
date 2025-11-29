<?php include "../config/core.php";

	// 
	if ($user_id) {
		$product_all = db::query("select * from on_favorites where user_id = '$user_id'");
		$page_result = mysqli_num_rows($product_all);
	} else {
		if (isset($_SESSION['favorites'])) {
			$page_result = count($_SESSION['favorites']);
			foreach ($_SESSION['favorites'] as $value) $ln = $ln . $value . ', ';
			$ln = substr($ln, 0, -2);
		}
	}

	// page number
	$page = 1; if ($_GET['page'] && is_int(intval($_GET['page']))) $page = $_GET['page'];
	$page_age = 24;
	$page_all = ceil($page_result / $page_age);
	if ($page > $page_all) $page = $page_all;
	$page_start = ($page - 1) * $page_age;
	$number = $page_start;

	if ($user_id) $favorites = db::query("select * from on_favorites where user_id = '$user_id' order by ins_dt desc limit $page_start, $page_age");
	else $favorites = db::query("select * from product_item where id in ($ln) order by ins_dt desc limit $page_start, $page_age");

	// site setting
	$menu_name = 'favorites';
	$site_set['pmenu'] = true;

	$site_set['nav_header'] = true;
   // $site_set['nav_header_back'] = '/';
   // $site_set['nav_header_link'] = '/';
   $site_set['nav_header_name'] = 'Любимые товары';
	$css = ['favorites'];
	$js = [];
?>
<?php include "../block/header.php"; ?>

	<div class="">
		<div class="bl_c">
			<div class="head_c head_c1 ph_none">
				<h3>Ваши любимые</h3>
			</div>

			<? if (isset($_SESSION['favorites']) || ($user_id && mysqli_num_rows($favorites))): ?>
				<div class="">
					
					<div class="products_s">
						<div class="products_sr">
							<div class="products_sr_sel">
								<div class="products_sr_seli products_sr_sel_act">Товар</div>
								<div class="products_sr_seli">Комната</div>
							</div>
							<div class="products_sr_it"><?=$page_result?> позиции</div>
						</div>
					</div>

					<div class="products_c">

						<? while ($fp_d = mysqli_fetch_assoc($favorites)): ?>
							<? $number++; ?>
							<? $pr_d = product::product($fp_d['product_id']); ?>
							<? if ($user_id) $item_d = product::pr_item($fp_d['item_id']); else $item_d = $fp_d; ?>
							

							<div class="item">
								<div class="item_c">
									<button class="btn btn_dd item_favorites item_favorites_act add_favorites2" data-id="<?=$item_d['id']?>"><i class="fal fa-heart"></i></button>
									<a href="item/?id=<?=$item_d['id']?>">
										<div class="item_img">
											<? if ($item_d['img'] || $item_d['img_room']): ?>
												<div class="item_img_c lazy_img" data-src="/assets/uploads/products/<?=$item_d['img']?>"></div>
												<? if ($item_d['img_room']): ?> <div class="item_img_c item_img_abs lazy_img" data-src="/assets/uploads/products/<?=$item_d['img_room']?>"></div> <? endif ?>
											<? else: ?> <div class="item_img_c"><span>Фото скоро появится</span></div> <? endif ?>
										</div>
									</a>
									<div class="item_cn">
										<a href="item/?id=<?=$item_d['id']?>">
											<div class="item_con">
												<div class="item_cons">
													<div class="item_name"><?=$pr_d['name_ru']?></div>
													<? if ($pr_d['brand_id']): ?> <div class="item_desc"><?=(product::pr_brand($pr_d['brand_id']))['name']?></div> <? endif ?>
												</div>
												<? if ($item_d['price']): ?>
													<div class="item_price">
														<span><?=$item_d['price']?></span>
														<i class="fas fa-tenge"></i>
													</div>
												<? endif ?>
												<div class=""></div>
											</div>
										</a>
										<div class="item_cart">
											<button class="btn btn_dd btn_dd_cl add_cart" data-id="<?=$item_d['id']?>">
												<div class="item_cart_btn_add">
													<i class="fal fa-shopping-bag"></i>
													<i class="fal fa-plus item_cart_icon_plus"></i>
												</div>
											</button>
										</div>
									</div>
								</div>
							</div>
						<? endwhile ?>
						
					</div>

					<? if ($page_all > 1): ?>
						<div class="uc_p">
							<? if ($page > 1): ?> <a class="uc_pi" href="<?=$url?>?page=<?=$page-1?>"><i class="fal fa-angle-left"></i></a> <? endif ?>
							<a class="uc_pi <?=($page==1?'uc_pi_act':'')?>" href="<?=$url?>?page=1">1</a>
							<? for ($pg = 2; $pg < $page_all; $pg++): ?>
								<? if ($pg == $page - 1): ?>
									<? if ($page - 1 != 2): ?> <div class="uc_pi uc_pi_disp">...</div> <? endif ?>
									<a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="<?=$url?>?page=<?=$pg?>"><?=$pg?></a>
								<? endif ?>
								<? if ($pg == $page): ?> <a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="<?=$url?>?page=<?=$pg?>"><?=$pg?></a> <? endif ?>
								<? if ($pg == $page + 1): ?>
									<a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="<?=$url?>?page=<?=$pg?>"><?=$pg?></a>
									<? if ($page + 1 != $page_all - 1): ?> <div class="uc_pi uc_pi_disp">...</div> <? endif ?>
								<? endif ?>
							<? endfor ?>
							<a class="uc_pi <?=($page==$page_all?'uc_pi_act':'')?>" href="<?=$url?>?page=<?=$page_all?>"><?=$page_all?></a>
							<? if ($page < $page_all): ?> <a class="uc_pi" href="<?=$url?>?page=<?=$page+1?>"><i class="fal fa-angle-right"></i></a> <? endif ?>
						</div>
					<? endif ?>

				</div>
			<? else: ?>
				none
			<? endif ?>

		</div>
	</div>

<?php include "../block/footer.php"; ?>