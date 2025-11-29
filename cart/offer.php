<? include "../config/core.php";

	// 
	if ($user_id) {
		$product_all = db::query("select * from on_cart where user_id = '$user_id'");
		$page_result = mysqli_num_rows($product_all);
		$cart_d = mysqli_fetch_assoc($product_all);
	} else {
		if (isset($_SESSION['favorites'])) {
			$page_result = count($_SESSION['favorites']);
			foreach ($_SESSION['favorites'] as $value) $ln = $ln . $value . ', ';
			$ln = substr($ln, 0, -2);
		}
	}

	if ($user_id) $favorites = db::query("select * from on_cart where user_id = '$user_id' order by ins_dt desc");
	else $favorites = db::query("select * from product_item where id in ($ln) order by ins_dt desc");


	$number = 0; $sq = 0; $sum = 0; $totol = 0;

	// site setting
	$menu_name = 'cart';
	
	$site_set['header'] = false;
	$site_set['menu'] = false;
	$site_set['footer_t'] = false;
	$site_set['nav_header'] = true;
   $site_set['nav_header_back'] = '/';
   // $site_set['nav_header_link'] = '/';
   $site_set['nav_header_name'] = 'Корзина';
	$site_set['pmenu'] = false;
	$css = ['cart', 'offer'];
	$js = ['cart'];
?>
<? include "../block/header.php"; ?>

	<div class="">

		<div class="offer_header">
			<div class="bl_c">
				<div class="offer_header_c">
					<div class="offer_header_c1">
						<h3>ЦЕНОВОЕ ПРЕДЛОЖЕНИЕ</h3>
						<h5>№ <?=$cart_d['id']?></h5>
						<div class="">Клиент: <b><?=$user['name']?></b></div>
					</div>
					<div class="offer_header_c2">
						<a href="/"><h5 class=""><?=$site['site']?>.kz</h5></a>
						
					</div>
				</div>
			</div>
		</div>

		<div class="bl_c">

			<? if (isset($_SESSION['favorites']) || ($user_id && mysqli_num_rows($favorites))): ?>
				<div class="carts">

					<div class="carts_c">

						<div class="carts_i">
							<!-- <div class="carts_ic"><?=$page_result?> товаров</div> -->
							<div class="carts_ic">Фото</div>
							<div class="item_con">Описание</div>
							<div class="carts_iz">Количества</div>
							<div class="carts_iz">Цена</div>
							<div class="carts_iz">Сумма</div>
						</div>

						<? while ($fp_d = mysqli_fetch_assoc($favorites)): ?>
							<? $pr_d = product::product($fp_d['product_id']); ?>
							<? if ($user_id) $item_d = product::pr_item($fp_d['item_id']); else $item_d = $fp_d; ?>
							<? $number++; $sq = $sq + $fp_d['quantity']; ?>
							<? 
								if ($designer) { $sum = ($item_d['price'] - ($item_d['price'] / 10)) * $fp_d['quantity']; $totol = $totol + $sum; }
								else { $sum = $item_d['price'] * $fp_d['quantity']; $totol = $totol + $sum; }
							?>
							
							<div class="carts_i">
								<div class="carts_ic">
									<div class="item_img">
										<? if ($item_d['img'] || $item_d['img_room']): ?>
											<div class="item_img_c lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$item_d['img']?>"></div>
											<? if ($item_d['img_room']): ?> <div class="item_img_c item_img_abs lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$item_d['img_room']?>"></div> <? endif ?>
										<? else: ?> <div class="item_img_c"><span>Фото скоро появится</span></div> <? endif ?>
									</div>
								</div>
								<div class="item_con">
									<div class="item_name"><?=$pr_d['name_ru']?></div>
								</div>
								<div class="carts_iz">
									<span class="fr_number3"><?=$fp_d['quantity']?></span>
								</div>
								<div class="carts_iz carts_iz2">
									<div class="item_price item_price_old">
										<span class="fr_number"><?=$item_d['price']?></span>
										<i class="fal fa-tenge"></i>
									</div>
									<div class="item_price">
										<span class="fr_number"><?=($item_d['price'] - ($item_d['price'] / 10))?></span>
										<i class="fal fa-tenge"></i>
									</div>
								</div>
								<div class="carts_iz">
									<div class="item_price">
										<span class="fr_number"><?=$sum?></span>
										<i class="fal fa-tenge"></i>
									</div>
								</div>
							</div>

						<? endwhile ?>

						<div class="carts_i">
							<div class="carts_ic">ИТОГО</div>
							<div class="item_con"></div>
							<div class="carts_iz">
								<span class="fr_number3"><?=$sq?></span>
							</div>
							<div class="carts_iz"></div>
							<div class="carts_iz">
								<div class="item_price">
									<span class="fr_number"><?=$totol?></span>
									<i class="fal fa-tenge"></i>
								</div>
							</div>
						</div>
						
					</div>

				</div>

			<? else: ?> <h6>Пусто</h6> <? endif ?>

			<div class="sqe">
				<div class="carts_pp">
					<!-- <a class="btn btn_or" href="delivery.php">Оформить заказ</a> -->
					<div class="btn btn_or " >Оформить заказ</div>
				</div>
			</div>

		</div>
	</div>

<? include "../block/footer.php"; ?>