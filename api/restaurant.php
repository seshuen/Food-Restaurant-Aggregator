<?php

  require_once '_class/connection.php';
  // require '_class/restaurant.php';

  $c = new Connection;
  $con = $c->connect();
  // $restaurant =  new Restaurant;
  class ExceptionHandler {
      public static function printException(Exception $e)
      {
          print 'Uncaught '.get_class($e).', code: ' . $e->getCode() . "<br />Message: " . htmlentities($e->getMessage())."\n";
      }

      public static function handleException(Exception $e)
      {
           self::printException($e);
      }
  }

  set_exception_handler(array("ExceptionHandler", "handleException"));
  class InvalidValue extends Exception {}

  $result = null;
  $columns = '*';
  foreach($_GET as $param => $value){
    if($param == "cuisines"){
      if(sizeof(explode(",", $value)) > 0){
        $v =  explode(",", $value);

        $cuisine = "[\"";

        $cuisine .= implode("\",\"", $v);

        $cuisine .= "\"]";
        // var_dump($cuisine);
        $con->where("JSON_CONTAINS( `cuisines`, '".$cuisine."')");
      }
      else{
        try {
          throw new InvalidValue("Not a valid cusine");
          exit;
          }
          catch (Exception $e) {
            ExceptionHandler::handleException($e);
          }
      }
    }
    else if($param == "list"){
      $columns = array("id", "name","url","locality_verbose", "cuisines", "aggregate_rating", "thumb");
    }
    else{
      $con->where($param, $value);
    }
  }

  $result = $con->get('restaurantl3', null, $columns);

  $data = array();
  if(!isset($e)){
    // foreach($result as $r){
    //   $con->where('rest_id', $r['id']);
    //   $menu = $con->get('menu');
    //   $r["menu"] = $menu;
    //   array_push($data, $r);
    //
    //   $con->where('rest_id', $r['id']);
    //   $rev = $con->get('reviews');
    //   $r["reviews"] = $rev;
    //   array_push($data, $r);
    //
    // }
    // print(json_encode($data));
    // var_dump($data);
    // var_dump($result);
      print(json_encode($result));
  }
