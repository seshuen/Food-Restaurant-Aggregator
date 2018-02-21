<?php
// select * from restaurantl3 inner join menu on restaurantl3.id = menu.rest_id inner join reviews on restaurantl3.id = reviews.rest_id

require_once 'api/_class/connection.php';

$c = new Connection;
$con = $c->connect();


//
// $name = isset($_POST['name']) ? $_POST['name'] : null;

// Set the City
$url = isset($_GET['name']) ? $_GET['name'] : null;

$userid = isset($_SESSION['userid'])? $_SESSION['userid'] : "zomato://u/44919313";

function getData($url){
  // Get data
  $data =  file_get_contents($url);
  return json_decode($data);
}


function getCuisine($cuisines){
  return implode("," , $cuisines);
}


  $u = "http://localhost/foodie/api/restaurant?name=" .urlencode($url);
$restDetails = getData($u);

$uid = "http://localhost/foodie/api/users?user_id=" .$userid;
$user = getData($uid);


$menu_url = "http://localhost/foodie/api/menu?rest_id=" .$restDetails[0]->id;
$menu = getData($menu_url);

$review_url = "http://localhost/foodie/api/reviews?rest_id=" .$restDetails[0]->id;
$reviews = getData($review_url);


// var_dump($restDetails);
// var_dump($menu);
// var_dump($reviews);

?>
<!DOCTYPE html>

<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
  <meta charset="utf-8" />
  <meta content="origin" name="referrer" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title></title>
  <meta name="description" content="" />
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
          <div id="login-navigation" class="login__container right">




    <div class="header-link">
    <div class="ui button header-icon-button cursor-pointer clearfix top right pointing dropdown mr0" tabindex="0">

        <div class="floating ui red mini label hidden" id="notifications-count"></div>

        <div class="ui left inline header-icon-menu header-icon-profile mr5">
            <img class="ui avatar image mr0 mini" data-original="https://b.zmtcdn.com/data/user_profile_pictures/355/69cfc7f47ee038e4a2711da73c529355.jpg?fit=around%7C100%3A100&amp;crop=100%3A100%3B%2A%2C%2A" src="https://b.zmtcdn.com/data/user_profile_pictures/355/69cfc7f47ee038e4a2711da73c529355.jpg?fit=around%7C100%3A100&amp;crop=100%3A100%3B%2A%2C%2A" alt="Seshu" style="display: inline-block;">
        </div>
        <div class="vertical menu" style="width: 200px; right:0; left:initial; margin:8px 0 0;" tabindex="-1">

            <a href="https://www.zomato.com/users/seshu-en-29292506" class="item">
                Profile
            </a>

            <a href="https://www.zomato.com/notifications" class="item">
                <span class="mr10">
                  Notifications
                </span>
                <div class="ui mini label grey" id="dropdown-notifications-count">0</div>
            </a>


            <a href="https://www.zomato.com/users/seshu-en-29292506/bookmarks" class="item">
                Bookmarks
            </a>

            <a href="https://www.zomato.com/users/seshu-en-29292506/reviews" class="item">
                Reviews
            </a>

            <a href="https://www.zomato.com/users/seshu-en-29292506/network" class="item">
                Network
            </a>

            <a href="https://www.zomato.com/invite" class="item">
                Find friends
            </a>

            <a href="https://www.zomato.com/users/seshu-en-29292506/edit" class="item">
                Settings
            </a>













            <div class="ui divider mt0 mb0"></div>
            <a id="logout" href="https://www.zomato.com/logout?noReturnOnLogout=FALSE&amp;ctoken=06c39089e0db1f8f32731df72c905614" class="item">Log out</a>
        </div>

        <span class="username right ml0">
        Seshu
        </span>

    </div>
