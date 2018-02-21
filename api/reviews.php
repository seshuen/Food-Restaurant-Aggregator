<?php

  require_once '_class/connection.php';

  $c = new Connection;
  $con = $c->connect();

  $result = null;
  $columns = '*';

  if(isset($_GET['rest_id'])){
    $con->join('user u', 'r.user_id = u.profile_deeplink', 'INNER');
    $con->where('r.rest_id', (int) $_GET['rest_id']);
    $con->orderBy('r.timestamp', 'DESC');
    $result = $con->get('reviews r');
  }

  print(json_encode($result));
