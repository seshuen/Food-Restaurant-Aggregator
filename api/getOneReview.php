<?php

  require_once '_class/connection.php';

  $c = new Connection;
  $con = $c->connect();

  $result = null;
  $columns = '*';

  if(isset($_GET['rest_id'], $_GET['user_id'])){
    $con->where('rest_id', (int) $_GET['rest_id']);
    $con->where('user_id', urldecode($_GET['user_id']));
    $result = $con->get('reviews');
  }

  // var_dump(sizeof($result));
  print(json_encode($result));
