<div class="user_pl ph_none">
   <? if ($designer): ?>
      <div class="up_lt">
         <span>Основной</span>
         <a class="up_li <?=($menu_name=='orders'?'user_pli_act':'')?>" href="/user/orders/">
            <div class="menu_cin"><i class="fal fa-bags-shopping"></i></div>
            <div class="menu_cih">Мои заказы</div>
         </a>
         <!-- <a class="up_li" href="/favorites/">
            <div class="menu_cin"><i class="fal fa-heart"></i></div>
            <div class="menu_cih">Любимые товары</div>
         </a> -->
         <!-- <a class="up_li" href="/user/">Скидка покупателя</a> -->
         <!-- <a class="up_li <?=($menu_name=='ques'?'user_pli_act':'')?>" href="/user/ques/">
            <div class="menu_cin"><i class="fal fa-comment-alt-lines"></i></div>
            <div class="menu_cih">Отзывы и вопросы</div>
         </a> -->
         <a class="up_li <?=($menu_name=='address'?'user_pli_act':'')?>" href="/user/address/">
            <div class="menu_cin"><i class="fal fa-map-pin"></i></div>
            <div class="menu_cih">Адрес доставки</div>
         </a>
         <a class="up_li <?=($menu_name=='acc'?'user_pli_act':'')?>" href="/user/acc/">
            <div class="menu_cin"><i class="fal fa-user"></i></div>
            <div class="menu_cih">Личные данные</div>
         </a>
      </div>
      <div class="up_lt">
         <span>Дизайнеры</span>
         <a class="up_li <?=($menu_name=='disigner'?'user_pli_act':'')?>" href="/user/disigner/">
            <div class="menu_cin"><i class="fal fa-users"></i></div>
            <div class="menu_cih">Друзья и их заказ</div>
         </a>
         <a class="up_li <?=($menu_name=='disigner_finance'?'user_pli_act':'')?>" href="/user/disigner/finance/">
            <div class="menu_cin"><i class="fal fa-sack-dollar"></i></div>
            <div class="menu_cih">Финансы и бонусы</div>	
         </a>
         <a class="up_li <?=($menu_name=='designer'?'user_pli_act':'')?>" href="/user/disigner/designer.php">
            <div class="menu_cin"><i class="fal fa-users"></i></div>
            <div class="menu_cih">Данный дизайнера</div>
         </a>
         <!-- <a class="user_pli" href="/user/">Баланс и история операций</a> -->
         <a class="up_li" href="/user/disigner/invite_friends.php">
            <div class="menu_cin"><i class="fal fa-user-plus"></i></div>
            <div class="menu_cih">Пригласить партнера</div>
         </a>
      </div>
      <!-- <div class="up_lt">
         <span>Другие</span>
         <a class="up_li" href="#">
            <div class="menu_cin"><i class="fal fa-pen"></i></div>
            <div class="menu_cih">Обратный связь</div>
         </a>
         <a class="up_li" href="/user/appeals/">
            <div class="menu_cin"><i class="fal fa-comment-alt-dots"></i></div>
            <div class="menu_cih">Обращения</div>
         </a>
      </div> -->
   <? else: ?>
      <div class="up_lt">
         <span>Меню</span>
         <a class="up_li <?=($menu_name=='orders'?'user_pli_act':'')?>" href="/user/orders/">
            <div class="menu_cin"><i class="fal fa-bags-shopping"></i></div>
            <div class="menu_cih">Мои заказы</div>
         </a>
         <!-- <a class="up_li" href="/favorites/">
            <div class="menu_cin"><i class="fal fa-heart"></i></div>
            <div class="menu_cih">Любимые товары</div>
         </a> -->
         <!-- <a class="up_li" href="/user/">Скидка покупателя</a> -->
         <!-- <a class="up_li <?=($menu_name=='ques'?'user_pli_act':'')?>" href="/user/ques/">
            <div class="menu_cin"><i class="fal fa-comment-alt-lines"></i></div>
            <div class="menu_cih">Отзывы и вопросы</div>
         </a> -->
         <a class="up_li <?=($menu_name=='address'?'user_pli_act':'')?>" href="/user/address/">
            <div class="menu_cin"><i class="fal fa-map-pin"></i></div>
            <div class="menu_cih">Адрес доставки</div>
         </a>
         <a class="up_li <?=($menu_name=='acc'?'user_pli_act':'')?>" href="/user/acc/">
            <div class="menu_cin"><i class="fal fa-user"></i></div>
            <div class="menu_cih">Личные данные</div>
         </a>
      </div>
      <!-- <div class="up_lt">
         <a class="up_li" href="#">
            <div class="menu_cin"><i class="fal fa-pen"></i></div>
            <div class="menu_cih">Обратный связь</div>
         </a>
         <a class="up_li <?=($menu_name=='appeals'?'user_pli_act':'')?>" href="/user/appeals/">
            <div class="menu_cin"><i class="fal fa-comment-alt-dots"></i></div>
            <div class="menu_cih">Обращения</div>
         </a>
      </div> -->
   <? endif ?>
   <div class="up_lt">
      <a class="up_li" href="/user/exit.php">
         <div class="menu_cin"><i class="fal fa-sign-out"></i></div>
         <div class="menu_cih">Выйти</div>
      </a>
   </div>
</div>