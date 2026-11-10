<? include "../../../config/core_a.php"; ?>
   
   <!--  -->
   <? $id = strip_tags($_POST['id']); ?>
   <? $cats = product::pr_catalog($id); ?>
   
      <? if (isset($_GET['upd'])): ?>
         <div class="form_c">
            <div class="form_im">
               <div class="form_span">Наименование товара:</div>
               <input type="text" class="form_im_txt ct_upd_name" data-lenght="1" placeholder="Введите наименование" value="<?=$cats['name_ru']?>" />
               <i class="fal fa-text form_icon"></i>
            </div>
         </div>
         <div class="form_c">
            <div class="form_im">
               <input type="file" class="file dsp_n ct_img ct_upd_img" accept=".png, .jpeg, .jpg">
               <div class="form_im_img ct_upd_img_btn <?=($cats['img']?'form_im_img2':'')?>" data-txt="Обновить изображение" style="background-image: url('/assets/uploads/catalog/<?=$cats['img']?>')">Выберите с устройства</div>
            </div>
         </div>

         <div class="form_с">
            <div class="form_im">
               <div class="btn ct_upd" data-id="<?=$id?>"><span>Обновить</span></div>
            </div>
         </div>
      <? endif ?>

	<? exit(); ?>