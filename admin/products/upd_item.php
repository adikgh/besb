<? include "../../config/core_a.php"; ?>
   
   <!--  -->
   <? $id = strip_tags($_POST['id']); ?>
   <? $product_d = product::product($id); ?>
   
      <? if (isset($_GET['upd'])): ?>
         <div class="form_c">
            <div class="form_im">
               <div class="form_span">Наименование товара:</div>
               <input type="text" class="form_im_txt pr_upd_name" data-lenght="1" placeholder="Введите наименование" value="<?=$product_d['name_ru']?>" />
               <i class="fal fa-text form_icon"></i>
            </div>
            <div class="form_im form_sel">
               <div class="form_span">Категория товара:</div>
               <i class="fal fa-inventory form_icon"></i>
               <div class="form_im_txt sel_clc pr_upd_catalog" data-val=""><?=($product_d['catalog_id']?(product::pr_catalog($product_d['catalog_id']))['name_ru']:'Выберите категорию')?></div>
               <i class="fal fa-caret-down form_icon_sel"></i>
               <div class="form_im_sel sel_clc_i">
                  <? $catalog = db::query("select * from product_catalog"); ?>
                  <? while ($catalog_d = mysqli_fetch_assoc($catalog)): ?>
                     <div class="form_im_seli" data-val="<?=$catalog_d['id']?>"><?=$catalog_d['name_'.$lang]?></div>
                  <? endwhile ?>
               </div>
            </div>
            <div class="form_im">
               <div class="form_span">Цена продажи:</div>
               <i class="fal fa-tenge form_icon"></i>
               <input type="tel" class="form_im_txt fr_price pr_upd_price" placeholder="0" data-lenght="1" value="<?=$product_d['price']?>">
            </div>

         </div>
         <div class="form_c">
            <div class="form_im">
               <input type="file" class="file dsp_n product_img pr_upd_img" accept=".png, .jpeg, .jpg">
               <div class="form_im_img pr_upd_img_btn <?=($product_d['img']?'form_im_img2':'')?>" data-txt="Обновить изображение" style="background-image: url('/assets/uploads/products/<?=$product_d['img']?>')">Выберите с устройства</div>
            </div>
         </div>

         <div class="form_с">
            <div class="form_im">
               <div class="btn pr_upd" data-id="<?=$id?>"><span>Обновить</span></div>
            </div>
         </div>
      <? endif ?>

	<? exit(); ?>