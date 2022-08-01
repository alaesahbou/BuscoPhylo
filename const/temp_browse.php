<?php
if (isset($_SESSION['order_by'])) {
  $orderby = " views DESC ";
}else{
  $orderby = " c_id DESC ";
}
?>
