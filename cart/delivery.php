<? include "../config/core.php";

	// 
	if ($user_id) {
		$product_all = db::query("select * from on_cart where user_id = '$user_id'");
		$page_result = mysqli_num_rows($product_all);
	} else {
		if (isset($_SESSION['favorites'])) {
			$page_result = count($_SESSION['favorites']);
			foreach ($_SESSION['favorites'] as $value) $ln = $ln . $value . ', ';
			$ln = substr($ln, 0, -2);
		}
	}

	if ($user_id) $favorites = db::query("select * from on_cart where user_id = '$user_id' order by ins_dt desc");
	else $favorites = db::query("select * from product_item where id in ($ln) order by ins_dt desc");

   $number = 0; $sum = 0; $totol = 0;
   while ($fp_d = mysqli_fetch_assoc($favorites)) {
      $pr_d = product::product($fp_d['product_id']);
      if ($user_id) $item_d = product::pr_item($fp_d['item_id']); else $item_d = $fp_d;
      $number++; $sum = $item_d['price'] * $fp_d['quantity']; $totol = $totol + $sum;
   }




	// site setting
	$menu_name = 'cart';
	
	$site_set['nav_header'] = true;
   $site_set['nav_header_back'] = '/shoppingcart/';
   // $site_set['nav_header_link'] = '/';
   $site_set['nav_header_name'] = 'Оформление заказа';
	$site_set['pmenu'] = false;
	$css = ['cart'];
	$js = ['cart'];
?>
<? include "../block/header.php"; ?>

	<div class="">
		<div class="bl_c">
			<div class="head_c head_c1 ph_none">
				<h3>Оформление заказа</h3>
			</div>

         <div class="carts">

            <div class="delivery_c">

               <div class="form_c delivery1 delivery_true">
                  <div class="form_head">
                     <span>1. Ваши данные</span>
                     <div class="btn btn_back delivery_back1">Редактировать</div>
                  </div>
                  <div class="form_cso">
                     <div class="form_im form_im2 form_im_ph">
                        <div class="form_span">Ваш имя:</div>
                        <input type="text" class="form_txt name" data-lenght="2" placeholder="" value="<?=$user['name']?> <?=$user['suname']?>" />
                     </div>
                     <div class="form_im form_im2 form_im_ph">
                        <div class="form_span">Ваш номер:</div>
                        <input type="tel" class="form_txt fr_phone phone" data-lenght="11" data-sel="0" placeholder="8 (000) 000-00-00" value="<?=$user['phone']?>" />
                     </div>
                     <div class="form_im">
                        <div class="btn delivery_btn1">Продолжать</div>
                     </div>
                  </div>
               </div>

               <div class="form_c delivery2 delivery_act">
                  <div class="form_head">
                     <span>2. Способ доставки</span>
                     <div class="btn btn_back delivery_back2">Редактировать</div>
                  </div>
                  <div class="form_cso">
                     <div class="form_im form_btn">
                        <div class="form_btn_c delivery_method">
                           <div class="form_btn_i form_btn_act" data-val="delivery">
                              <i class="fal fa-truck"></i>
                              <span>Доставка</span>
                           </div>
                           <div class="form_btn_i" data-val="pickup">
                              <i class="fal fa-warehouse-alt"></i>
                              <span>Самовывоз</span>
                           </div>
                        </div>
                     </div>
                     <div class="form_cso1">
                        <div class="form_cso1c ">
                           <div class="form_cso1h">С доставкой на дом</div>
                           <div class="form_cso1p">Позвольте команде доставки сделать всю тяжелую работу за вас. Все, что вам нужно сделать, это впустить их в дверь! Команда доставки разместит ваш заказ в выбранном вами номере в выбранную вами дату.</div>
                           <div class="form_cso1u">
                              <div class="form_cso1uh">Дата доставки - самый ранний временной интервал</div>
                              <div class="form_cso1uc">Среда, 31 августа 2022 г., 09:00–21:00</div>
                              <div class="btn btn_p">Изменить время</div>
                           </div>
                        </div>
                        <div class="form_cso1c dsp_n">
                           <div class="form_cso1h">Забрать в магазине</div>
                           <div class="form_cso1p">Услуга предоставляется бесплатно. Плата за обслуживание может взиматься в определенных местах.</div>
                           <div class="form_cso1u">
                              <div class="form_cso1uh">Lighterior Almaty</div>
                              <div class="form_cso1uc">Абая 10а</div>
                              <!-- <div class="btn btn_p">Изменить магазин</div> -->
                           </div>
                           <div class="form_cso1u">
                              <div class="form_cso1uh">Дата доставки - самый ранний временной интервал</div>
                              <div class="form_cso1uc">Среда, 31 августа 2022 г., 09:00–21:00</div>
                              <div class="btn btn_p">Изменить время</div>
                           </div>
                        </div>
                     </div>
                     <div class="form_im">
                        <div class="btn delivery_btn2">Продолжать</div>
                     </div>
                  </div>
               </div>

               <div class="form_c delivery3">
                  <div class="form_head">3. Способ оплаты</div>
                  <div class="form_cso">
                     <div class="form_im form_btn">
                        <div class="form_btn_c payment_method">
                           <div class="form_btn_i form_btn_act" data-val="Kaspi">
                              <img class="form_btn_img lazy_img" data-src="/assets/img/icons/Logo_of_Kaspi_bank.png" />
                              <span>Kaspi QR</span>
                           </div>
                           <div class="form_btn_i" data-val="Онлайн">
                              <i class="fab fa-cc-visa"></i>
                              <span>Картой онлайн</span>
                           </div>
                           <div class="form_btn_i" data-val="Рассрочка / кредит">
                              <i class="fal fa-receipt"></i>
                              <span>Рассрочка / кредит</span>
                           </div>
                           <div class="form_btn_i" data-val="При получении">
                              <i class="fal fa-handshake"></i>
                              <span>Оплата при получении</span>
                           </div>
                        </div>
                     </div>
                     <div class="form_im">
                        <div class="btn delivery_order" data-sum="<?=$totol?>">Завершить оформление</div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="carts_p">
               <div class="carts_pc">
                  <div class="carts_ph">Итог заказа</div>
                  <div class="carts_pm">
                     <div class="carts_pmi">
                        <div class="carts_pmil">Товары (6)</div>
                        <div class="carts_pmir">
                           <span class="fr_number"><?=$totol?></span>
                           <i class="fal fa-tenge"></i>
                        </div>
                     </div>
                     <div class="carts_pmi">
                        <div class="carts_pmil">Скидка</div>
                        <div class="carts_pmir fr_number">0</div>
                     </div>
                     <div class="carts_pmi">
                        <div class="carts_pmil">Доставка</div>
                        <div class="carts_pmir fr_number">0</div>
                     </div>
                  </div>
                  <div class="carts_pd carts_pmi">
                     <div class="carts_pmil">Общее</div>
                     <div class="carts_pmir">
                        <span class="fr_number"><?=$totol?></span>
                        <i class="far fa-tenge"></i>
                     </div>
                  </div>
               </div>
            </div>

         </div>

		</div>
	</div>

<? include "../block/footer.php"; ?>