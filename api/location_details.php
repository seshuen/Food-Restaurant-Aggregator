<?php

require_once '_class/connection.php';

$c = new Connection;
$con = $c->connect();

$result = null;

if(isset($_GET['city'])){

  $con->where('city_id', $_GET['city']);
  $con->where('location_type', "subzone");
  $con->groupBy("locality");
  $result = $con->get('restaurantl3', null, "locality, count(*) as count");
}
else{
  $result = "Invalid Query!";
}

print(json_encode($result));
