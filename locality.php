<?php
// SELECT count(*), locality from restaurantl3 where city_id = 3 group by locality

// Incorporate Top Cuisine and Top Rest in a new table to have multi table clustering done.

// Set the City
$city = isset($_GET['city']) ? $_GET['city'] : 3;
$locality = isset($_GET['locality']) ? urlencode($_GET['locality']) : null;

function getData($url){
  // Get data
  $data =  file_get_contents($url);
  return json_decode($data);
}

$url = "http://localhost/foodie/api/restaurant?city_id=" . $city."&locality=".$locality;
$d = getData($url);

$city_name = $url = "http://localhost/foodie/api/cities?city_id=" . $city;
$c = getData($url);

$cat_url = "http://localhost/foodie/api/categories?city_id=" . $city."&locality=".$locality;
$cat = getData($cat_url);
// var_dump($cat);
function getCuisine($cuisines){
  return implode("," , $cuisines);
}

function getLink($name){
  return 'restaurant?name='.$name;
}
?>
<!DOCTYPE html>

<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
  <meta charset="utf-8" />
  <meta content="origin" name="referrer" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Delivery Restaurants in <?php echo $c[0]->name; ?> - Zomato</title>
  <meta name="description" content="Delivery Restaurants in <?php echo $c[0]->name; ?>. View Menus, Pictures, Ratings and Reviews for Best Delivery Restaurants in <?php echo $c[0]->name; ?> - <?php echo $c[0]->name; ?> Restaurants for Delivery Restaurants" />
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, initial-scale=1">


  <link rel="stylesheet" type="text/css" href="css/gencss.css" />
  <link rel="stylesheet" type="text/css" href="css/genui.css" />
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
  <!--[if IE 8]>
    <script type="text/javascript" src="https://b.zmtcdn.com/application/javascript/respond.min.js"></script>
    <script type="text/javascript" src="https://b.zmtcdn.com/application/javascript/pie.js"></script>
    <![endif]-->
