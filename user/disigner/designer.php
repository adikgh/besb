<? include "../../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/');

	if ($designer) $designer_d = fun::user_designer($user_id);
	else header('location: /user/');
		
	// site setting
	$menu_name = 'designer';

	$css = ['user/main'];
	$js = ['user/main'];
?>
<? include "../../block/header.php"; ?>

	<div class="user">

		<div class="bl_c">
			<div class="user_p">

				<? include "../umenu.php"; ?>

				<div class="user_sn">
					<div class="head_c head_c1">
						<h4>Данные дизайнера</h4>
					</div>
					
					<div class="ys_p">
						<div class="form_c">
							<div class="form_im form_im2">
								<div class="form_span">Называние компания:</div>
								<input type="text" class="form_txt name_edit" placeholder="" data-lenght="11" value="<?=$designer_d['company_name']?>" />
							</div>
							<div class="form_im form_im2">
								<div class="form_span">Instagram:</div>
								<input type="text" class="form_txt name_edit" placeholder="" data-lenght="11" value="<?=$designer_d['instagram']?>" />
							</div>
							<div class="form_im form_im2">
								<div class="form_span">Сайт:</div>
								<input type="text" class="form_txt designer_compn_edit" placeholder="" data-lenght="11" value="<?=$designer_d['site']?>" />
							</div>
							<div class="form_im form_im2">
								<div class="btn " data-id="<?=$id?>"><span>Сохранить</span></div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>

	</div>

<? include "../../block/footer.php"; ?>