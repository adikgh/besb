<?php include "../../config/core_a.php";
	require "../../config/gdrive.php";


	// 
	if(isset($_GET['product_img_add'])) {
		header('Content-Type: application/json');
		echo json_encode(menu_img_upload('../../assets/uploads/products/'), JSON_UNESCAPED_UNICODE);
		exit();
	}




   
   
   // product_add
	if(isset($_GET['product_add'])) {
		$name = strip_tags($_POST['name']);
		$catalog = strip_tags($_POST['catalog']);
		
		$price = strip_tags($_POST['price']);
		$img = strip_tags($_POST['img']);

      	$id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product`")))['max(id)'] + 1;
     	$ins = db::query("INSERT INTO `product`(`id`) VALUES ('$id')");
		if ($ins) {
			if ($name) $sql = db::query("UPDATE `product` SET `name_kz` = '$name', `name_ru` = '$name' WHERE `id`='$id'");
			if ($catalog) $sql = db::query("UPDATE `product` SET `catalog_id`='$catalog' WHERE `id`='$id'");
			if ($catalog) $sql = db::query("UPDATE `product` SET `price`='$price' WHERE `id`='$id'");
			if ($price) $sql = db::query("UPDATE `product` SET `img`='$img' WHERE id = '$id'");
				
			echo 'yes';
		} else echo 'error';

      exit();
	}
   


	
   // product arh
	if(isset($_GET['form_prd_online'])) {
		$id = strip_tags($_POST['id']);
		$val = strip_tags($_POST['val']);
		$upd = db::query("UPDATE `product` SET sale_online = '$val' WHERE id = '$id'");

      if ($upd) echo 'yes'; else echo 'error';
      exit();
	}


   // product arh
	if(isset($_GET['product_delete'])) {
		$id = strip_tags($_POST['id']);
		$upd = db::query("UPDATE `product` SET arh = 1 WHERE id = '$id'");
		if ($upd) echo 'yes'; else echo 'error';
		exit();
	}

   	// product_delete
	// if(isset($_GET['product_delete'])) {
	// 	$id = strip_tags($_POST['id']);

  	//    $upd = db::query("DELETE FROM `product_item_quantity` WHERE product_id = '$id'");
   	//    $upd = db::query("DELETE FROM `product_item` WHERE product_id = '$id'");
   	//    $del = db::query("DELETE FROM `product` WHERE id = '$id'");

   	//    if ($del) echo 'yes'; else echo 'error';
   	//    exit();
	// }




	// product_barcode search
	if(isset($_GET['product_barcode'])) {
		$search = strip_tags($_POST['result']);

		$barcode = db::query("select * from product_item where (barcode = '$search' and barcode is not null) or (article = '$search' and article is not null) limit 1");
		if (mysqli_num_rows($barcode)) {
			$barcode_d = mysqli_fetch_array($barcode);
			echo $barcode_d['product_id'];
		} else echo 'none';

      exit();
	}











	   // pr_upd
	if(isset($_GET['pr_upd'])) {
		$id = strip_tags($_POST['id']);
      	$name = strip_tags($_POST['name']);
		$catalog_id = strip_tags($_POST['catalog']);
		$price = strip_tags($_POST['price']);
		$img = strip_tags($_POST['img']);

      	if ($name) $upd = db::query("UPDATE `product` SET `name_kz` = '$name', `name_ru` = '$name', `upd_dt` = '$datetime' WHERE id = '$id'");
      	if ($catalog_id) $upd = db::query("UPDATE `product` SET `catalog_id` = '$catalog_id', `upd_dt` = '$datetime' WHERE id = '$id'");
      	if ($price) $upd = db::query("UPDATE `product` SET `price` = '$price', `upd_dt` = '$datetime' WHERE id = '$id'");
      	if ($img) $upd = db::query("UPDATE `product` SET `img` = '$img', `upd_dt` = '$datetime' WHERE id = '$id'");
      
		echo 'yes';
		exit();
	}










	// 
	if(isset($_GET['ct_img_add'])) {
		header('Content-Type: application/json');
		echo json_encode(menu_img_upload('../../assets/uploads/catalog/'), JSON_UNESCAPED_UNICODE);
		exit();
	}

	// pr_upd
	if(isset($_GET['ct_upd'])) {
		$id = strip_tags($_POST['id']);
      	$name = strip_tags($_POST['name']);
		$img = strip_tags($_POST['img']);

      	if ($name) $upd = db::query("UPDATE `product_catalog` SET `name_kz` = '$name', `name_ru` = '$name' WHERE id = '$id'");
      	if ($img) $upd = db::query("UPDATE `product_catalog` SET `img` = '$img' WHERE id = '$id'");
      
		echo 'yes';
		exit();
	}
	// product arh
	if(isset($_GET['ct_delete'])) {
		$id = strip_tags($_POST['id']);
		$upd = db::query("UPDATE `product_catalog` SET arh = 1 WHERE id = '$id'");
		if ($upd) echo 'yes'; else echo 'error';
		exit();
	}