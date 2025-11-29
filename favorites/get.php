<? include "../config/core.php";

	// add favorites
	if(isset($_GET['add_favorites'])) {
		$id = strip_tags($_POST['id']);

      if ($user_id) {
         $product_id = (product::pr_item($id))['product_id'];
         $favorites = db::query("select * from `on_favorites` where user_id = '$user_id' and item_id = '$id'");
         if (mysqli_num_rows($favorites)) $del = db::query("DELETE FROM `on_favorites` WHERE user_id = '$user_id' and item_id = '$id'");
         else $ins = db::query("INSERT INTO `on_favorites`(`user_id`, `product_id`, `item_id`) VALUES ('$user_id', '$product_id', '$id')");
      } else {
         if (isset($_SESSION['favorites'])) {
            if (in_array($id, $_SESSION['favorites'])) {
               if (count($_SESSION['favorites']) == 1) unset($_SESSION['favorites']);
               else $_SESSION['favorites'] = array_diff($_SESSION['favorites'], [$id]);
               $del = true;
            }
            else $ins = array_push($_SESSION['favorites'], $id);
         } else $ins = $_SESSION['favorites'] = array($id);
      }
      
      if ($del) echo 'del'; elseif ($ins) echo 'ins';
      exit();
	}