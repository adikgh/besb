<? include "../../../config/core_a.php";

	// 
	if (!$user_id) header('location: /admin/');

	$product = db::query("select * from product_catalog where company_id = 1");


	// site setting
	$menu_name = 'catalog';
	$pod_menu_name = 'main';
	// $site_set['footer'] = false;
	$css = ['products/main'];
	$js = ['products/main'];
?>
<? include "../../block/header.php"; ?>

	<div class="">

		<? include "../aheader.php"; ?>
		
		<!--  -->
		<div class="ucours_t">
			<div class="ucours_tl">
				<div class="ucours_tm">
					<div class="btn btn_cl product_add_pop">
					<i class="fal fa-plus"></i>
					<span>Добавить товар</span>
					</div>
				</div>
			</div>
		</div>

		<div class="uc_u">
			<div class="uc_us">
				<div class="form_im uc_usn">
					<input type="text" placeholder="Поиск" class="product_search">
					<i class="fal fa-search form_icon"></i>
				</div>
			</div>

			<div class="tscroll">
				<table class="uc_u2q uc_uc">
					<thead class="">
						<tr class="thead">
							<td class="td_number">#</td>
							<td class="uc_ui_right">Статус</td>
							<td class="td_img">Фото</td>
							<td class="td_br"></td>
							<td class="td_name">Наименование</td>
							<td class="uc_uh_cn"></td>
						</tr>
					</thead>
					<tbody class="tbody">
						<? while ($pr_d = mysqli_fetch_assoc($product)): ?>
							<? $number++; ?>
							
							<tr class="uc_ui uc_ui2">
								<td class="td_number"><div class="uc_ui_number"><?=$number?></div></td>
								<td class="uc_ui_right">
									<div class="form_im form_im_toggle">
										<input type="checkbox" class="info_inp" data-val="<?=($pr_d['sale_online']==1?1:0)?>">
										<div class="form_im_toggle_btn <?=($pr_d['sale_online']==1?'form_im_toggle_act':'')?> form_prd_online" data-id="<?=$pr_d['id']?>"></div>
									</div>
								</td>
								<td class="td_img">
									<div class="uc_ui_img lazy_img ct_upd_pop" data-src="/assets/uploads/catalog/<?=$pr_d['img']?>" data-id="<?=$pr_d['id']?>">
										<? if ($pr_d['img'] == null): ?> <i class="fal fa-box"></i> <? endif ?>
									</div>
								</td>
								<td class="td_br"></td>
								<td class="td_name ">
									<div class="ct_upd_pop" data-id="<?=$pr_d['id']?>">
										<div class="uc_ui_name"><?=$pr_d['name_ru']?></div>
									</div>
								</td>
								<td class="">
									<div class="uc_uib">
										<div class="uc_uibo ct_btn_delete"><i class="fal fa-trash-alt"></i></div>
									</div>
								</td>
							</tr>
						<? endwhile ?>
					</tbody>
				</table>
			</div>
			<div class="uc_u2qm  uc_uc dsp_n"></div>
		</div>

	</div>

<? include "../../block/footer.php"; ?>



   <!-- upd product -->
	<div class="pop_bl pop_bl2 ct_upd_block">
      <div class="pop_bl_a pr_upd_back"></div>
      <div class="pop_bl_c">
         <div class="head_c">
            <h4>Тағамды өзгерту</h4>
            <div class="btn btn_dd ct_upd_back"><i class="fal fa-times"></i></div>
         </div>
         <div class="pop_bl_cl lazy_c"></div>
      </div>
   </div>   
   
   
   
   <!--  -->
   <div class="pop_bl pop_bl2 product_add_block">
      <div class="pop_bl_a product_add_back"></div>
      <div class="pop_bl_c">
         <div class="head_c">
            <h4>Тағам қосу</h4>
            <div class="btn btn_dd product_add_back"><i class="fal fa-times"></i></div>
         </div>
         <div class="pop_bl_cl">
            <div class="form_c">
               <div class="form_im">
                  <div class="form_span">Наименование товара:</div>
                  <input type="text" class="form_im_txt pr_name" placeholder="Введите наименование" data-lenght="1">
                  <i class="fal fa-text form_icon"></i>
               </div>
            </div>

            <div class="form_c">
               <div class="form_im">
                  <input type="file" class="file dsp_n product_img pr_img" accept=".png, .jpeg, .jpg">
                  <div class="form_im_img lazy_img pr_img_add" data-txt="Обновить изображение">Выберите с устройства</div>
               </div>
            </div>

            <div class="form_c">
               <div class="form_im">
                  <div class="btn product_add"><span>Добавить</span></div>
               </div>
            </div>

         </div>
      </div>
   </div>