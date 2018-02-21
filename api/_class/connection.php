<?php

  require_once ('MysqliDb.php');

  class Connection{
    public static $host = 'localhost';
    public static $username = 'root';
    public static $password = '';
    public static $databaseName = 'foodie';

    public function connect(){
      $con = new MysqliDb (self::$host, self::$username, self::$password, self::$databaseName );
      return $con;
    }

  }

  // $test = new Connection;
  // $t = $test->connect();
  // $cat =  new Categories;
  // $x1 = $cat->getCategory($t, '3');
  // // var_dump($x1);
  // // $categories = $t->get('categories');
  // $rest =  new Restaurant;
  // $x = $rest->getByCity($t, '3');
  // $x2 = $rest->getByCusine($t, '["Italian"]');
  // // $products = $t->arraybuilder()->paginate("restaurantl3", '2');
  // // echo "showing 1 out of " . $t->totalPages;
  //
  // var_dump($x2);
