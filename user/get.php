<? include "../config/core.php";

	// sign in phone
	if(isset($_GET['sign'])) {
		$phone = strip_tags($_POST['phone']);
		$password = strip_tags($_POST['password']);
		$password = md5($password);
		$user = db::query("SELECT * FROM user WHERE phone = '$phone'");
		if (mysqli_num_rows($user)) {
			$user_d = mysqli_fetch_assoc($user);
			if ($password == $user_d['password2']) {
				$_SESSION['uph'] = $phone;
				$_SESSION['ups'] = $password;
				setcookie('uph', $phone, time() + 3600*24*30*6, '/');
				setcookie('ups', $password, time() + 3600*24*30*6, '/');
				echo 'yes';
			} else if ($user_d['password'] == null) echo 'code';
			else echo 'password';
		} else echo 'phone';
		exit();
	}

	// sign up
	if(isset($_GET['sign_up'])) {
		$name = strip_tags($_POST['name']);
		$surname = strip_tags($_POST['surname']);
		$phone = strip_tags($_POST['phone']);
		$password = strip_tags($_POST['password']);
		$password = md5($password);
		
		$user = db::query("SELECT * FROM user WHERE phone = '$phone'");
		if (!mysqli_num_rows($user)) {
			$ins = db::query("INSERT INTO `user`(`phone`, `password2`, `name`, `surname`) VALUES ('$phone', '$password', '$name', '$surname')");
			if ($ins) {
				$_SESSION['uph'] = $phone;
				$_SESSION['ups'] = $password;
				setcookie('uph', $phone, time() + 3600*24*30*6, '/');
				setcookie('ups', $password, time() + 3600*24*30*6, '/');
				echo 'yes';
			}
			else echo 'none';			
		} else echo 'phone';
		exit();
	}










	


	// sign in
	// if(isset($_GET['password'])) {
	// 	$login = strip_tags($_POST['login']);
	// 	$user = db::query("SELECT * FROM user WHERE phone = '$login' and phone is not null");

	// 	if (mysqli_num_rows($user)) {
	// 		$user_d = mysqli_fetch_assoc($user);
			
	// 	} elseif (mysqli_num_rows($user2)) {
	// 		$user_d2 = mysqli_fetch_assoc($user2);
	// 		if ($password == $user_d2['password']) {
	// 			$_SESSION['upm'] = $login;
	// 			$_SESSION['ups'] = $password;
	// 			setcookie('upm', $login, time() + 3600*24*30);
	// 			setcookie('ups', $password, time() + 3600*24*30);
	// 			echo 'yes';
	// 		} else echo 'none';
	// 	} else echo 'none';

	// 	exit();
	// }


	// login 2
	// if(isset($_GET['login2'])) {
	// 	$login = strip_tags($_POST['login']);
	// 	$user = db::query("SELECT * FROM user WHERE phone = '$login' and phone is not null");
	// 	$user2 = db::query("SELECT * FROM user WHERE mail = '$login' and mail is not null");

	// 	if (mysqli_num_rows($user)) {
	// 		$user_d = mysqli_fetch_assoc($user);
	// 		if ($user_d['password'] == null) {
	// 			if ($user_d['code'] != null) {
	// 				$code = $user_d['code'];
	// 				$mess = "Aru Academy | Тексеру коды: $code";
	// 				list($sms_id, $sms_cnt, $cost, $balance) = send_sms($login, $mess, 0, 0, 0, 0, false);
	// 			} else {
	// 				$ins = db::query("UPDATE `user` SET `code`='$code' WHERE phone = '$login'");
	// 				$mess = "Aru Academy | Тексеру коды: $code";
	// 				list($sms_id, $sms_cnt, $cost, $balance) = send_sms($login, $mess, 0, 0, 0, 0, false);
	// 			}
	// 			echo 'code';
	// 		} else echo 'yes';
	// 	} elseif (mysqli_num_rows($user2)) {
	// 		$user_d = mysqli_fetch_assoc($user2);
	// 		if ($user_d['password'] == null) {
	// 			if ($user_d['code'] != null) {
	// 				$code = $user_d['code'];
	// 				$mess = "Aru Academy | Тексеру коды: $code";
	// 				fun::send_mail($mail, $mess);
	// 			} else {
	// 				$ins = db::query("UPDATE `user` SET `code`='$code' WHERE mail = '$login'");
	// 				$mess = "Aru Academy | Тексеру коды: $code";
	// 				fun::send_mail($mail, $mess);
	// 			}
	// 			echo 'code';
	// 		} else echo 'yes';
	// 	} else echo 'none';

	// 	exit();
	// }







	// code
	// if(isset($_GET['sign_up_code'])) {
	// 	$phone = strip_tags($_POST['phone']);
	// 	$code = strip_tags($_POST['code']);
	// 	$user = db::query("SELECT * FROM user WHERE phone = '$phone' and code = '$code'");
	// 	if (mysqli_num_rows($user)) {
	// 		$_SESSION['phone'] = $phone;
	// 		$_SESSION['code'] = $code;
	// 		echo 'yes';
	// 	} else echo 'none';
	// 	exit();
	// }

	// sign_up final
	// if(isset($_GET['sign_up_final'])) {
	// 	$name = strip_tags($_POST['name']);
	// 	$password = strip_tags($_POST['password']);
	// 	if (isset($_SESSION['phone']) && isset($_SESSION['code'])) {
	// 		$phone = $_SESSION['phone'];
	// 		$code = $_SESSION['code'];
	// 		$upd = db::query("UPDATE `user` SET `name`='$name', `password`='$password' WHERE phone = '$phone' and code = '$code'");
	// 		$_SESSION['uph'] = $phone;
	// 		setcookie('uph', $phone, time() + 3600*24*30);
	// 		$_SESSION['ups'] = $password;
	// 		setcookie('ups', $password, time() + 3600*24*30);
	// 	}
	// 	echo "yes";
	// 	exit();
	// }




	// pass_reset
	if(isset($_GET['reset_phone'])) {
		$phone = strip_tags($_POST['phone']);
		$user = db::query("SELECT * FROM user WHERE phone = '$phone'");
		if (mysqli_num_rows($user)) {
			$user_d = mysqli_fetch_assoc($user);
			if ($user_d['code'] != null) {
				$code = $user_d['code'];
				$mess = "Aru Academy | Тексеру коды: $code";
				list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $mess, 0, 0, 0, 0, false);
			} else {
				$ins = db::query("UPDATE `user` SET `code`='$code' WHERE phone = '$phone'");
				$mess = "Aru Academy | Тексеру коды: $code";
				list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $mess, 0, 0, 0, 0, false);
			}
			echo 'code';
		} else echo 'phone';
		exit();
	}

	// code
	if(isset($_GET['reset_code'])) {
		$phone = strip_tags($_POST['phone']);
		$code = strip_tags($_POST['code']);
		$user = db::query("SELECT * FROM user WHERE phone = '$phone' and code = '$code'");
		if (mysqli_num_rows($user)) {
			$_SESSION['phone'] = $phone;
			$_SESSION['code'] = $code;
			echo 'yes';
		} else echo 'none';
		exit();
	}

	// sign_up final
	if(isset($_GET['reset_final'])) {
		$password = strip_tags($_POST['password']);
		if (isset($_SESSION['phone']) && isset($_SESSION['code'])) {
			$phone = $_SESSION['phone'];
			$code = $_SESSION['code'];
			$upd = db::query("UPDATE `user` SET `password`='$password' WHERE phone = '$phone' and code = '$code'");
			$_SESSION['uph'] = $phone;
			setcookie('uph', $phone, time() + 3600*24*30);
			$_SESSION['ups'] = $password;
			setcookie('ups', $password, time() + 3600*24*30);
		}
		echo "yes";
		exit();
	}





	// pass_reset
	// if(isset($_GET['pass_reset'])) {
	// 	$login = strip_tags($_POST['login']);
	// 	$user = db::query("SELECT * FROM user WHERE phone = '$login'");
	// 	$user2 = db::query("SELECT * FROM user WHERE mail = '$login'");

	// 	if (mysqli_num_rows($user)) {
	// 		$sql = db::query("UPDATE `user` SET `code`='$code' WHERE phone = '$login'");
	// 		$mess = "Aru Academy | Тексеру коды: $code";
	// 		list($sms_id, $sms_cnt, $cost, $balance) = send_sms($login, $mess, 0, 0, 0, 0, false);
	// 		echo "yes";
	// 	} elseif (mysqli_num_rows($user2)) {
	// 		$sql = db::query("UPDATE `user` SET `code`='$code' WHERE mail = '$login'");
	// 		$mess = "Aru Academy | Тексеру коды: $code";
	// 		fun::send_mail($mail, $mess);
	// 		echo "yes";
	// 	} else echo 'none';

	// 	exit();
	// }

	// // sign reset
	// if(isset($_GET['sign_reset'])) {
	// 	$phone = $_SESSION['phone'];
	// 	$mail = $_SESSION['mail'];
	// 	$code = $_SESSION['code'];
	// 	$password = strip_tags($_POST['password']);
		
	// 	if ($phone != null) {
	// 		$upd = db::query("UPDATE `user` SET `password`='$password' WHERE phone = '$phone' and code = '$code'");
	// 		$_SESSION['uph'] = $phone;
	// 		setcookie('uph', $phone, time() + 3600*24*30);
	// 	} else {
	// 		$upd = db::query("UPDATE `user` SET `password`='$password' WHERE mail = '$mail' and code = '$code'");
	// 		$_SESSION['upm'] = $mail;
	// 		setcookie('upm', $mail, time() + 3600*24*30);
	// 	}
		
	// 	$_SESSION['ups'] = $password;
	// 	setcookie('ups', $password, time() + 3600*24*30);
	// 	echo "yes";
	// 	exit();
	// }




	// ubd user
	if(isset($_GET['ubd_acc'])) {
		$n_name = strip_tags($_POST['n_name']);
		$surname = strip_tags($_POST['surname']);
		$sex = strip_tags($_POST['sex']);
		$age = strip_tags($_POST['age']);
		$mail = strip_tags($_POST['mail']);
		$phone = strip_tags($_POST['phone']);
		$password = strip_tags($_POST['password']);
		
		$upd = db::query("UPDATE `user` SET `name`='$n_name', `surname`='$surname', `sex`='$sex', `age`='$age', `mail`='$mail', `phone`='$phone', `password`='$password', `upd_dt`='$datetime' WHERE id = '$user_id'");

		$_SESSION['uph'] = $phone;
		$_SESSION['upm'] = $mail;
		$_SESSION['ups'] = $password;
		setcookie('uph', $phone, time() + 3600*24*30);
		setcookie('upm', $mail, time() + 3600*24*30);
		setcookie('ups', $password, time() + 3600*24*30);

		echo "yes";
		exit();
	}




















	// product_add 
	if(isset($_GET['staff_add'])) {
		$name = strip_tags($_POST['name']);
		$phone = strip_tags($_POST['phone']);
		
		// $mess = "Вам доступна платформа. \nСсылка: https://lighterior.kz/";
		// $password = '123456';
		// $password2 = md5($password);

		$user_pr_d = fun::user_phone($phone);
		if ($user_pr_d == 0) {
			// $user_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `user`")))['max(id)'] + 1;
			// $user_ins = db::query("INSERT INTO `user`(`id`, `phone`, `password`, `password2`, `name`, `rights`) VALUES ('$user_id', '$phone', '$password', '$password2', '$name', 1)");
			// if ($user_ins) list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $mess, 0, 0, 0, 0, false);
			echo 'none';
		} else {
			$partner_id = $user_pr_d['id'];
			$user_dpd = fun::user_designer_partners($partner_id);
			if ($user_dpd == 0) {
				$user_ins = db::query("INSERT INTO `user_designer_partners`(`user_id`, `partner_id`) VALUES ('$user_id', '$partner_id')");
				if ($user_ins) echo 'yes'; else echo 'error';
			} else echo 'has';

		}

		exit();
	}
	
	// meng_delete 
	if(isset($_GET['meng_delete'])) {
		$id = strip_tags($_POST['id']);
		// $upd = db::query("DELETE FROM `product_item` WHERE `product_id` = '$id'");
		$del = db::query("DELETE FROM `user_designer_partners` WHERE `id` = '$id'");
		if ($del) echo 'yes';
		else echo 'error';
		exit();
	}











	// product_add 
	if(isset($_GET['designer_add'])) {
		$id = strip_tags($_POST['id']);
		$compn = strip_tags($_POST['compn']);
		$ins = strip_tags($_POST['ins']);
		$site = strip_tags($_POST['site']);

		$designer_d = fun::user_designer($id);
		if ($designer_d == 0) {
			$ins = db::query("INSERT INTO `user_designer`(`user_id`, `company_name`, `instagram`, `site`) VALUES ('$id', '$compn', '$ins', '$site')");
			if ($ins) echo 'on'; else echo 'error';
		} else echo 'yes';

		exit();
	}

	// product_add 
	if(isset($_GET['designer_edit'])) {
		$id = strip_tags($_POST['id']);
		$name = strip_tags($_POST['name']);
		$compn = strip_tags($_POST['compn']);
		$ins = strip_tags($_POST['ins']);
		$site = strip_tags($_POST['site']);

		if ($name) $upd = db::query("UPDATE `user` SET `name` = '$name' WHERE `id` = '$id'");
		if ($compn) $upd = db::query("UPDATE `user_designer` SET `company_name` = '$compn' WHERE `user_id` = '$id'");
		if ($ins) $upd = db::query("UPDATE `user_designer` SET `instagram` = '$ins' WHERE `user_id` = '$id'");
		if ($site) $upd = db::query("UPDATE `user_designer` SET `site` = '$site' WHERE `user_id` = '$id'");
		echo 'yes';
		
		exit();
	}
	
	// meng_delete 
	if(isset($_GET['designer_delete'])) {
		$id = strip_tags($_POST['id']);
		$upd = db::query("UPDATE `user` SET designer = null WHERE `id` = '$id'");
		$del = db::query("DELETE FROM `user_designer` WHERE `user_id` = '$id'");
		if ($del) echo 'yes'; else echo 'error';
		exit();
	}