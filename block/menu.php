<? if ($site_set['menu'] == true): ?>
   <div class="menu">
      <div class="menu_cl">
         <div class="btn btn_dd2 menu_clc">
            <i class="fal fa-bars"></i>
         </div>
      </div>
   </div>
   <div class="menuc">
      <div class="menuc_a menu_back"></div>
      <div class="menuc_c">
         <div class="menuc_ct">
            <div class="menuc_ctc">
               <div class="menuc_cb">
                  <div class="btn btn_dd2 menu_back"><i class="fal fa-times"></i></div>
               </div>
               <span><?=$site['name']?></span>
            </div>
         </div>
         <div class="menuc_cw">
            <div class="menuc_cwc">
               <div class="menuc_cwi menuc_cwi_act">
                  <div class="menuc_cb">
                     <div class="btn btn_dd2 "><i class="fal fa-long-arrow-left"></i></div>
                  </div>
                  <span>Категории</span>
                  <div class="menuc_cwim">
                     <? $catalog = db::query("select * from product_catalog where arh is null and level = 1 order by number asc"); ?>
                     <? if (mysqli_num_rows($catalog)): ?>
                        <? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
                           <? $menu_cat_id = $cat_d['id']; ?>
                           <div class="menuc_cwi2">
                              <span><?=$cat_d['name_ru']?></span>
                              <? if ($menu_cat_id == 1): ?>
                                 <div class="menuc_cwim2">
                                    <div class="menuc_cwim2c">
                                       <span><?=$cat_d['name_ru']?></span>
                                       <? $catalog2 = db::query("select * from product_catalog where arh is null and parent_id = '$menu_cat_id' order by number asc"); ?>
                                       <? if (mysqli_num_rows($catalog2)): ?>
                                          <? while ($cat2_d = mysqli_fetch_assoc($catalog2)): ?>
                                             <div class="menuc_cwi2">
                                                <span><?=$cat2_d['name_ru']?></span>
                                                <div class=""></div>
                                             </div>
                                          <? endwhile ?>
                                       <? endif ?>
                                    </div>
                                 </div>
                              <? endif ?>
                           </div>
                        <? endwhile ?>
                     <? endif ?>
                     <!-- <div class="menuc_cwi2">
                        <span></span>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<? endif ?>

<? if ($site_set['header'] == true): ?>
   <div id="top" class="header <?=($site_set['ph_header']==true?'ph_none':'')?>">
      <div class="bl_c">
         <div class="header_c">
            <a class="header_logo" href="/"><?=$site['name']?></a>
            <div class="header_serach">
               <div class="form_im">
                  <input type="text" class="form_im_txt " placeholder="Что вы ищете?" />
                  <i class="fal fa-search form_icon"></i>
                  <i class="fal fa-camera form_icon_camera"></i>
               </div>
            </div>
            <div class="header_r">
               <div class="header_lang">
                  <a class="header_lang_i <?=($lang=='kz'?'':'header_lang_act')?>" <?=($lang=='kz'?'':'href="'.$url.'?lang=kz"')?>>KZ</a>
                  <a class="header_lang_i <?=($lang=='ru'?'':'header_lang_act')?>" <?=($lang=='ru'?'':'href="'.$url.'?lang=ru"')?>>RU</a>
               </div>
               <div class="header_icons">
                  <!-- <a class="btn btn_dd2" href="/cart/"><i class="fal fa-shopping-bag"></i></a> -->
                  <!-- <a class="btn btn_dd2" href="/favorites/"><i class="fal fa-heart"></i></a> -->
                  <!-- <a class="btn btn_dd2" href="/user/"><i class="fal fa-user"></i></a> -->
                  <div class="btn btn_dd2 header_icons_mb menu_clc"><i class="fal fa-bars"></i></div>
               </div>
            </div>
         </div>
      </div>
   </div>

<? endif ?>

<? if ($site_set['menu'] == true && $site_set['pmenu'] == true): ?>
   <div class="pmenu">
      <div class="pmenu_c">
         <a class="pmenu_i <?=($menu_name=='home'?'pmenu_i_act':'')?>" href="/">
            <i class="far fa-home"></i> <!-- <span>Главная</span> -->
         </a>
         <a class="pmenu_i <?=($menu_name=='products'?'pmenu_i_act':'')?>" href="/products/ph.php">
            <i class="far fa-search"></i> <!-- <span>Продукты</span> -->
         </a>
         <a class="pmenu_i <?=($menu_name=='cart'?'pmenu_i_act':'')?>" href="/shoppingcart/">
            <i class="far fa-shopping-bag"></i> <!-- <span>Корзина</span> -->
         </a>
         <a class="pmenu_i <?=($menu_name=='favorites'?'pmenu_i_act':'')?>" href="/favorites/">
            <i class="far fa-heart"></i> <!-- <span>Любимые</span> -->
         </a>
         <a class="pmenu_i <?=($menu_name=='user'?'pmenu_i_act':'')?>" href="/user/">
            <i class="far fa-user"></i> <!-- <span>Аккаунт</span> -->
         </a>
      </div>
   </div>
<? endif ?>

<? if ($site_set['nav_header'] == true): ?>
   <div class="navh <?=($site_set['nav_header_tr']=='all'?'navh_tr':'')?>">
      <div class="bl_c">
         <div class="navh_c">
            <? if ($site_set['nav_header_back']): ?>
               <a class="navl" href="<?=$site_set['nav_header_back']?>"><i class="fal fa-long-arrow-left"></i></a>
            <? endif ?>
            <? if ($site_set['nav_header_name']): ?>
               <div class="navs <?=($site_set['nav_header_tr']=='item'?'navh_tr':'')?>"><?=$site_set['nav_header_name']?></div>
            <? endif ?>
            <? if ($site_set['nav_header_link']): ?>
               <div class="navr">
                  <a class="navri" href="/<?=$site_set['nav_header_link']?>"></a>
               </div>
            <? endif ?>
         </div>
      </div>
   </div>
<? endif ?>

<div class="app_body">