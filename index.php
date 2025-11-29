<? include "config/core.php";

	// site setting
	$menu_name = 'home';

	$site_set['pmenu'] = true;
	$site_set['swiper'] = true;

	header('location: /products/');

	// $css = ['product', ''];
	$js = ['index'];

?>
<? include "block/header.php"; ?>

	<!-- <div class="bl_c">
		<div class="bs"></div>
	</div> -->

	<div class="bl_c">
		<div class="bla1">
			<div class="bla1s">
				<div class="bla1s_l">
					<div class="bla1s_l1">космические условия для дизайнеров</div>
					<div class="bla1s_l2">
						<div class="">30%</div>
						<div class="">На первый заказ <br> дизайнерского <br> бонуса</div>
					</div>
					<a href="#" class="bla1s_l3">подробнее</a>
				</div>
				<div class="bla1s_r">
					<div class="lazy_img" data-src="/assets/img/bag/image 5.png"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="bl1">
		<div class="bl_c">
			<div class="head_c">
				<h4>Категории</h4>
			</div>
			<div class="catalog catalog_fea">
				<? $catalog = db::query("select * from product_catalog where home_s is not null order by home_s asc limit 8"); ?>
				<? if (mysqli_num_rows($catalog)): ?>
					<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
						<? $cat_id = $cat_d['id']; ?>
						<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
							<div class="catalog_img">
								<div class="catalog_imgc lazy_img" data-src="/assets/uploads/catalog/<?=$cat_d['img']?>"></div>
								<div class="catalog_imgc2 lazy_img" data-src="/assets/uploads/catalog/<?=$cat_d['img_f']?>"></div>
							</div>
							<div class="catalog_in">
								<div class="catalog_inc"><?=$cat_d['name_ru']?></div>
							</div>
						</a>
					<? endwhile ?>
				<? endif ?>
			</div>
		</div>
	</div>


	<!--  -->
	<div class="hb1">
		<div class="bl_c">
			<div class="hb1_c">

				<div class="hb1_i">
					<div class="hb1_img lazy_img" data-src="/assets/img/bag/image 6.png"></div>
					<div class="hb1_ic">
						<div class="hb1_icw">
							<div class="hb1_icwh">Делаем люстры на заказ по индивидуальным проектам</div>
							<div class="hb1_icwp">
								<p>Вы можете заказать люстры любой сложности и размеров, комплектуем Ваши проекты по освещению. Мы делаем уникальные люстры для ресторанов, отелей, театров и частных домов.</p>
								<p>Есть задача по освещению? Отправьте нам. Наш менеджер свяжется с Вами с просчетом проекта</p>
							</div>
						</div>
						<div class="hb1_icb">
							<div class="btn btn_dd btn_ddb"><i class="fal fa-long-arrow-right"></i></div>
						</div>
					</div>
				</div>

				<div class="hb1_i">
					<div class="hb1_img lazy_img" data-src="/assets/img/bag/image 26.png"></div>
					<div class="hb1_ic">
						<div class="hb1_icw">
							<div class="hb1_icwh">ПОДБОР И РАСЧЕТ ОСВЕЩЕНИЯ</div>
							<div class="hb1_icwp">
								<p>Мы поможем разобраться в вашем дизайн-проекте и просчитаем предложенное освещение или подберем аналоги. Для удобства, мы создали на сайте раздел с услугой по просчету осветительной продукции. Теперь нет необходимости отправлять письмо нам на почту. Все, что вам необходимо сделать - заполнить форму услуги, оставить пожелания в окошке "комментарии", приложить проект и отправить нам. Так же вы можете оставить пожелания по способу связи с вами: звонок от менеджера, сообщение в мессенджере или письмо на почту.</p>
								<ul>
									<li>- Вам не нужно тратить свое время на подбор светильников.</li>	
									<li>- У вас будет персональный менеджер, с которым вы сможете обсудить все детали и нюансы по просчету.</li>
									<li>- Услуга бесплатная.</li>
								</ul>
								<p>Обращайтесь! Будем рады помочь!</p>
							</div>
						</div>
						<div class="hb1_icb">
							<div class="btn btn_dd btn_ddb"><i class="fal fa-long-arrow-right"></i></div>
						</div>
					</div>
				</div>

				<div class="hb1_i">
					<div class="hb1_img lazy_img" data-src="/assets/img/bag/kakie-lyustry-sejchas-v-mode-2.jpg"></div>
					<div class="hb1_ic">
						<div class="hb1_icw">
							<div class="hb1_icwh">Делаем люстры на заказ по индивидуальным проектам</div>
							<div class="hb1_icwp">
								<p>Вы можете заказать люстры любой сложности и размеров, комплектуем Ваши проекты по освещению. Мы делаем уникальные люстры для ресторанов, отелей, театров и частных домов.</p>
								<p>Есть задача по освещению? Отправьте нам. Наш менеджер свяжется с Вами с просчетом проекта</p>
							</div>
						</div>
						<div class="hb1_icb">
							<div class="btn btn_dd btn_ddb"><i class="fal fa-long-arrow-right"></i></div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>


	<div class="bl21">
		<div class="bl_c">
			<div class="head_c">
				<h4>Услуги, которые помогут вам делать покупки</h4>
			</div>
			<div class="catalog bl21_c">
				<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
					<i class="far fa-comment-exclamation"></i>
					<div class="bl21_csh">Часто задаваемые вопросы</div>
					<div class="bl21_csp">Новости о безопасных покупках в наших магазинах.</div>
					<div class="btn btn_back">Учить больше</div>
				</a>
				<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
					<i class="far fa-credit-card"></i>
					<div class="bl21_csh">Способы оплаты</div>
					<div class="bl21_csp">Финансируйте дом своей мечты с помощью наших кредитных карт.</div>
					<div class="btn btn_back">Учить больше</div>
				</a>
				<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
					<i class="far fa-truck"></i>
					<div class="bl21_csh">Доставка</div>
					<div class="bl21_csp">Покупайте не выходя из дома и получайте доставку на дом.</div>
					<div class="btn btn_back">Учить больше</div>
				</a>
				<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
					<i class="far fa-hard-hat"></i>
					<div class="bl21_csh">Сборка</div>
					<div class="bl21_csp">Найдите гибкие и доступные способы выполнения ваших задач.</div>
					<div class="btn btn_back">Учить больше</div>
				</a>
			</div>
			<div class="bl21_b">
				<div class="btn">Посмотреть все услуги</div>
			</div>
		</div>
	</div>

	<div class="bl22">
		<div class="bl_c">
			<div class="head_c">
				<h4>Популярные светильники</h4>
			</div>
			<div class="">
				<div class="bl22_tc">
					<div class="bl22_tcl">
						<div class="lazy_img" data-src="/assets/img/bag/image 23.png"></div>
					</div>
					<div class="bl22_tcr">
						<div class="bl22_tcr1">Светильники магнитной <br> системы освещения</div>
						<div class="bl22_tcr2">Трековые системы нового поколения</div>
						<div class="btn btn_back">Подробнее</div>
					</div>
				</div>
				<div class="">

					<div class="products_c">

							<div class="products_crm"><a href="#">СМОТРЕТЬ ВСЕ</a></div>

							<div class="swiper mySwiper_1">
								<div class="swiper-wrapper">

									<? $product = db::query("select * from product where catalog_id = 4 and sale_online = 1 order by id desc limit 10"); $i = 1; ?>
									<? while ($product_d = mysqli_fetch_array($product)): ?>
										<? $pr_item_d = product::product_item($product_d['id']); ?>

										<div class="swiper-slide item">
											<div class="item_c">
												<a href="item/?id=<?=$pr_item_d['id']?>">
													<div class="item_img">
														<? if ($pr_item_d['img'] || $pr_item_d['img_room']): ?>
															<div class="item_img_c lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$pr_item_d['img']?>"></div>
															<? if ($pr_item_d['img_room']): ?> <div class="item_img_c item_img_abs lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$pr_item_d['img_room']?>"></div> <? endif ?>
														<? else: ?> <div class="item_img_c"><span>Фото скоро появится</span></div> <? endif ?>
													</div>
												</a>
												<a href="item/?id=<?=$pr_item_d['id']?>">
													<div class="item_con">
														<div class="item_cons">
															<div class="item_name"><?=$pr_d['name_ru']?></div>
														</div>
														<? if ($pr_item_d['price']): ?>
															<div class="item_price">
																<span><?=$pr_item_d['price']?></span>
																<i class="fas fa-tenge"></i>
															</div>
														<? endif ?>
													</div>
												</a>
											</div>
										</div>
									<? endwhile ?>

								</div>
								<div class="swiper-button-prev swiper_prev_1"><i class="fal fa-long-arrow-left"></i></div>
								<div class="swiper-button-next swiper_next_1"><i class="fal fa-long-arrow-right"></i></div>
							</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="bl23">
		<div class="bl_c">
			<div class="head_c">
				<h4>Подберите по типу помещения</h4>
			</div>
			<div class="bl23_c">
				<div class="bl23_t">
					<div class="swiper bl23_ct bl23_ct1 swiper_bl23 ">
						<div class="swiper-wrapper">
							<!-- <div class="swiper-slide " data-id="0">Все</div> -->
							<? $catalog = db::query("select * from rooms where parent_id is null"); ?>
							<? if (mysqli_num_rows($catalog)): ?>
								<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
									<div class="swiper-slide <?=($cat_d['id'] == 1?'bl23_ct_act':'')?>" data-id="<?=$cat_d['id']?>"><?=$cat_d['name_ru']?></div>
								<? endwhile ?>
							<? endif ?>
						</div>
					</div>
					<div class="bl23_tb"></div>
				</div>

				<div class="bl23_cs">
					<div class="bl23_csw">
						<div class="bl23_csw2 ">

							<? $catalog = db::query("select * from rooms_item where rooms_id = 1 order by ins_dt desc limit 1, 6"); ?>
							<? if (mysqli_num_rows($catalog)): ?>
								<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
									<div class="lazy_img" data-src="/assets/uploads/rooms/<?=$cat_d['img']?>"></div>
								<? endwhile ?>
							<? endif ?>

						</div>
					</div>
					<div class="bl23_csb">
						<div class="btn">Загрузите еще - 12</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--  -->
	<div class="">
		<div class="bl_c">
			<div class="head_c">
				<h4>Мы в Instagram</h4>
				<p>Посмотрите, как наша продукция выглядит в реальных домах! <br> Поделитесь своими фотографиями в Instagram с хэштегом #mylighterior <br> или отметьте <a href="<?=$site['instagram']?>">@<?=$site['instagram']?></a>, чтобы вас могли увидеть здесь!</p>
			</div>
			<div class="">
				<div class="swiper rbl4_c">
					<div class="swiper-wrapper">
						<? for ($i=0;$i<=10;$i++): ?>
							<div class="swiper-slide rbl4_i" ></div>
						<? endfor ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--  -->
	<div class="">
		<div class="bl_c">
			<div class="head_c">
				<h4 class="txt_c">ИНТЕРНЕТ-МАГАЗИН СВЕТИЛЬНИКОВ И ЛЮСТР «LIGHTERIOR»</h4>
			</div>
			<div class="rbl5_c">
				<div class="rbl5_l">
					<p>«LIGHTERIOR» — это удобный сервис, с помощью которого легко выбрать светильник, проверить, как он подходит к вашему интерьеру. С помощью калькулятора мощности каждый сможет рассчитать уровень яркости для любого помещения, чтобы убедиться в правильности выбора. Забрать товар можно самовывозом в шоу-руме или заказать курьерскую доставку на дом.</p>
				 	<p>Наш ассортимент осветительных приборов — это более 120 брендов, среди которых: потолочные, встраиваемые, подвесные и трековые светильники. Есть роскошные хрустальные, лаконичные металлические, натуральные деревянные, воздушные стеклянные — любые модели, которые только можно представить.</p>
				 	<p>Наш каталог постоянно пополняется новинками — как только у представленного бренда выходит новая коллекция, она сразу появляется в продаже у нас. Среди представленных марок — самые популярные бренды Италии, Германии, Испании, Австрии, Бельгии, Чехии, Польши, Дании, Швеции, Франции, Турции, США, Китая и, конечно, России.</p>
				 	<p>Кроме регулярного обновления и пополнения ассортимента осветительных приборов, мы постоянно проводим акции — распродажи светильников и люстр со значительными скидками — порой они достигают 90%!</p>
				</div>
				<div class="rbl5_r">
					<p>Это отличная возможность дополнить свой интерьер настольной лампой или торшером, купить люстру, выбрать подарок или полностью обновить свет во всем доме.</p>
					<p>«LIGHTERIOR» — это простые лаконичные модели и эксклюзивные дизайнерские люстры из хрусталя, достойные самых роскошных интерьеров.</p>
					<p>Наша служба доставки быстро и аккуратно привезет заказанные товары, а установкой осветительной техники займутся специалисты службы монтажа. Кстати, если воспользоваться услугами наших специалистов, гарантийный срок на оборудование увеличивается до 2 лет! Так что лучше доверить работу профессионалам, которые сделают всё быстро и качественно — в квартире, доме или офисе.</p>
					<p>Если у вас остались вопросы, свяжитесь с менеджерами интернет-магазина люстр и светильников «<?=$site['name']?>» по телефону <a href="tel:<?=$site['phone']?>"><?=$site['phone_view']?></a> или <a href="#">закажите обратный звонок</a>, оставив контактные данные.</p>
					<p>Мы несем свет вам и вашему дому!</p>
				</div>
			</div>
		</div>
	</div>


<? include "block/footer.php"; ?>