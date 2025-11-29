<? include "../../../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/');

	$sn = '';
	$users = db::query("select * from user_designer_partners where user_id = '$user_id' order by id DESC");
	while ($users_d = mysqli_fetch_assoc($users)) {
		$sn = $sn . $users_d['id'] . ', ';
	}
	$sn = substr($sn,0,-2);


	// 
	$order = db::query("select * from on_orders where user_id in('$sn') order by id DESC");


	$sum = 0;
	$order2 = db::query("select * from on_orders where user_id in('$sn') order by id DESC");
	while ($order_c = mysqli_fetch_assoc($order2)) {
		$sum = $sum + $order_c['sum'];
	}



	// site setting
	$menu_name = 'disigner_order';

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
						<h4>Партнеры и их заказ</h4>
					</div>
					<div class="user_snl">
						<div class="user_snlс">
							<a class="user_snli " href="/user/disigner/">Список партнеров</a>
							<a class="user_snli user_snli_act" href="/user/disigner/order/">Заказы</a>
						</div>
						<div class=""></div>
					</div>

					<div class="">

						<br><br>
						
							<div class="">
								Ваш бонус: <?=($sum / 10)?> тг
							</div>
						
						<br><br>
						
						<style>
							td{padding:10px 15px}
						</style>

						<div class="ys_p">
							<table>
								<tr>
									<td>Номер заказа</td>
									<td>Метед оплаты</td>
									<td>Сумма продажи</td>
									<td>Бонус</td>
									<td>Время</td>
								</tr>

								<? if (mysqli_num_rows($order)): ?>
									<? while ($order_c = mysqli_fetch_assoc($order)): ?>
										<? $order_id = $order_c['id']; $status = $order_c['status']  ?>
										<tr>
											<td><?=$order_c['id']?></td>
											<td><?=$order_c['payment_method']?></td>
											<td style="text-align:right"><?=$order_c['sum']?> тг</td>
											<td style="text-align:right"><?=($order_c['sum'] / 10)?> тг</td>
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

	</div>

<? include "../../../block/footer.php"; ?>