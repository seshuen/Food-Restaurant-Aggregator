<?php

  /*
  * Class categories
  * Description: Consist of details related to categories of restaurants
  */

  class Categories{

    function getAllCategories($con){

      $data = $con->get('categories');
      return $data;
    }

    function getCategory($con, $id){
      $con->where('category_id', $id);
      $data = $con->get('categories');
      return $data;
    }

  }
