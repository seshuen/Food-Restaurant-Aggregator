<?php

    // Set the City
    $city = isset($_GET['city']) ? $_GET['city'] : 3;

    function generateIcons($id){
      // Randomly generate icon
      $icons = array('1','2','3','5','6','7','8','9','10','11','12','13','14');
      if(in_array($id, $icons)){
        $url = "https://b.zmtcdn.com/images/search_tokens/app_icons/category_".$id.".png?fit=around%7C88%3A88&crop=88%3A88%3B%2A%2C%2A";
      }
      else{
        $url = "https://b.zmtcdn.com/images/search_tokens/app_icons/special_10.png?fit=around%7C88%3A88&crop=88%3A88%3B%2A%2C%2A";
      }
      return $url;
    }

    function getData($url){
      // Get data
      $data =  file_get_contents($url);
      return json_decode($data);
    }

    $city_name = $url = "http://localhost/foodie/api/cities?city_id=" . $city;
    $c = getData($url);

    function getCatURL($id, $name, $city){
      // return str_replace(" ", "-", strtolower($value));
      return "<a href='categories?id=". $id ."&city=".$city."' class='column ta-center start-categories-item'>
                        <img class='ui middle aligned mini image mb5 lazy' src='".generateIcons($id)."' data-original='".generateIcons($id)."' style='height: 48px; width: 48px;'/>
                        <div>". $name . "</div>
                    </a>";
    }

    function getLocURL($locality, $count, $city){
      // return str_replace(" ", "-", strtolower($value));
      return "<a class='col-l-1by3 col-s-8 pbot0'  href='locality?city=".$city."&locality=".urlencode($locality)."'>".$locality."<span class='grey-text hide-on-mobile'>(". $count . " places)</span>
                    </a>";
    }

    $url = "http://localhost/foodie/api/categories?city_id=" . $city;
    $d = getData($url);

    $top_rest = $url = "http://localhost/foodie/api/top_rest?city_id=" . $city;
    $t = getData($top_rest);

    $loc_url = "http://localhost/foodie/api/location_details?city=" . $city;
    $loc = getData($loc_url);

    // foreach($loc as $l):
    //   echo getLocURL($l->locality, $l->count, $city) . "<br>";
    // endforeach;
 ?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
  <meta charset="utf-8" />
  <meta content="origin" name="referrer" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Food!e</title>
  <meta name="description" content="<?php echo $c[0]->name; ?> Restaurants - " />
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, initial-scale=1">


  <script type="text/javascript">
  </script>

  <link rel="stylesheet" type="text/css" href="css/gencss.css" />
  <link rel="stylesheet" type="text/css" href="css/genui.css" />
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />


  <!--[if IE 8]>
    <script type="text/javascript" src="https://b.zmtcdn.com/application/javascript/respond.min.js"></script>
    <script type="text/javascript" src="https://b.zmtcdn.com/application/javascript/pie.js"></script>
    <![endif]-->
</head>

