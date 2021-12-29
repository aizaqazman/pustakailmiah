<?php
if(isset($_COOKIE['orders_list'])) {
  $cookie_data = stripslashes($_COOKIE['orders_list']);
  $order_data = json_decode($cookie_data, true);
  if(!empty($order_data)) {
    foreach($order_data as $keys => $values){
      echo $values['order_id']."<br>";
    }
  } else {
    echo "no order";
  }
}
else {
  echo "no cookie order";
}
?>