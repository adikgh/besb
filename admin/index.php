<? include "../config/core_a.php";

	// 
	if (!$user_id) header('location: /admin/sign.php');
	else header('location: /admin/products');
	 
	
	// site setting
	$menu_name = 'home';
	$site_set['header'] = false;
	$site_set['footer'] = false;
	$css = [];
	$js = [];
?>
<? include "block/header.php"; ?>



<? include "block/footer.php"; ?>