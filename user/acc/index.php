<? include "../../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/');
	// else header('location: /user/acc');

	// site setting
	$menu_name = 'acc';

	$css = ['user/main'];
	$js = ['user/main'];
?>
<? include "../../block/header.php"; ?>

	<div class="user">

		<!-- <div class="bl_c">
			<div class="multis">
				<a class="multis_i" href="/user/">Профиль</a>
				<span class="multis_i">Заказы</span>
			</div>
		</div> -->

		<div class="bl_c">
			<div class="user_p">

				<? include "../umenu.php"; ?>

				<div class="user_sn">
					<div class="head_c head_c1">
						<h4>Личные данные</h4>
					</div>

					<? if (!$user['designer']): ?>
						<div class="ys_p">
							<div class="form_c">
								<div class="form_im form_im2">
									<div class="btn btn_back designer_add_pop" data-id="<?=$user_id?>">Хочешь получить статус Дизайнера?</div>
								</div>
							</div>
						</div>
					<? endif ?>

					<div class="ys_p">
						<div class="form_c">
							<div class="form_im form_im2">
								<div class="form_span">Имя:</div>
								<input type="text" class="form_txt name_edit" placeholder="" data-lenght="11" value="<?=$user['name']?>" />
							</div>
							<div class="form_im form_im2">
								<div class="form_span">Фамилия:</div>
								<input type="text" class="form_txt name_edit" placeholder="" data-lenght="11" value="<?=$user['surname']?>" />
							</div>
							<!-- <div class="form_im form_im2">
								<div class="form_span">ИИН:</div>
								<input type="text" class="form_txt name_edit" placeholder="" data-lenght="11" value="<?=$user['iin']?>" />
							</div> -->
							<div class="form_im form_im2">
								<div class="form_span">Номер:</div>
								<input type="tel" class="form_txt fr_phone " disabled placeholder="8 (___) ___-__-__" data-lenght="11" value="<?=$user['phone']?>" />
							</div>
							<div class="form_im form_im2">
								<div class="form_span">Почта:</div>
								<input type="text" class="form_txt designer_compn_edit" placeholder="" data-lenght="11" value="<?=$user['mail']?>" />
							</div>
							<div class="form_im form_im2">
								<div class="btn " data-id="<?=$id?>"><span>Сохранить</span></div>
							</div>
						</div>
						
						<div class="form_c">
							<div class="form_im form_im2">
								<div class="btn btn_back" data-id="<?=$user_id?>">Изменить пароль</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>

	</div>

<? include "../../block/footer.php"; ?>

	<div class="pop_bl pop_bl2 designer_add_block">
		<div class="pop_bl_a designer_add_back"></div>
		<div class="pop_bl_c">
			<div class="head_c">
				<h4>Добавить .</h4>
				<div class="btn btn_dd2 designer_add_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl">
				<div class="form_c">
					<div class="form_im form_im2">
						<div class="form_span">Называние компания:</div>
						<input type="text" class="form_txt designer_compn" placeholder="" data-lenght="2" />
					</div>
					<div class="form_im form_im2">
						<div class="form_span">Instagram:</div>
						<input type="url" class="form_txt designer_ins" placeholder="@" data-lenght="2" />
					</div>
					<div class="form_im form_im2">
						<div class="form_span">Site:</div>
						<input type="url" class="form_txt designer_site" placeholder="" data-lenght="2" />
					</div>
					<div class="form_im form_im2">
						<div class="btn designer_add" data-id="<?=$user_id?>"><span>Запрос</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>