<? include "../config/core.php";

	//
	if ($user_id) header('location: /user/');

	// site setting
	$menu_name = 'sign';
	$site_set['header'] = false;
	$site_set['menu'] = false;
	$site_set['footer'] = false;

	$site_set['nav_header'] = true;
   $site_set['nav_header_back'] = '/';
   // $site_set['nav_header_link'] = '/';
   $site_set['nav_header_name'] = 'Вход';

	$css = ['user/sign2'];
	$js = ['user/sign'];
?>
<? include "../block/header.php"; ?>

	<div class="u_sign">
		<div class="bl_c">
			<div class="usign_c">

				<div class="head_c">
					<h4>Регистрация</h4>
				</div>

				<div class="usign_c2">
					<div class="usign_cn">
						<div class="form_im form_im2 form_im_nm">
							<div class="form_span">Имя:</div>
							<input type="text" class="form_txt name" data-lenght="2" data-sel="0" />
						</div>
						<div class="form_im form_im2 form_im_nm">
							<div class="form_span">Фамилия:</div>
							<input type="text" class="form_txt surname" data-lenght="2" data-sel="0" />
						</div>
						<div class="form_im form_im2 form_im_ph">
							<div class="form_span">Номер телефона:</div>
							<input type="tel" class="form_txt fr_phone phone" data-lenght="11" data-sel="0" placeholder="8 (000) 000-00-00" />
						</div>
						<div class="form_im form_im2 form_im_ps">
							<div class="form_span">Создать пароль:</div>
							<input type="password" class="form_txt password" data-lenght="6" data-sel="0" />
							<i class="far fa-eye-slash form_icon_pass"></i>
						</div>
						<div class="form_im form_im2">
							<div class=""></div>
							<div class="">Настоящим я подтверждаю, что ознакомлен и согласен с условиями <a href="#">Политики конфиденциальности</a></div>
						</div>
						<div class="form_im form_im_btn">
							<button class="btn btn_sign_up">Зарегистрироваться</button>
							<!-- <a class="btn btn_gr" href="sign2.php">Вход</a> -->
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

<? include "../block/footer.php"; ?>