<?php include "../config/core.php";


	



	// site setting
	$menu_name = 'products';
	$site_set['pmenu'] = true;

   // $site_set['header'] = false;



	$css = ['product'];
	$js = [];
?>
<? include "../block/header.php"; ?>

	<div class="">
		<div class="bl_c">
         <div class="ph_header_serach">
            <div class="header_serach">
               <div class="form_im">
                  <input type="text" class="form_im_txt " placeholder="Что вы ищете?" />
                  <i class="fal fa-search form_icon"></i>
                  <i class="fal fa-camera form_icon_camera"></i>
               </div>
            </div>
         </div>

         <div class="">
            <div class="head_c head_c1">
               <h5>Категорий</h5>
            </div>
				<div class="ph_cat">

					<? $catalog = db::query("select * from product_catalog limit 5"); ?>
					<? if (mysqli_num_rows($catalog)): ?>
						<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
							<a class="ph_cat_i2" href="cat/?id=<?=$cat_d['id']?>">
                        <div class="ph_cat_in"><?=$cat_d['name_ru']?></div>
								<div class="catalog_img"></div>
                     </a>
                  <? endwhile ?>
               <? endif ?>

               <a class="ph_cat_i2" href="/products/">
                  <div class="ph_cat_in">Показать все</div>
                  <div class="ph_cat_img"><i class="fal fa-long-arrow-right"></i></div>
               </a>

				</div>

			</div>

         <div class="">
            <div class="head_c head_c1">
               <h5>Комнаты</h5>
            </div>
				<div class="ph_cat">

					<? $catalog = db::query("select * from product_catalog limit 5"); ?>
					<? if (mysqli_num_rows($catalog)): ?>
						<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
							<a class="ph_cat_i2" href="cat/?id=<?=$cat_d['id']?>">
                        <div class="ph_cat_in"><?=$cat_d['name_ru']?></div>
								<div class="catalog_img"></div>
                     </a>
                  <? endwhile ?>
               <? endif ?>

               <a class="ph_cat_i2" href="/products/">
                  <div class="ph_cat_in">Показать все</div>
                  <div class="ph_cat_img"><i class="fal fa-long-arrow-right"></i></div>
               </a>

				</div>

			</div>

		</div>
	</div>


   <br><br><br><br><br>


<? include "../block/footer.php"; ?>