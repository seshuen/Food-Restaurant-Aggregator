<?php

require_once '_class/connection.php';

$c = new Connection;
$con = $c->connect();

$result = null;
$bin_param = array();


if(isset($_GET['city_id'])){
  for($i=1; $i < 8; $i++){
    array_push($bin_param, $_GET['city_id']);
  }

  $result = $con->rawQuery("SELECT cuisine, count
  FROM
  (select count(*) as count, cuisines->'$[0]' as cuisine from restaurantl3 where city_id = ? group by cuisine
   union
   select count(*), cuisines->'$[1]'  as cuisine from restaurantl3 where city_id = ?
   union
   select count(*), cuisines->'$[2]'  as cuisine from restaurantl3 where city_id = ?
   union
   select count(*), cuisines->'$[3]'  as cuisine from restaurantl3 where city_id = ?
   union
   select count(*), cuisines->'$[4]'  as cuisine from restaurantl3 where city_id = ?
   union
   select count(*), cuisines->'$[5]'  as cuisine from restaurantl3 where city_id = ?
   union
   select count(*), cuisines->'$[6]'  as cuisine from restaurantl3 where city_id = ?) as r
   where cuisine is not null
   group by cuisine order by count DESC
   ", $bin_param);

}
else{
  $result = "Invalid Query!";
}

print(json_encode($result));

// SELECT count(*), cuisines->'$[0]' from restaurantl3 where city_id = 3 group by cuisines->'$[0]'

// SELECT c, cuisine
// FROM
// (select count(*) as c, cuisines->'$[0]' as cuisine from restaurantl3 where city_id = 3 group by cuisine
//  union
//  select count(*), cuisines->'$[1]'  as cuisine from restaurantl3 where city_id = 3
//  union
//  select count(*), cuisines->'$[2]'  as cuisine from restaurantl3 where city_id = 3
//  union
//  select count(*), cuisines->'$[3]'  as cuisine from restaurantl3 where city_id = 3
//  union
//  select count(*), cuisines->'$[4]'  as cuisine from restaurantl3 where city_id = 3
//  union
//  select count(*), cuisines->'$[5]'  as cuisine from restaurantl3 where city_id = 3
//  union
//  select count(*), cuisines->'$[6]'  as cuisine from restaurantl3 where city_id = 3) as r
//  where cuisine is not null
//  group by cuisine
//  order by c DESC
//  LIMIT 5
