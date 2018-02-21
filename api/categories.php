<?php


  require_once '_class/connection.php';

  $c = new Connection;
  $con = $c->connect();



  if(isset($_GET['city_id'])){
    $output= array();
    if(isset($_GET['locality'])){
      $con->where('locality', $_GET['locality']);
    }

    $con->where('city_id', (int) $_GET['city_id']);
    $result = $con->get('restaurantl3', null, "DISTINCT cat_id");
    foreach($result as $category){
      $con->where('category_id', (int) $category['cat_id']);
      $r = $con->get('categories', null, "*");
      if(sizeof($r) == 1)
        array_push($output, $r);
    }
  }
  else if(isset($_GET['category_id'])){
      $con->where('category_id', (int) $_GET['category_id']);
      $output = $con->get('categories',null, "category_name");
  }
  

  print(json_encode($output));
