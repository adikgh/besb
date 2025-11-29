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

	<div class="usign">
		<div class="bl_c">
			<div class="usign_c">

            <div class="head_c">
					<h4>Вход</h4>
				</div>
            
            <div class="usign_c2">
               <div class="usign_cn">
                  <div class="form_im form_im2 form_im_ph">
                     <div class="form_span">Ваш номер:</div>
                     <input type="tel" class="form_txt fr_phone phone" data-lenght="11" data-sel="0" placeholder="8 (000) 000-00-00" />
                  </div>
                  <div class="si_blc_bn">
                     <div class="form_im form_im2 form_im_ps">
                        <div class="form_span">Ваш пароль:</div>
                        <input type="password" class="form_txt password" data-lenght="6" data-sel="0" data-eye="0" />
                        <i class="far fa-eye-slash form_icon_pass"></i>
                     </div>
                     <a class="btn btn_back" href="sign_reset.php">Забыл пароль?</a>
                  </div>
                  <div class="form_im form_im2 form_im_btn">
                     <button class="btn btn_sign">Вход</button>
                     <a class="btn btn_gr" href="sign_up.php">Зарегистрироваться</a>
                  </div>
               </div>
            </div>

			</div>
		</div>
	</div>

<? include "../block/footer.php"; ?>