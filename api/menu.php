<?php


  require_once '_class/connection.php';

  $c = new Connection;
  $con = $c->connect();

  $result = null;
  $columns = '*';

  if(isset($_GET['rest_id'])){
    $con->where('rest_id', (int) $_GET['rest_id']);
    $result = $con->get('menu');
  }

  print(json_encode($result));
