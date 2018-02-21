<?php
require_once 'api/_class/connection.php';

$c = new Connection;
$con = $c->connect();

if (isset($_GET['term'])){
  $result_arr = array();

  $con->where('name', '%'.$_GET['term'].'%', 'like');
  $result = $con->get('restaurantl3');
  foreach($result as $r){
    $result_arr[] = $r['name'];
  }
}

  echo json_encode($result_arr);

?>
