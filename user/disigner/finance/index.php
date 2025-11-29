<?php include "../../../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/sign.php');
	// else header('location: /user/acc');

	// site setting
	$menu_name = 'disigner_finance';

	$css = ['user/main'];
	$js = ['user/main'];
?>
<? include "../../../block/header.php"; ?>

	<div class="user">

		<div class="bl_c">
			<div class="user_p">

				<? include "../../umenu.php"; ?>

				<div class="user_sn">

					<div class="head_c head_c1">
						<h4>Финансы и бонусы</h4>
					</div>

					<div class="">

					</div>
					
				</div>

			</div>
		</div>

	</div>

<? include "../../../block/footer.php"; ?>