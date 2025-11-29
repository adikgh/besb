<?php include "../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/sign.php');
	else header('location: /user/acc/');

	// site setting
	$menu_name = 'user';
	// $site_set['ph_header'] = true;
	$site_set['pmenu'] = true;

	$site_set['nav_header'] = true;
   // $site_set['nav_header_back'] = '/';
   // $site_set['nav_header_link'] = '/';
   $site_set['nav_header_name'] = 'Мои профиль';
	$css = ['user/main', 'user/acc'];
	$js = ['user/main'];
?>
<? include "../block/header.php"; ?>

	<!--  -->
	<div class="user ph_none">
		<div class="bl_c">
			<div class="user_p">

				<? include "umenu.php"; ?>
				
				<div class="user_sn">
					<div class="head_c head_c1">
						<h4>Мой профиль</h4>
					</div>
					<div class="user_sns">
						<div class="user_snsi"></div>
						<div class="user_snsi"></div>
						<div class="user_snsi"></div>
						<div class="user_snsi"></div>
						<div class="user_snsi"></div>
						<div class="user_snsi"></div>
						<div class="user_snsi"></div>
					</div>

					<!-- <div class="">
						<div class="head_c ">
							<h4>Полезные ссылки</h4>
						</div>
						<div class="user_snc">
							<div class="user_sni"></div>
							<div class="user_sni"></div>
							<div class="user_sni"></div>
							<div class="user_sni"></div>
						</div>
					</div> -->

				</div>

			</div>
		</div>
	</div>


	<!--  -->
	<div class="up">
		<div class="up_top">
			<div class="up_lg">
				<div class="up_logo">
					<div class="up_logo_c lazy_img" data-src="/assets/img/users/<?=$user['img']?>"><?=($user['img']?'':'<i class="fal fa-user"></i>')?></div>
				</div>
				<div class="up_logo_upd"><i class="fal fa-camera"></i></div>
			</div>
			<div class="up_inf">
				<div class="up_name"><?=$user['name']?> <?=$user['surname']?></div>
				<div class="up_phone fr_phone2">
					<? if ($user['phone'] != null): ?> <?=$user['phone']?>
					<? else: ?> <?=$user['mail']?> <? endif ?>
				</div>
			</div>
		</div>

		<div class="up_c">
			<div class="up_lt">
				<span>Основной</span>
				<a class="up_li" href="/user/acc/">
					<div class="menu_cin"><i class="fal fa-user"></i></div>
					<div class="menu_cih">Личные данные</div>
				</a>
				<a class="up_li" href="/user/orders/">
					<div class="menu_cin"><i class="fal fa-bags-shopping"></i></div>
					<div class="menu_cih">Мои заказы</div>
				</a>
				<!-- <a class="up_li" href="/favorites/">
					<div class="menu_cin"><i class="fal fa-heart"></i></div>
					<div class="menu_cih">Любимые товары</div>
				</a> -->
				<!-- <a class="up_li" href="/user/">Скидка покупателя</a> -->
				<a class="up_li" href="/user/address/">
					<div class="menu_cin"><i class="fal fa-map-pin"></i></div>
					<div class="menu_cih">Адрес доставки</div>
				</a>
				<a class="up_li" href="/user/ques/">
					<div class="menu_cin"><i class="fal fa-comment-alt-lines"></i></div>
					<div class="menu_cih">Отзывы и вопросы</div>
				</a>
			</div>

			<div class="up_lt">
				<span>Контрагент</span>
				<a class="up_li" href="/user/counterparties/">
					<div class="menu_cin"><i class="fal fa-sack-dollar"></i></div>
					<div class="menu_cih">Финансы и бонусы</div>	
				</a>
				<!-- <a class="user_pli" href="/user/">Баланс и история операций</a> -->
				<a class="up_li" href="/user/counterparties/friends/">
					<div class="menu_cin"><i class="fal fa-users"></i></div>
					<div class="menu_cih">Друзья и их заказ</div>
				</a>
				<a class="up_li" href="/user/counterparties/invite_friends.php">
					<div class="menu_cin"><i class="fal fa-user-plus"></i></div>
					<div class="menu_cih">Пригласить друзей</div>
				</a>
			</div>

			<div class="up_lt">
				<span>Другие</span>
				<a class="up_li" href="#">
					<div class="menu_cin"><i class="fal fa-pen"></i></div>
					<div class="menu_cih">Обратный связь</div>
				</a>
				<a class="up_li" href="/user/all/offer.php">
					<div class="menu_cin"><i class="fal fa-comment-alt-dots"></i></div>
					<div class="menu_cih">Обращения</div>
				</a>
			</div>

			<div class="up_exit">
				<a class="btn btn_back2" href="/user/exit.php">
					<i class="far fa-sign-out"></i>
					<span>Выйти</span>
				</a>
			</div>
		</div>

		<div class="footer_b up_cg">
			<div class="footer_bl">© <?=$site['name']?>, 2022</div>
			<div class="footer_br">
				<a href="https://gprog.kz" target="_blank" class="gprog_bl">
					<span>Сделано в #gprog</span>
				</a>
			</div>
		</div>

	</div>

<? include "../block/footer.php"; ?>