<?php

  require_once '_class/connection.php';

  $c = new Connection;
  $con = $c->connect();

  $result = null;
  $columns = '*';

  if(isset($_GET['user_id'])){
    $con->where('u.profile_deeplink', (string) $_GET['user_id']);
    $result = $con->get('user u');
  }

  print(json_encode($result));
