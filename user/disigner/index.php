<? include "../../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/');




	if (($_GET['status'] != '') && ($_GET['status'] == 0)) {
		$order = db::query("select * from on_orders where user_id = '$user_id' and status = 0 order by id DESC");
	} else if ($_GET['status'] == 1) {
		$order = db::query("select * from on_orders where user_id = '$user_id' and status = 1 order by id DESC");
	} else {
		$order = db::query("select * from user_designer_partners where user_id = '$user_id' order by id DESC");
	}

	

	// site setting
	$menu_name = 'disigner';

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
						<h4>Партнеры и их заказ</h4>
					</div>
					<div class="user_snl">
						<div class="user_snlс">
							<a class="user_snli user_snli_act" href="/user/disigner/">Список партнеров</a>
							<a class="user_snli " href="/user/disigner/order/">Заказы</a>
						</div>
						<div class=""></div>
					</div>

					<br>

					<div class="">
						<div class="">
							<div class="btn user_staff_add_pop">Добавить партнера</div>
						</div>
						
						<br><br>

						<style>
							td{padding:10px 15px}
						</style>
						
						<div class="ys_p">

							<table>
								<tr>
									<td>#</td>
									<td>Имя партнера</td>
									<td>Номер партнера</td>
									<td>Статус</td>
									<!-- <td>Сумма продажи</td> -->
									<td>Время добавитление</td>
									<td></td>
								</tr>

								<? if (mysqli_num_rows($order)): ?>
									<? while ($order_c = mysqli_fetch_assoc($order)): ?>
										<? $order_id = $order_c['id']; $status = $order_c['status']  ?>
										<tr>
											<td><?=$order_c['id']?></td>
											<td><?=fun::user($order_c['partner_id'])['name']?></td>
											<td><?=fun::user($order_c['partner_id'])['phone']?></td>
											<td><?=t::w('order_status_0'.$status, $lang)?> </td>
											<!-- <td style="text-align:right"><?=$order_c['sum']?> тг</td> -->
											<td><?=$order_c['ins_dt']?></td>
											<td><div class="btn btn_dd user_staff_btn_delete" data-id="<?=$order_c['id']?>">X</div></td>
										</tr>
									<? endwhile ?>
								<? endif ?>

							</table>

						</div>

					</div>
					
				</div>

			</div>
		</div>

	</div>

<? include "../../block/footer.php"; ?>

	<div class="pop_bl pop_bl2 user_staff_add_block">
		<div class="pop_bl_a user_staff_add_back"></div>
		<div class="pop_bl_c">
			<div class="head_c">
				<h4>Добавить партнера</h4>
				<div class="btn btn_dd user_staff_add_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl">
				<div class="form_c">
					<div class="form_head">Основные:</div>
					<!-- <div class="form_im form_im2">
						<div class="form_span">Имя партнера:</div>
						<input type="text" class="form_txt staff_name" placeholder="Введите имя" data-lenght="1">
					</div> -->
					<div class="form_im form_im2">
						<div class="form_span">Номер партнера:</div>
						<input type="tel" class="form_txt fr_phone staff_phone" placeholder="8 (___) ___-__-__" data-lenght="11">
					</div>
				</div>

				<div class="form_c">
					<div class="form_im form_im2">
						<div class="btn user_staff_add"><span>Добавить</span></div>
					</div>
				</div>

			</div>
		</div>
	</div>