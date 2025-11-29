<? include "../../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/');
	// else header('location: /user/acc');

	if (($_GET['status'] != '') && ($_GET['status'] == 0)) {
		$order = db::query("select * from on_orders where user_id = '$user_id' and status = 0 order by id DESC");
	} else if ($_GET['status'] == 1) {
		$order = db::query("select * from on_orders where user_id = '$user_id' and status = 1 order by id DESC");
	} else if ($_GET['status'] == 2) {
		$order = db::query("select * from on_orders where user_id = '$user_id' and status = 2 order by id DESC");
	} else if ($_GET['status'] == 3) {
		$order = db::query("select * from on_orders where user_id = '$user_id' and status = 3 order by id DESC");
	} else {
		$order = db::query("select * from on_orders where user_id = '$user_id' order by id DESC");
	}


	
	// site setting
	$menu_name = 'orders';

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
						<h4>Мои заказы</h4>
					</div>
					<div class="user_snl">
						<div class="user_snlс">
							<a class="user_snli <?=($_GET['status'] == ''?'user_snli_act':'')?>" href="?">Все заказы</a>
							<a class="user_snli <?=(($_GET['status'] != '') && ($_GET['status'] == 0)?'user_snli_act':'')?>" href="?status=0">В обработке</a>
							<a class="user_snli <?=($_GET['status'] == 1?'user_snli_act':'')?>" href="?status=1">Доставка</a>
							<a class="user_snli <?=($_GET['status'] == 2?'user_snli_act':'')?>" href="?status=2">Полученные</a>
							<a class="user_snli <?=($_GET['status'] == 3?'user_snli_act':'')?>" href="?status=3">Возвраты</a>
						</div>
						<div class=""></div>
					</div>
					
					<div class="">

						<br><br>
						
						<style>
							td{
								padding: 10px 15px;
							}
						</style>

						<table>
							<tr>
								<td>Номер заказа</td>
								<td>Статус</td>
								<td>Метед оплаты</td>
								<td>Сумма продажи</td>
								<td>Время</td>
							</tr>

							<? if (mysqli_num_rows($order)): ?>
								<? while ($order_c = mysqli_fetch_assoc($order)): ?>
									<? $order_id = $order_c['id']; $status = $order_c['status']  ?>
									<tr>
										<td><?=$order_c['id']?></td>
										<td><?=t::w('order_status_0'.$status, $lang)?> </td>
										<td><?=$order_c['payment_method']?></td>
										<td style="text-align:right"><?=$order_c['sum']?> тг</td>
										<td><?=$order_c['ins_dt']?></td>
									</tr>
								<? endwhile ?>
							<? endif ?>

						</table>

					</div>

				</div>

			</div>
		</div>

	</div>

<? include "../../block/footer.php"; ?>