<body class="start ct-present is-responsive en">

  <div class="zimagery" style="background-image: url(https://b.zmtcdn.com/images/foodshots/cover/pizza3.jpg?output-format=webp);; background-size: cover;">
    <div class="zimagery-overlay" style="background: rgba(0,0,0,0.4);">
      <div id="resp-search-container" class="search-box-area"></div>

      <div class="h-city-main p-relative" id="zimagery-container">
        <div class="logo--home">
          <a class="logo--header" href="#">
          <!-- <img src="img/foodie.jpg" alt=""> -->
          </a>
        </div>
        <h1 class="h-city-home-title">
        Find the best restaurants, cafés, and bars in <?php echo $c[0]->name; ?>    </h1>
        <div class="wrapper">

          <div id="search_main_container" class="full_search  ">
              <form id="search_bar_wrapper" class="search_bar search-zindex" action='restaurant' method='get'>
              <div class="flex-shrink-1 search-box plr0i ml10 mr10">
                <div id="keywords_container" class="col-s-16 pr0">
                  <div id="keywords_pretext">
                    <div class="k-pre-1 hidden" style="overflow:hidden;">
                      <span class="search-bar-icon mr5">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>

                      <div class="keyword_placeholder nowrap">
                        <div class="keyword_div">Search for restaurants</div>
                      </div>
                    </div>
                    <div class="k-pre-2  w100">
                        <span class="search-bar-icon mr5"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <label id="label_search_res" class="hdn">Search for restaurants</label>
                        <input type="text" id="keywords_input" name="name" class="discover-search auto" placeholder="Search for restaurants" autocomplete="off" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex-shrink-0 plr0i"><input  class="left ui red button" type="submit" name="query" value="Search">
              </div>
              <div class="clear"></div>
              </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="pbot clearfix"></div>
  <section class="wrapper mtop2">
    <div class="row">
      <div class="col-l-3by3">
        <h2 class="ui header">
                            <span class="segment_heading">Top Restaurants in <?php echo $c[0]->name; ?></span>
                            <span class="sub header">
                                <span class="segment_sub_heading">
                                    Explore curated lists of top restaurants, cafes, pubs, and bars in and around <?php echo $c[0]->name; ?>, based on trends                                </span>
                            </span>
                        </h2>
        <div class="collections-grid row">
          <?php foreach($t as $rest): ?>
          <div class="col-l-8 col-s-16 mbot">
            <div class="ui fluid card">
              <a href="/foodie/restaurant?name=<?php echo urlencode($rest->name); ?>">
                <div class="row">
                  <div class="col-s-7">
                    <div title="Top Restaurants in <?php echo $rest->locality; ?>" class="collection-box-bg lazy-collection-load" data-original="https://b.zmtcdn.com/data/collections/e140962ec7eecbb851155fe0bb0cd28c_1501223786.jpg?fit=around%7C300%3A250&amp;crop=300%3A250%3B%2A%2C%2A" style="background-image: url(<?php echo urldecode($rest->featured_image); ?>); background-position: center; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader( src='<?php echo urldecode($rest->featured_image); ?>', sizingMethod='scale');">
                    </div>
                  </div>
                  <div class="col-s-9">
                    <div class="row">
                      <div class="ptop0 mr20 ml5 coll_detail">
                        <div class="heading bold ln20">
                          <?php echo $rest->name; ?>
                        </div>



                        <div class="zblack fontsize4 description mt5  hp "><?php echo $rest->address; ?></div>



                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>


  <section class="wrapper mtop2 ptop">
    <h2 class="ui header">
                <span class="segment_heading">Quick Searches</span>
                <span class="sub header">
                    <span class="segment_sub_heading">
                        Discover restaurants by type of meal                    </span>
                </span>
            </h2>
    <div class="ui segment eight column doubling padded grid">
      <?php
      $i = 0;
      foreach($d as $cat):
        if($i < 8)
          echo getCatURL($cat[0]->category_id, $cat[0]->category_name, $city);
        $i ++;
      endforeach;
        ?>
    </div>
  </section>

  <section class="wrapper mtop2 ptop">
    <h2 class="ui header">
                <span class="segment_heading">
                    Popular localities in and around <?php echo $c[0]->name; ?>                </span>
                <span class="sub header">
                    <span class="segment_sub_heading">
                        Explore restaurants, bars, and cafés by locality                    </span>
                </span>
            </h2>
    <div class="ui segment row">
      <?php
      foreach($loc as $l):
        echo getLocURL($l->locality, $l->count, $city);
      endforeach;
      ?>
    </div>
  </section>
  <section class="wrapper ptop ta-center mbot2"></section>

      <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
      <script type="text/javascript">
      $(function() {

          //autocomplete
          $(".auto").autocomplete({
              source: "search.php",
              minLength: 1
          });

      });
      </script>
    </body>
</html>
