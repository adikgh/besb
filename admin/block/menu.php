<? if ($site_set['header'] == true): ?>
	<div class="aheader <?=($site_set['mheader']!='false'?'':'mheader_none')?>" id="top">
		<div class="bl_c">
			<div class="aheader_c">
				<a class="alogo" href="/">Admin</a>
				<div class="ahead">
					<div class="ahead_l">
						<div class="">Besbarmak</div>
						<div class="">Kuimak</div>
					</div>
					<div class="ahead_r">
						<div class="ahead_rn">
							<div class="ahead_rni">
								<div class="ahead_rnicon"><i class="fal fa-bell"></i></div>
							</div>
							<div class="ahead_rni">
								<div class="ahead_rnicon"><i class="fal fa-tasks"></i></div>
							</div>
							<!-- <div class="ahead_rni">
								<div class="ahead_rnicon"><i class="fal fa-comment-alt-lines"></i></div>
							</div> -->
							<div class="ahead_rni">
								<div class="ahead_rnicon"><i class="fal fa-cog"></i></div>
							</div>
						</div>
						<div class="ub1_lx">
							<div class="ub1_lt" href="/user/">
								<div class="ub1_ltf">
									<div class=""><?=$user['name']?> <?=($user['surname']?substr($user['surname'],0,1).'.':'')?></div>
									<span><?=fun::user_staff_name($user_right['staff_id'], $lang)?></span>
								</div>
								<div class="ub1_lti lazy_img" data-src="/assets/uploads/users/<?=$user['img']?>"><? if (!$user['img']): ?><i class="fal fa-user"></i><? endif ?></div>
							</div>
							<div class="menu_c">
								<a class="menu_ci" href="/">
									<div class="menu_cin"><i class="fal fa-user"></i></div>
									<div class="menu_cih">Аккаунт</div>
								</a>
								<a class="menu_ci" href="/exit.php">
									<div class="menu_cin"><i class="fal fa-sign-out"></i></div>
									<div class="menu_cih">Выход</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<? endif ?>