<?php

class Restaurant{

  function getRestaurant($con, $id){
    $con->where('id', $id);
    $data = $con->get('restaurantl3');
    return $data;
  }

  function getByCity($con, $city_id){
    $columns = array("id", "name", "locality_verbose", "cuisines", "aggregate_rating", "featured_image");
    $con->where('city_id', $city_id);
    $data = $con->get('restaurantl3', null, $columns);
    return $data;
  }

  function getByCusine($con, $cuisines){
    $columns = array("id", "name", "locality_verbose", "cuisines", "aggregate_rating", "featured_image");
    $con->where('JSON_CONTAINS( `cuisines`, \''.$cuisines.'\')');
    $data = $con->get('restaurantl3', null, $columns);
    return $data;
  }

}
