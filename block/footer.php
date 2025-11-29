	<!-- body end -->
	</div>

	<? if ($site_set['footer']): ?>
		<footer class="footer">
			<div class="bl_c">
				<? if ($site_set['footer_t']): ?>
					<div class="footer_t">
						<div class="footer_tt">
							<div class="footer_ttl">
								<div class="footer_tth">Присоединяйтесь к <?=$site['name']?></div>
								<div class="footer_ttc">
									<div class="footer_ttp">Воплотите свои идеи в жизнь благодаря специальным скидкам, вдохновению и множеству хороших вещей в магазине. Это все бесплатно.</div>
									<a class="btn btn_back" href="#">Подробнее</a>
								</div>
								<a class="btn" href="/user/">Присоединятся</a>
							</div>
							<div class="footer_ttr">
								<div class="footer_ttri">
									<div class="footer_tth">Помощь</div>
									<div class="footer_tta"><i class="far fa-angle-down"></i></div>
									<div class="footer_ttc">
										<a href="/all/service/feedback/">Обратная связь</a>
										<a href="/all/service/">Обслуживание клиентов</a>
										<a href="/all/service/faq/">FAQ (Часто задаваемые вопросы)</a>
										<a href="/all/service/track-manage-order/">Мои заказы</a>
										<a href="/all/service/returns-claims/">Политика возврата</a>
										<a href="/all/service/returns-claims/guarantee.php">Гарантии</a>
										<a href="/all/service/product-support/recalls.php">Отзыв продукта</a>
									</div>
								</div>
								<div class="footer_ttri">
									<div class="footer_tth">Покупайте</div>
									<div class="footer_tta"><i class="far fa-angle-down"></i></div>
									<div class="footer_ttc">
										<a href="/all/contacts/">Контакты</a>
										<a href="/all/stores/">Найти отделение</a>
										<a href="/all/services/">Услуги <?=$site['name']?></a>
										<a href="/all/family/">Семья <?=$site['name']?></a>
										<!-- <a href="#">Инструменты планирования <?=$site['name']?></a> -->
										<a href="/all/service/product-support/buying-guides/">Руководства по покупке</a>
										<a href="/all/gift-cards/">Подарочные карты</a>
										<!-- <a href="#">Подарочный реестр</a> -->
										<!-- <a href="#">Управление кредитными картами <?=$site['name']?></a> -->
										<!-- <a href="#">Кредитные карты <?=$site['name']?></a> -->
										<!-- <a href="#">Изучите новое приложение <?=$site['name']?></a> -->
									</div>
								</div>
								<div class="footer_ttri">
									<div class="footer_tth">О компании</div>
									<div class="footer_tta"><i class="far fa-angle-down"></i></div>
									<div class="footer_ttc">
										<a href="/all/about/"><?=$site['name']?> это</a>
										<a href="/all/about/career/">Карьера</a>
										<a href="/all/about/partners/">Партнерам</a>
										<a href="/all/about/counterparties/">Контрагентами</a>
										<a href="/all/news/">Отдел новостей</a>
										<!-- <a href="#">Жизнь дома</a> -->
										<a href="/all/about/sustainable-everyday/">Экологичный каждый день</a>
										<!-- <a href="#">Фонд <?=$site['name']?></a> -->
										<!-- <a href="#">Создаем более безопасные дома вместе</a> -->
									</div>
								</div>
								<div class="footer_ttri">
									<div class="footer_tth">Политика <?=$site['name']?></div>
									<div class="footer_tta"><i class="far fa-angle-down"></i></div>
									<div class="footer_ttc">
										<a href="/all/service/privacy-security/">Конфиденциальность и безопасность</a>
										<a href="/all/service/privacy-security/privacy-policy.php">Политика конфиденциальности</a>
										<a href="/all/service/privacy-security/terms-conditions.php">Условия и положения</a>
										<a href="/all/service/privacy-security/cookie-policy.php">Политика в отношении файлов кэш (cookie)</a>
										<a href="#">Настройки файлов кэш (cookie)</a>
									</div>
								</div>
							</div>
						</div>
						<div class="footer_tb">
							<div class="footer_tbl">
								<a class="btn btn_dd" href="https://facebook.com/<?=$site['facebook']?>" target="_blank"><i class="fab fa-facebook"></i></a>
								<a class="btn btn_dd" href="https://instagram.com/<?=$site['instagram']?>" target="_blank"><i class="fab fa-instagram"></i></a>
								<a class="btn btn_dd" href="https://pinterest.com/<?=$site['pinterest']?>" target="_blank"><i class="fab fa-pinterest"></i></a>
								<a class="btn btn_dd" href="https://twitter.com/<?=$site['twitter']?>" target="_blank"><i class="fab fa-twitter"></i></a>
								<a class="btn btn_dd" href="https://youtube.com/<?=$site['youtube']?>" target="_blank"><i class="fab fa-youtube"></i></a>
							</div>
							<div class="footer_tbr">
								<!-- <div class="btn btn_p">
									<i class="fal fa-globe"></i>
									<span>Сменить страну</span>
								</div> -->
								<div class="btn btn_p">
									<i class="fal fa-map-pin"></i>
									<span>Алматы</span>
								</div>
								<div class="btn btn_p">
									<span>Русский</span>
									<i class="fal fa-angle-down"></i>
								</div>
							</div>
						</div>
					</div>
				<? endif ?>
				
				<div class="footer_b">
					<div class="footer_bl">© <?=$site['name']?>, 2022</div>
					<div class="footer_br">
						<a href="https://gprog.kz" target="_blank" class="gprog_bl">
							<span>Сделано в #gprog</span>
							<div class="gprog_ab">
								<div class="gprog_lg"><div class="lazy_img" data-src="https://gprog.kz/assets/img/logo/logo_tr_1200.png"></div></div>
								<div class="gprog_h">G prog</div>
								<div class="gprog_p">Интернет магазин для бизнеса</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</footer>
	<? endif ?>

	<!-- app end -->
</div>
	
	<!-- main js -->
	<? foreach ($sjs as $i): ?><script src="/assets/js/<?=$i?>.js?v=<?=$ver?>"></script><? endforeach ?>
	<? foreach ($js as $i): ?><script src="/assets/js/<?=$i?>.js?v=<?=$ver?>"></script><? endforeach ?>
		
</body>
</html>

	<? include "modal.php"; ?>