<? include "../../config/core.php"; ?>

   <? if (isset($_GET['product_search'])): ?>
		<? $cat_id = strip_tags($_POST['id']); ?>
		<? $page_start = strip_tags($_POST['page_start']); ?>
		<? $number = $page_start; ?>
      <? $page_age = 24; ?>
      <? $product = db::query("select * from product where catalog_id = '$cat_id' and sale_online = 1 and arh = 0 order by ins_dt desc limit $page_start, $page_age"); ?>

      <? while ($pr_d = mysqli_fetch_assoc($product)): ?>
         <? $number++; $pr_id = $pr_d['id']; ?>
         <? $item_d = product::product_item($pr_id); ?>
         <? if ($user_id): $favorites = product::favorites($item_d['id'], $user_id); ?>
         <? elseif (isset($_SESSION['favorites']) && in_array($item_d['id'], $_SESSION['favorites'])): $favorites = true; else: $favorites = false; endif; ?>

         <div class="item">
            <div class="item_c">
               <button class="btn btn_dd item_favorites <?=($favorites?'item_favorites_act':'')?> add_favorites" data-id="<?=$item_d['id']?>"><i class="fal fa-heart"></i></button>
               <a href="../item/?id=<?=$item_d['id']?>">
                  <div class="item_img">
                     <? if ($item_d['img'] || $item_d['img_room']): ?>
                        <div class="item_img_c lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$item_d['img']?>"></div>
                        <? if ($item_d['img_room']): ?> <div class="item_img_c item_img_abs lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$item_d['img_room']?>"></div> <? endif ?>
                     <? else: ?> <div class="item_img_c"><span>Фото скоро появится</span></div> <? endif ?>
                  </div>
               </a>
               <div class="item_cn">
                  <a href="../item/?id=<?=$item_d['id']?>">
                     <div class="item_con">
                        <div class="item_cons">
                           <div class="item_name"><?=$pr_d['name_ru']?></div>
                           <? if ($pr_d['brand_id']): ?> <div class="item_desc"><?=(product::pr_brand($pr_d['brand_id']))['name']?></div> <? endif ?>
                        </div>
                        <? if ($item_d['price']): ?>
                           <div class="item_price">
                              <span><?=$item_d['price']?></span>
                              <i class="fas fa-tenge"></i>
                           </div>
                        <? endif ?>
                        <div class=""></div>
                     </div>
                  </a>
                  <div class="item_cart">
                     <button class="btn btn_dd btn_dd_cl add_cart" data-id="<?=$item_d['id']?>">
                        <div class="item_cart_btn_add">
                           <i class="fal fa-shopping-bag"></i>
                           <i class="fal fa-plus item_cart_icon_plus"></i>
                        </div>
                     </button>
                  </div>
               </div>
            </div>

            <? $pr_item_sum = product::pr_item_sum($pr_id); ?>
            <? if ($pr_item_sum >= 2): ?>
               <? $pr_item = db::query("select * from product_item where product_id = '$pr_id'"); $i = 1; ?>
               <div class="item_others">
                  <span>Другие виды</span>
                  <div class="item_others_c">
                     <? while ($pr_item_d = mysqli_fetch_array($pr_item)): ?>
                        <? if ($i <= 6): ?>
                           <a class="item_others_i <?=($i==1?'item_others_act':'')?>" href="../item/?id=<?=$pr_item_d['id']?>">
                              <? if ($pr_item_d['img']): ?> <div class="lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$pr_item_d['img']?>"></div>
                              <? else: ?> <i class="fal fa-box"></i> <? endif ?>
                           </a>
                        <? endif; $i++; ?>
                     <? endwhile ?>
                     <? if ($pr_item_sum > 6): ?><a class="item_others_i item_others_all" href="item/?id=<?=$item_d['id']?>">+<?=$pr_item_sum - 6?></a><? endif ?>
                  </div>
               </div>
            <? endif ?>
            
         </div>
      <? endwhile ?>

		<? exit(); ?>
	<? endif ?>