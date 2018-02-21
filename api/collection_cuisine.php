<?php

require_once '_class/connection.php';

$c = new Connection;
$con = $c->connect();

$result = null;

// Query to get based on cuisine
if(isset($_GET['city_id'], $_GET['cuisine'])){
  $con->where('city_id', (int) $_GET['city_id']);
  $con->where("JSON_CONTAINS( `cuisines`, '[\"".(string) $_GET['cuisine']."\"]')");
  $columns = array("id", "name", "locality_verbose", "cuisines", "aggregate_rating", "featured_image");
  $result = $con->get('restaurantl3', null, $columns);
}
else{
  $result = "Invalid Query!";
}

print(json_encode($result));
