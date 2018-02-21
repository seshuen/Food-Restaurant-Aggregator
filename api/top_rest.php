<?php
// SELECT * FROM `restaurantl3` where city_id = 3 ORDER BY `aggregate_rating` * `votes` DESC

require_once '_class/connection.php';

$c = new Connection;
$con = $c->connect();

$result = null;
$columns = '*';

if(isset($_GET['city_id'])){
  $con->where('city_id', (int) $_GET['city_id']);
  $con->orderBy('aggregate_rating * votes', 'DESC');
  $result = $con->get('restaurantl3',4,"*");
}

print(json_encode($result));
 ?>
