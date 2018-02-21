<?php

  require_once '_class/connection.php';
  require '_class/categories.php';
  require '_class/restaurant.php';



  $test = new Connection;

  $t = $test->connect();
  // $cat =  new Categories;
  // $x1 = $cat->getCategory($t, '3');
  // var_dump($x1);
