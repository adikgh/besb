<? include "../config/core.php";

	// 
	if ($user_id) {
		$product_all = db::query("select * from on_cart where user_id = '$user_id'");
		$page_result = mysqli_num_rows($product_all);
	} else {
		if (isset($_SESSION['favorites'])) {
			$page_result = count($_SESSION['favorites']);
			foreach ($_SESSION['favorites'] as $value) $ln = $ln . $value . ', ';
			$ln = substr($ln, 0, -2);
		}
	}

	if ($user_id) $favorites = db::query("select * from on_cart where user_id = '$user_id' order by ins_dt desc");
	else $favorites = db::query("select * from product_item where id in ($ln) order by ins_dt desc");


	$number = 0; $sum = 0; $totol = 0;

	// site setting
	$menu_name = 'cart';
	
	$site_set['nav_header'] = true;
   $site_set['nav_header_back'] = '/';
   // $site_set['nav_header_link'] = '/';
   $site_set['nav_header_name'] = 'Корзина';
	$site_set['pmenu'] = false;
	$css = ['cart'];
	$js = ['cart'];
?>
<? include "../block/header.php"; ?>

	<div class="">
		<div class="bl_c">
			<div class="head_c head_c1 ph_none">
				<h3>Корзина</h3>
			</div>

			<? if (isset($_SESSION['favorites']) || ($user_id && mysqli_num_rows($favorites))): ?>
				<div class="carts">
					
					<!-- <div class="products_s">
						<div class="products_sr">
							<div class="products_sr_sel">
								<div class="products_sr_seli products_sr_sel_act">Товар</div>
								<div class="products_sr_seli">Комната</div>
							</div>
							<div class="products_sr_it"><?=$page_result?> позиции</div>
						</div>
					</div> -->

					<div class="carts_c">

						<div class="carts_i carts_it">
							<div class="carts_ic"><?=$page_result?> товаров</div>
							<div class="carts_iz carts_iz_calc">Количества</div>
							<div class="carts_iz">Сумма</div>
							<!-- <div class="carts_iz carts_izc">
								<div class="btn btn_back">Удалить все</div>
							</div> -->
						</div>

						<? while ($fp_d = mysqli_fetch_assoc($favorites)): ?>
							<? $pr_d = product::product($fp_d['product_id']); ?>
							<? if ($user_id) $item_d = product::pr_item($fp_d['item_id']); else $item_d = $fp_d; ?>
							<? $number++; ?>

							<? 
								if ($designer) { $sum = ($item_d['price'] - ($item_d['price'] / 10)) * $fp_d['quantity']; $totol = $totol + $sum; }
								else { $sum = $item_d['price'] * $fp_d['quantity']; $totol = $totol + $sum; }
							?>
							
							
							<div class="carts_i">
								<div class="carts_i1">
									<a class="carts_ic" href="../products/item/?id=<?=$item_d['id']?>">
										<div class="item_img">
											<? if ($item_d['img'] || $item_d['img_room']): ?>
												<div class="item_img_c lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$item_d['img']?>"></div>
												<? if ($item_d['img_room']): ?> <div class="item_img_c item_img_abs lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$item_d['img_room']?>"></div> <? endif ?>
											<? else: ?> <div class="item_img_c"><span>Фото скоро появится</span></div> <? endif ?>
										</div>
									</a>
									<div class="item_con">
										<a class="item_name"><?=$pr_d['name_ru']?></a>
										<div class="carts_ic_pr">
											<div class="carts_ic_pri">
												<span>Цвет</span>
												<span>Белый</span>
											</div>
											<div class="carts_ic_pri">
												<span>Размер</span>
												<span>120В</span>
											</div>
											<div class="carts_ic_pri">
												<span>Цена</span>
												<div class="item_price">
													<? if ($designer): ?><span class="fr_number"><?=($item_d['price'] - ($item_d['price'] / 10))?></span>
													<? else: ?><span class="fr_number"><?=$item_d['price']?></span><? endif ?>
													<i class="fal fa-tenge"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="carts_im">
									<div class="carts_iz carts_iz_calc">
										<div class="uc_uin_calc" data-id="<?=$fp_d['id']?>" data-price="<?=($designer?$item_d['price'] - ($item_d['price'] / 10):$item_d['price'])?>" data-quantity="<?=$fp_d['quantity']?>" data-max="<?=$fp_d['quantity']?>">
											<div class="uc_uin_calc_m minus_cart"><i class="fal fa-minus"></i></div>
											<input type="tel" class="uc_uin_calc_q fr_number3 quantity_cart" value="<?=$fp_d['quantity']?>" />
											<div class="uc_uin_calc_p plus_cart"><i class="fal fa-plus"></i></div>
										</div>
									</div>
									<div class="carts_iz">
										<div class="item_price">
											<span class="fr_number"><?=$sum?></span>
											<i class="fal fa-tenge"></i>
										</div>
									</div>
									<!-- <div class="carts_iz carts_izc">
										<div class="btn btn_dd2 delete_cart" data-id="<?=$fp_d['id']?>"><i class="fal fa-trash"></i></div>
									</div> -->
								</div>
							</div>

						<? endwhile ?>
						
					</div>

					<div class="carts_p">
						<div class="carts_pc">
							<div class="carts_ph">Итог заказа</div>
							<div class="carts_pm">
								<div class="carts_pmi">
									<div class="carts_pmil">Товары (6)</div>
									<div class="carts_pmir">
										<span class="fr_number"><?=$totol?></span>
										<i class="fal fa-tenge"></i>
									</div>
								</div>
								<div class="carts_pmi">
									<div class="carts_pmil">Скидка</div>
									<div class="carts_pmir fr_number">0</div>
								</div>
							</div>
							<div class="carts_pd carts_pmi">
								<div class="carts_pmil">Общее</div>
								<div class="carts_pmir">
									<span class="fr_number"><?=$totol?></span>
									<i class="far fa-tenge"></i>
								</div>
							</div>
							<div class="carts_pp">
								<!-- <a class="btn btn_or" href="delivery.php">Оформить заказ</a> -->
								<div class="btn btn_or delivery_order" data-sum="<?=$totol?>">Оформить</div>
							</div>
							<div class="carts_pp">
								<a class="btn btn_back" href="offer.php">На offer</a>
							</div>
						</div>
					</div>

					<div class="carts_bh">
						<div class="carts_bhc">
							<div class="bl_c">
								<div class="carts_pd carts_pmi">
									<div class="carts_pmil">Общее</div>
									<div class="carts_pmir">
										<span class="fr_number"><?=$totol?></span>
										<i class="far fa-tenge"></i>
									</div>
								</div>
								<div class="carts_pp">
									<!-- <a class="btn btn_or" href="delivery.php">Оформить</a> -->
									<div class="btn btn_or delivery_order" data-sum="<?=$totol?>">Оформить</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			<? else: ?>

				<h6>У вас пустой корзина</h6>

			<? endif ?>

		</div>
	</div>

<? include "../block/footer.php"; ?>