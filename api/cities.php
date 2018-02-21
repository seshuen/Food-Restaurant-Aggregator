<?php

require_once '_class/connection.php';

$c = new Connection;
$con = $c->connect();

$result = null;

if(isset($_GET['city'])){
  $con->where('name', "%". (string) $_GET['city'] . "%", "like");
  $result = $con->get('city', null, "*");
}
else if(isset($_GET['city_id'])){
  $con->where('id', (int) $_GET['city_id']);
  $result = $con->get('city', null, "name");  
}
else{
  $result = "Invalid Query!";
}

print(json_encode($result));