</head>
<body class=" is-responsive en">
  <div id="sticky_header" class="ui sticky v2">
    <header class="header  breadcrumb-present  navbar" id="header">
      <div class="header__container">
        <div class="header__wrapper clearfix">
          <a class="logo__container left" href="http://localhost/foodie/" title="Food!e">
            <h1 style="color:#fff; font-weight:bold;margin-top:-8px;font-size:30px;">Food!e</h1>
          </a>
          <div class="search__container left">
            <div class="header__search-bar">

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
                <div class="flex-shrink-0 plr0i"><input  class="left ui red button" type="submit" name="query" value="Search" style="border: 1.5px solid #fff;border-radius:2px;">
                </div>
                <div class="clear"></div>
                </form>

              </div>

            </div>
          </div>
          <!-- <div id="login-navigation" class="login__container right">
            <div class="header-link">
              <div class="ui button header-icon-button cursor-pointer clearfix top right pointing dropdown mr0">

                <div class="floating ui red mini label hidden" id="notifications-count"></div>

                <div class="ui left inline header-icon-menu header-icon-profile mr5">
                  <img class="lazy ui avatar image mr0 mini" data-original="https://b.zmtcdn.com/data/user_profile_pictures/355/69cfc7f47ee038e4a2711da73c529355.jpg?fit=around%7C100%3A100&amp;crop=100%3A100%3B%2A%2C%2A" src="https://b.zmtcdn.com/images/placeholder_200.png?output-format=webp"
                    alt="Seshu" />
                </div>
                <div class="vertical menu" style="width: 200px; right:0; left:initial; margin:8px 0 0;">
                  <div class="ui divider mt0 mb0"></div>
                  <a id="logout" href="https://www.zomato.com/logout?noReturnOnLogout=FALSE&amp;ctoken=837754a8bad4c1e88e18150ac1a29049" class="item">Log out</a>
                </div>

                <span class="username right ml0">
        Seshu
        <i class="ui caret down icon" data-icon="&#61655;"></i>
        </span>

              </div>
            </div>
          </div> -->
        </div>
      </div>

    </header>
    <div class="mini-header row">
      <div class="wrapper">
        <div class="row mini-header__breadcrumb">
          <div class="col-l-10 col-m-10">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="resp-search-container" class="search-box-area"></div>
  <div class="clear"></div>
  <section>
    <div id="mainframe" class="wrapper">
      <div class="row">
        <div class="col-l-16 search-top-area clearfix">
          <div class="search-header mb5">
            <h1 class="search_title ptop pb5 fn mb0 mt10 ">
            Restaurants in <?php echo $locality.", ".$c[0]->name; ?></h1>
            <div class="clear"></div><div class="clear"></div></div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="col-l-16">

              <div class="clear hidden filters_clearfix"></div>
              <div class="hidden mobile-block tablet-portrait-block">
                <div class="clear"></div>
              </div>


              <div class="col-s-16 search-start plr15 col-l-12 " id="search-start">
                <div class="row">
                  <div class="col-s-16 search_results mbot">
                    <section id="search-results-container" class="clearfix">

                      <div class="orig-search-list-container  ">
                        <div class="ui inverted dimmer">
                          <div class="ui red text loader" style="top: 70%; position: fixed;"></div>
                        </div>
                        <div class="clear"></div>
                        <div id="orig-search-list" class="ui cards">
                          <!-- START SHOWING SEARCH RESULTS -->
                          <?php
                          foreach($d as $data):
                            $image = $data->featured_image;
                            $default = "https://b.zmtcdn.com/images/placeholder_200.png";
                            $rating = $data->aggregate_rating;
                            $name = $data->name;
                            $address = $data->locality_verbose;
                            $cuisine =  getCuisine(json_decode($data->cuisines));
                            $url = getLink($data->name);
                            $cat_name = "http://localhost/foodie/api/categories?category_id=" . $data->cat_id;
                            $catName = getData($cat_name);
                            $category_name = ($catName != null)? $catName[0]->category_name : "Quick Bites";
                            ?>
                          <div class="card  search-snippet-card     search-card  ">

                            <div class="content">
                              <div class="js-search-result-li even  status 1" >
                                <article class="search-result  ">

                                  <div class="pos-relative clearfix    ">
                                    <div class="row">
                                      <div class="col-s-6 col-m-4">
                                        <div class="search_left_featured clearfix">
                                          <a href="<?php echo $url; ?>" class="feat-img lazy" style="  background-image:url(<?php echo urldecode($image); ?>);background-repeat: repeat;" data-original="https://b.zmtcdn.com/data/pictures/1/18424811/b6df3089c68873d7f1653b89d843e383_featured_v2.jpg?fit=around%7C200%3A200&amp;crop=200%3A200%3B%2A%2C%2A">
                                          </a>
                                        </div>
                                      </div>
                                      <div class="col-s-16  col-m-12  pl0  ">
                                        <div class="row">
                                          <div class="col-s-12">
                                            <div class='res-snippet-small-establishment mt5' style='margin-bottom: 7px;'><?php echo $category_name; ?></div>

                                            <a class="result-title hover_feedback zred bold ln24   fontsize0 " href="<?php echo $url; ?>" title="bruciato food factory Restaurant, Airoli" data-result-type="ResCard_Name"><?php echo $data->name; ?>
                                    </a>
                                            <div class="clear"></div>

                                            <a class="ln24 search-page-text mr10 zblack search_result_subzone left" href="#" title="Restaurants in <?php echo $data->locality; ?>"><b><?php echo $data->locality; ?></b></a>

                                          </div>
                                          <div class="ta-right floating search_result_rating col-s-4 clearfix" style="line-height: 14px;">
                                            <div data-res-id="18424811" class="rating-popup rating-for-18424811 res-rating-nf right level-7 bold">
                                              <?php echo $data->aggregate_rating; ?>
                                            </div>
                                            <div class="clear mb5"></div>

                                            <!-- show the vote count only if there's a rating -->
                                            <span class="rating-votes-div-18424811 grey-text fontsize5"><?php echo $data->votes; ?> votes</span>


                                          </div>
                                        </div>

                                        <div class="row">
                                          <div style=" max-width:370px; " class="col-m-16 search-result-address grey-text nowrap ln22" title="<?php echo $data->locality_verbose; ?>"><?php echo $data->locality_verbose; ?></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>


                                  <div class="ui divider"></div>

                                  <div class="search-page-text clearfix row">
                                    <div class='clearfix'><span class='col-s-5 col-m-4 ttupper fontsize5 grey-text'>Cuisines: </span><span class='col-s-11 col-m-12 nowrap  pl0'><?php echo $cuisine; ?></span></div>

                                    <div class="res-cost clearfix"><span class="col-s-5 col-m-4 ttupper fontsize5 grey-text">Cost for two:</span><span class="col-s-11 col-m-12 pl0">₹<?php echo $data->average_cost_for_two; ?></span></div>

                                    <div class="res-timing clearfix" title="12 Noon to 11 PM (Mon, Wed, Thu, Fri, Sat, Sun), Closed (Tue)">
                                      <span class="col-s-5 col-m-4 ttupper   fontsize5  grey-text left">Hours:</span>
                                      <div class="col-s-11 col-m-12 pl0 search-grid-right-text ">
                                        12 Noon to 11 PM (Mon, Wed, Thu, Fri, Sat, Sun)...
                                      </div>
                                      <div class="clear"></div>
                                    </div>

                                    <!-- <div class="res-collections clearfix">
                                      <span class="col-s-5 col-m-4 ttupper   fontsize5  grey-text">Featured in: </span>
                                      <div class="col-s-11 col-m-12 pl0 search-grid-right-text "><a href="/<?php echo $c[0]->name; ?>/best-burger">Kickass burgers</a></div>
                                    </div> -->

                                  </div>
                                </article>
                              </div>
                            </div>

                            <div class="ui three item menu search-result-action mt0">
                              <a class="item result-menu" href="<?php echo $url; ?>" title="bruciato food factory Menu" data-result-type="ResCard_Menu">
            <span data-icon="&#xe04d;" class="zdark fontsize4 bold action_btn_icon">View Menu</span>
        </a>
                            </div>
                          </div>
                          <?php
                        endforeach; ?>

                          <!-- END SHOWING SEARCH RESULTS -->

                        </div>
                      </div>



            </div>
          </div>
        </div>
      </div>
      <div class="clear ieclear"></div>
  </section>
</body>

</html>
