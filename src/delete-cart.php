<?php
$cookie_data = stripslashes($_COOKIE['shopping_cart']);
$cart_data = json_decode($cookie_data, true);

foreach($cart_data as $keys => $values) {
  unset($cart_data[$keys]);
  $item_data = json_encode($cart_data);
  setcookie('shopping_cart', $item_data, time() + (86400 * 30));
  $success = true;
}
?>