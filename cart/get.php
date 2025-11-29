<? include "../config/core.php";

	// add cart
	if(isset($_GET['add_cart'])) {
		$id = strip_tags($_POST['id']);
      $product_id = (product::pr_item($id))['product_id'];

      $cart = db::query("select * from `on_cart` where user_id = '$user_id' and item_id = '$id'");
      if (mysqli_num_rows($cart)) $upd = db::query("UPDATE `on_cart` SET quantity = quantity + 1 WHERE user_id = '$user_id' and item_id = '$id'");
      else $ins = db::query("INSERT INTO `on_cart`(`user_id`, `product_id`, `item_id`, `quantity`) VALUES ('$user_id', '$product_id', '$id', 1)");
      
      if ($upd || $ins) echo 'yes'; else echo 'error';
      exit();
	}

	// delete cart
	if(isset($_GET['delete_cart'])) {
		$id = strip_tags($_POST['id']);
		$del = db::query("DELETE FROM `on_cart` where id = '$id'");
		if ($del) echo 'yes'; else echo 'error';
		exit();
	}

	// minus cart
	if(isset($_GET['minus_cart'])) {
		$id = strip_tags($_POST['id']);
		$upd = db::query("UPDATE `on_cart` SET quantity = quantity - 1 WHERE id = '$id'");
		if ($upd) echo 'yes'; else echo 'error';
		exit();
	}

	// plus cart
	if(isset($_GET['plus_cart'])) {
		$id = strip_tags($_POST['id']);
		$upd = db::query("UPDATE `on_cart` SET quantity = quantity + 1 WHERE id = '$id'");
		if ($upd) echo 'yes'; else echo 'error';
		exit();
	}
	
	// plus cart
	if(isset($_GET['quantity_cart'])) {
		$id = strip_tags($_POST['id']);
		$quantity = strip_tags($_POST['quantity']);
		$upd = db::query("UPDATE `on_cart` SET quantity = '$quantity' WHERE id = '$id'");
		if ($upd) echo 'yes'; else echo 'error';
		exit();
	}












	// 
	if(isset($_GET['add_order'])) {
		$sum = strip_tags($_POST['sum']);
		$name = strip_tags($_POST['name']);
		$phone = strip_tags($_POST['phone']);
		$delivery_method = strip_tags($_POST['delivery_method']);
		$payment_method = strip_tags($_POST['payment_method']);

		$delivery_method = 0;
		$payment_method = 0;
		
		$id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `on_orders`")))['max(id)'] + 1;
      $ins = db::query("INSERT INTO `on_orders`(`id`, `delivery_method`, `payment_method`, `sum`) VALUES ('$id', '$delivery_method', '$payment_method', '$sum')");
		if ($user_id) $upd = db::query("UPDATE `on_orders` SET user_id = '$user_id' WHERE id = '$id'");
		if ($name) $upd = db::query("UPDATE `on_orders` SET name = '$name' WHERE id = '$id'");
		if ($phone) $upd = db::query("UPDATE `on_orders` SET phone = '$phone' WHERE id = '$id'");
	
		if ($ins) {
			$favorites = db::query("select * from on_cart where user_id = '$user_id' order by ins_dt desc");
			while ($fp_d = mysqli_fetch_assoc($favorites)) {
				$product_id = product::product($fp_d['product_id'])['id'];
				$item_id = product::pr_item($fp_d['item_id'])['id'];
				$quantity = $fp_d['quantity'];
				// $price = $fp_d['price'];
				$fp_id = $fp_d['id'];
	
				$inspr = db::query("INSERT INTO `on_orders_product`(`order_id`, `product_id`, `item_id`, `quantity`) VALUES ('$id', '$product_id', '$item_id', '$quantity')");
				$del = db::query("DELETE FROM `on_cart` WHERE id = '$fp_id'");
			}
			echo 'yes';
		} else echo 'error';

      exit();
	}