</div>


                        </div>
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
  <div id="resp-search-container" class="search-box-area"></div>
  <div class="container" id="mainframe">
      <div class="wrapper mtop">
          <div class="row">


              <div class="res-info-left col-l-16">
                  <div class="ui segment res-header-overlay vr" style="padding:0; ">
                      <div class="" >
                          <div class="">
                              <div class="row pos-relative">
                                  <div class=" full_obp  col-s-16 clearfix">
                                      <div id="progressive_image" class="mb0 ui segment o2-tab-res wrapper progressive_img hero--restaurant" style="background-image : url('<?php echo urldecode($restDetails[0]->featured_image); ?>'); background-size: cover!important;background-position: center center;background-repeat: no-repeat; overflow:visible;border: none;box-shadow:none; height: 299px; background-color: #fafafa;">
                                                                                      <div class="progressive_img_loaded"></div>

                                          <div class="col-l-12" style="z-index: 1;">
                                              <div class="row res-disclaimer">
                                                                                                                                                                                        <div class="clearfix">
                                                      <div class="resbox__header">



                                                                                                              </div>
                                                  </div>
                                              </div>
                                          </div>
                                                                                      <div class="pos-absolute pl0 res-images-stack mb15 mr15">

                                       </div>
                                                                                                                                                              </div>
                                  </div>
                              </div>
                          </div>
                          <div class="res-header-overlay brbot" >
                                                          <div class="row ">
                                  <div class="col-l-12">
                                      <h1 class="res-name left mb0" style="height: 75px;">
                                                                                  <a href="#" title="<?php echo $restDetails[0]->name; ?>"
                                              style="font-size: 120%" class="ui large header left">
                                              <?php echo $restDetails[0]->name; ?></a>
                                      </h1>
                                      <div class="mb5 pt5 clear">
                                                                                              <a href="#" class="left grey-text fontsize3">
                                                  <?php echo $restDetails[0]->locality; ?>                                           </a>
                                                                                                                                  <span class="middot grey-text">&nbsp;&nbsp;&middot;&nbsp;&nbsp;</span>
                                              <span class="res-info-estabs grey-text fontsize3">
                                                  Casual Dining                                      </span>

                                      </div>

                                                                          <div class="clear"></div>
                                  </div>
                                  <div class="col-l-4 tac left">
                                      <div class="right">

                                                                                      <div class="right rating-info rrw-container rrw-container-44008">

                                                                                                      <div class="res-rating pos-relative clearfix mb5">
                                                          <div tabindex="0" aria-label="Rated" data-res-id="44008" class="rating-for-44008 rating-div rrw-aggregate level-6">
                                                              <?php echo $restDetails[0]->aggregate_rating; ?><span>/5</span>                                                        </div>
                                                      </div>
                                                      <span class="mt2 mb0 rating-votes-div rrw-votes grey-text fontsize5 ta-right" tabindex="0" aria-label="<?php echo $restDetails[0]->votes; ?>  votes">
                                                          <span itemprop='ratingCount'><?php echo $restDetails[0]->votes; ?></span>  votes</span>                                                    </span>
      												<span class="grey-text middot hidden">&middot;</span>
                                                                                                                                                  </div>
                                                                              </div>
                                  </div>
                              </div>
                                                                              </div>
                                                                      </div>
                                                      </div>
                      </div>
                  </div>
      <div class="ui res-tabs-o clearfix">
          <div class="respageMenuContainer">
              <div class="ui removeMenuBorder respageMenu large menu res-tabs-inner mb0">
                                  <a class="item respageMenu-item restaurant-tab-item-jumbo-track active" href="#" data-tab_type="info" data-current_tab="/info">
                      <span class="fontsize2">
                          Overview                    </span>
                  </a>
                                                                      <a class="item respageMenu-item restaurant-tab-item-jumbo-track "  href="#" data-tab_type="menu" data-current_tab="/info">
                          <span class="fontsize2">
                              Menu                        </span>
                      </a>
                                                                      <a class="item respageMenu-item restaurant-tab-item-jumbo-track " href="#" data-tab_type="reviews" data-current_tab="/info">
                          <span class="fontsize2">
                              Reviews (<?php echo $restDetails[0]->votes; ?>)                        </span>
                      </a>

                                  <div class="nav_bar_arrow nav_bar_arrow_left ml11 hidden"><i class="angle left icon zred"></i></div>
                  <div class="nav_bar_arrow nav_bar_arrow_right mr11 hidden"><i class="angle right icon zred"></i></div>
              </div>
          </div>
          <div class="clear"></div>
      </div>
      <div class="ui segments  mbot">
              <div class="row ui segment">
                  <div class="col-l-1by3    pl0 pr20">
                      <div class="mbot">
                          <div id="resinfo-phone" title="Zaffran, Lower Parel phone number" class="res-main-phone p-relative phone-details clearfix">
                  <div class="phone" id="phoneNoString">
                          <h2 class="mb5" tabindex="0" role="heading" aria-label="Phone number" >Phone number</h2>
              <span class="tel left res-tel">
                  <span class='fontsize2 bold zgreen'><span tabindex="0" aria-label="022 30151879" class="tel">022 30151879</span></span><br />            </span>

                      </div>

      </div>
      <span class="mb5 res-main-phone-reservation">
          <span class=" grey-text" title="Table reservations at <?php echo $restDetails[0]->name; ?>">
              Table booking recommended        </span>
      </span>
      <div class="clear"></div>

                      </div>
                      <div class="mbot">
                              <div class="res-info-group clearfix">
          <h2 tabindex="0" class="mt0 mb5" >Cuisines</h2>
          <div class="res-info-cuisines clearfix" > <?php echo implode(" , ",json_decode($restDetails[0]->cuisines)); ?> </div>    </div>
                          </div>

                      <div class="mbot mtop">
                                      <div class="res-info-group clearfix">
                  <div class="res-info-detail">
                      <span class="hdn"><?php echo $restDetails[0]->name; ?>, <?php echo $restDetails[0]->locality; ?></span>
                      <div tabindex="0">
                          <h2 class="left mt0 mb5">Average Cost&nbsp;</h2>
                                                      <div tabindex="0" aria-label="The cost for two is computed as follows: Average of 2 mid ranged Appetizers + 2 Mains + 2 Beverages + 1 Dessert. The actual cost you incur at a restaurant might change depending on your appetite, or with changes in restaurant menu prices. This assumes no use of the bar facility, except for places in the &quot;Go out for drinks&quot; section." class="tooltip-w left" title="The cost for two is computed as follows: Average of 2 mid ranged Appetizers + 2 Mains + 2 Beverages + 1 Dessert. The actual cost you incur at a restaurant might change depending on your appetite, or with changes in restaurant menu prices. This assumes no use of the bar facility, except for places in the &quot;Go out for drinks&quot; section."><span class="res-info-detail-icon" data-icon="|"></span></div>
                                                  <div class="clear"></div>
                      </div>

                                              <span tabindex="0" >₹<?php echo $restDetails[0]->average_cost_for_two; ?> for two people (approx.)&amp;&nbsp;
                                              </span><div class="grey-text fontsize5 subtext">Exclusive of applicable taxes and charges, if any</div></span>


                                              <div class="mt5">

                                                                  <div tabindex="0" class="res-info-cft-text fontsize5">
                                          <span class="res-info-payment res-info-icon"></span>
                                          <span itemprop="paymentAccepted">Cash</span> and <span itemprop="paymentAccepted" title="Cards accepted at Zaffran">Cards accepted</span>                                    </div>
                                                      </div></div>

              </div>
                                  </div>


                  </div>
                  <div class="col-l-1by3   pl20 pr20">
                      <div class="mbot">
                                      <div class="res-info-group clearfix">
                  <div class="res-info-detail">
                          <div tabindex="0" class="s-title hdn">
                              <div class="left mr10">Opening hours</div>
                                                              <span class="res-timings-toggle is-closed" id="res-timings-toggle">(See more +)</span>
                                                          <div class="clear"></div>
                          </div>
                          <div class="res-info-timings">
                              <div class="clearfix" tabindex="0"><h2 class="mt0 mb5 inlineblock">Opening hours</h2>&nbsp;&middot;&nbsp;<div class="medium">Today&nbsp;&nbsp;12 Noon to 12 Midnight</div></div>                        </div>
                                                                  </div>
              </div>
                              </div>
                                              <div class="mb5">
                              <h2 tabindex="0" aria-label="Address">
                                  Address                            </h2>
                          </div>
                          <div class="mbot0">

      <div class="borderless res-main-address">
          <div class="resinfo-icon">
              <span><?php echo $restDetails[0]->address; ?></span>        </div>
      </div> </div>

                  </div>
                  <div class="col-l-1by3  pl20 pr20">
                                          <div class="pbot0 res-info-group ">


  </div>                            <div class="mbot0  ptop0">
                                  <div class="resbox__main--row res-info-group clearfix" role="group"><h3 class="mb5" tabindex="0" aria-label="Collections" >Featured in Collection</h3><div class="ln24"> <span class="res_collection_span" aria-label="Featured in Arabian nights Collection" tabindex="0" class="res-page-collection-text">
              <a class="zred" aria-label="Arabian nights Collection" href="/mumbai/arabian-nights?ref=rescoll">Arabian nights</a></span></div></div>                            </div>

                                      </div>
              </div>

                      </div>





                  <div class="mbot">
                                  <div class="ui segment">
                          <div>
                                  <div class="res-info-group clearfix row">
                          <div class="col-l-1by3 col-s-8">
                  <h2 class="mb5" tabindex="0" >Recommended Dishes</h2>
                  <div tabindex="0" class="res-info-dishes-text order-dishes">
                      Zaffran Signature Butter Chicken, Murg Banjara Kabab, Murg Malai Tikka                </div>
              </div>

                              </div>
                              </div>

                                      </div>
                              </div>


      <div class="res-middle-area " id="tabtop">
                                  <div class="res-detail-review-container" id="reviews-preview">
                      <div class="resbox-review-form mbot"><div class="ui segment">
      <div role="group" class="res-my-review-container no-review" id="my-reviews-container">
          <div class="filler-area hom">
                      <div class="row clearfix mbot0">
                        <?php $rev_url = "http://localhost/foodie/api/getOneReview?rest_id=".$restDetails[0]->id ."&user_id=".$userid;
                        $rev = getData($rev_url);
                        $edit = (sizeof($rev) > 0)? "Edit" : "Write";
                        ?>
                  <div class="col-l-8">
                      <h2 tabindex="0"><?php echo $edit; ?> a Review</h2>
                  </div>
              </div>
              <div class="clearfix mb5">
                  <div class="res-reviews-container  review-form-container" data-fb_publish ="off" data-res_id="" data-snippet="restaurant-review" data-is-res-page-review="true" data-is-quick-review="true">
                      <div class="quickreview resbox-quickreview">
                          <div id="quickreview-container" class="quickreview__container js-closed clearfix">
                              <div id="js-quickreview-trigger" class="js-closed">
                                <form class="review" action="restaurant?name=<?php echo $url; ?>" method="post">
                                  <input type="hidden" id="user_id" name="user_id" value="<?php echo $userid; ?>">
                                  <input type="hidden" id="rest_id" name="rest_id" value="<?php echo $restDetails[0]->id; ?>">
                                  <?php
                                  if(sizeof($rev) > 0){
                                    ?>
                                    <textarea id="review_text" name="review_text" rows="5" cols="50"><?php echo $rev[0]->review_text; ?></textarea>
                                    <input type="number"  id="rating" step="0.5" min="0" max="5" name="rating" value="<?php echo $rev[0]->rating; ?>">

                                    <?php
                                  }
                                  else{
                                  ?>
                                  <textarea id="review_text" name="review_text" placeholder="Tip: A great review covers food, service, and ambiance. Got recommendations for your favorite dishes and drinks, or something everyone should try here? Include that too! And remember, your review needs to be at least 140 characters long :)" value="" rows="5" cols="50"></textarea>
                                  <input type="number"  id="rating" step="0.5" min="0" max="5" name="rating" value="">
                                <?php } ?>
                                  <input type="submit" class="review_submit_button ui button green" style="margin-top: 14px;" name="submit" id="submit" value="Add Review">
                                </form>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
                                      </div>
      </div>
  </div>
  </div>                    <div class="res-review-tab-content-container">
                                              <div class="res-review-tab-content activity-tab active" >
                              <div class="activity-feed-container">
                                  <div id="ipadding-reviews-box" class=" ipadding p-relative reviews res-review-form-container review_message_container">
  <div class="zs-load-more-container" id="reviews-container" data-filter="reviews-top">

      <div class="notifications-content">

                          <div class="clearfix reviews-subhead  pt15 ui segments white-bg mbi">
                  <div class="clearfix reviews-subhead-sort">

                                          <h2 id="quick-review-form" class="mb0 pl15">
                          <a class="fontsize2" href="#">
                              Reviews                        </a>
                      </h2>
                                          <div class="clear"></div>

                  </div>
              </div>

          <div class="res-reviews-container">
            <div class="my-rev-cont">
            <div class="clear"></div>
          </div></div>
          <?php foreach($reviews as $review): ?>
          <div class="res-reviews-container res-reviews-area">
      <div class="  ui segments res-review-body res-review clearfix js-activity-root mbti   item-to-hide-parent stupendousact" data-review_id="32694718" data-snippet="restaurant-review" data-res_id="44008">
          <div class="ui segment clearfix  br0 ">

              <div class="ui warning message error-message-highlight review-message hidden mbot"></div>

                          <div class="ui item clearfix ">
                                  <div class="item">
                      <div class="clearfix  mb10 ">
                          <div class="res-large-snippet ui horizontal list col-s-16  ">

    <div class="item col-s-16">
      <a href="#">
              <img class="ui avatar image left user-pic-lazy tiny" alt="<?php echo $review->name; ?>" src="<?php echo urldecode($review->profile_image); ?>"/>
            </a>
      <div class="content col-l-11 large-snippet ml5 mt5">

        <div class="header nowrap ui left">
                    <a href="#" data-entity_id="33215" >
              <?php echo $review->name; ?>
            </a>

        </div>
                  <div class="clear"></div>


          <div class="clear"></div>

                                <div class="zs-follow-btn-container usr-page-follow-btn clear mt2" data-entity-type="USER" data-user-id="33215" data-is-followed="">
                  <a role="button" aria-label="Follow" class="social-button follow-social cgrey ui basic large label ui-label-bb zs-follow-user-button">
                    <?php echo $review->foodie_level; ?>
                  </a>
              </div>

                        </div>

    </div>
  </div>

                      </div>
                  </div>
                                  <div class="fs12px pbot0 clearfix">
                      <a class="grey-text" href="#">
                          <time datetime="2017-12-08 19:48:40"><?php echo $review->review_time_friendly; ?></time>
                      </a>
                  </div>
              </div>

                          <div tabindex="0" class="rev-text mbot0 " style="line-height: 20px;">
                  <div aria-label="Rated <?php echo $review->rating; ?>" title="Legendary" class="ttupper fs12px left bold zdhl2 tooltip icon-font-level-9">Rated <?php echo $review->rating; ?> :</div>&nbsp;
                                   <?php echo urldecode($review->review_text); ?>
                                                  <div class="clear"></div>
              </div>

      </div>
  </div>
                                  </div>
                                <?php endforeach; ?>
      </div>
      <div class="clear"></div>
  </div>


  </div>                            </div>
                         </div>
                      </div>
                  </div>
                      <div class="clear"></div>
      </div>
      </div>




  </div>
  </div>

    <?php

    if(isset($_POST['submit'])){

      $user_id = $_POST['user_id'];
      $review_text = $con->escape($_POST['review_text']);
      $rest_id = (int) $_POST['rest_id'];
      $rating = $_POST['rating'];

      $data = array(
        "review_text" => $review_text,
        "rating" => $rating,
        "review_time_friendly" => "0 minutes ago",
        "rating_text" => "",
        "timestamp" => time(),
        "likes" => 0,
        "user_id" => $user_id,
        "rest_id" => $rest_id
      );

      // var_dump($data);

      // echo gmdate('r', $epoch);

      $con->startTransaction();
      $updateColumns = Array ("review_text", "rating", "timestamp");
      $lastInsertId = "id";
      $con->onDuplicate($updateColumns, $lastInsertId);

      if(!$con->insert('reviews', $data)){
        $con->rollback();
      }else{
         $con->commit();
         echo '<meta http-equiv="refresh" content="0">';
        // header("location:http://localhost/foodie/restaurant?name=".$url);
      }

    }
    ?>
  </body>
</html>
