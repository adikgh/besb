<?php 

class fun {
	
	function __construct() {}








	// user
	public static function user($id) {
		$sql = db::query("select * from user where id = '$id'");
		return mysqli_fetch_array($sql);
	}
	public static function user_phone($phone) {
		$sql = db::query("select * from user where phone = '$phone'");
		if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return 0;
	}


	// user staff
	public static function user_staff($id) {
		$sql = db::query("select * from user_staff where user_id = '$id'");
		if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return 0;
	}
	public static function user_staff_name($id) {
		$sql = db::query("select * from user_staff where user_id = '$id'");
		$sql2 = mysqli_fetch_array($sql); $pid = $sql2['positions_id'];
		$sql3 = db::query("select * from user_staff_positions where id = '$pid'");
		return (mysqli_fetch_array($sql3))['name_ru'];
	}
	public static function user_staff_positions($id) {
		$sql = db::query("select * from user_staff_positions where id = '$id'");
		if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return 0;
	}


	// user_designer
	public static function user_designer($id) {
		$sql = db::query("select * from user_designer where user_id = '$id'");
		if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return 0;
	}
	public static function user_designer_partners($id) {
		$sql = db::query("select * from user_designer_partners where id = '$id'");
		if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return 0;
	}


	// autor
	// public static function autor($id) {
	// 	$sql = db::query("select * from u_autor where id = '$id'");
	// 	return mysqli_fetch_array($sql);
	// }











	



	






	







	// mall send
	public static function send_mail($mail, $txt) {
		$from = "info@aruacademy.kz";
		$subject = "Aru Academy";
		$headers = "From:" . $from. "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8";
      $mess = "<html>
						<head><title>$subject</title></head>
						<body>
							<div><b>$txt<b></div>
						</body>
					</html>";
	  	return mail($mail, $subject, $mess, $headers);
	}

















}