<? include "../config/core.php";

	// add cart
	if(isset($_GET['add_cart'])) {
		$id = strip_tags($_POST['id']);
      $product_id = (product::pr_item($id))['product_id'];

      $cart = db::query("select * from on_cart where user_id = '$user_id'");
      if (mysqli_num_rows($cart)) {
         $cart_d = mysqli_fetch_array($cart);
         $cart_id = $cart_d['id'];
      } else {
         $cart_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `on_cart`")))['max(id)'] + 1;
         $ins_cart = db::query("INSERT INTO `on_cart`(`id`, `user_id`) VALUES ('$cart_id', '$user_id')");
      }

      if ($cart_id) {
         $cartp = db::query("select * from `on_cart_product` where cart_id = '$cart_id' and item_id = '$id'");
         if (mysqli_num_rows($cartp)) $upd = db::query("UPDATE `on_cart_product` SET quantity = quantity + 1 WHERE cart_id = '$cart_id' and item_id = '$id'");
         else $ins = db::query("INSERT INTO `on_cart_product`(`cart_id`, `product_id`, `item_id`, `quantity`) VALUES ('$cart_id', '$product_id', '$id', 1)");
         if ($upd || $ins) echo 'yes'; else echo 'error';
      } else echo 'error 2';

      exit();
	}