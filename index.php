<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#" class=" webp webp-alpha webp-animation webp-lossless">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Geographic Place Information System</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, initial-scale=1">
    <link rel="stylesheet" type="text/css"
          href="./skin/css/styles.css">
    <link rel="stylesheet" type="text/css"
          href="./skin/css/custom_styles.css">

    <script type="text/javascript" charset="utf-8"
            src="./skin/js/jquery.min.js"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCHwC_ODlgBttpOgXjWUxPsboHvxMEhfUE" >
    </script>

    <script type="text/javascript" charset="utf-8"
            src="./skin/js/Place_Autocomplete.js"></script>

</head>
<body class="start ct-present is-responsive en">


<script>dataLayer = [];</script>

<div class="ghboxcontainer" style="visibility: hidden; display: none;">
    <div id="ghbox"></div>
</div>


<div class="zimagery"
     style="background-image: url(./skin/images/earth-map.jpg);; background-size: cover;">
    <div class="zimagery-overlay" style="background: rgba(0,0,0,0.4);">
        <div id="sticky_header" class="ui sticky">
            <header class="header " id="header">

                <div class="wrapper">
                    <div class="row">

                        <div class="col-l-16 header--search-container">
                            <div class="row clearfix">
                                <div class="nav flex-shrink-0">
                                    <div class="right">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div id="resp-search-container" class="search-box-area"></div>

        <div class="h-city-main p-relative" id="zimagery-container">
            <div class="logo--home">
            </div>
            <h1 class="h-city-home-title">
                Find your destinations </h1>
            <div class="wrapper">
              <form action="./PlaceInfo.php" method="post" id="search_form">
                  <input type="hidden" name="latitude" value="" id="latitude"/>
                  <input type="hidden" name="longitude" value="" id="longitude"/>
                <div id="search_main_container" class="full_search  ">
                    <div id="search_bar_wrapper" class="search_bar search-zindex" role="form">

                        <div class="flex-shrink-1 search-box plr0i ml5 mr5">
                            <div id="keywords_container" class="col-s-16 pr0">
                                <div id="keywords_pretext">
                                    <div class="k-pre-1 hidden" style="overflow:hidden;">
                        <span class="search-bar-icon mr5">
                            <i class="search icon tiny"></i>
                        </span>

                                        <div class="keyword_placeholder nowrap">
                                            <div class="keyword_div">Search a place...</div>
                                        </div>
                                    </div>
                                    <div class="k-pre-2  w100">
                                        <span class="search-bar-icon mr5"><i class="search icon tiny"></i></span>
                                        <label id="label_search_res" class="hdn">Search a place...</label>
                                        <input id="keywords_input" class="discover-search"
                                               placeholder="Search a place..." value="" name="search_words"
                                               autocomplete="on">
                                    </div>
                                </div>
                                <!-- keywords dro down starts   -->
                                <div id="explore-keywords-dropdown" class="homepage ">
                                    <div id="keywords-dd">
                                        <ul id="keywords-by" role="listbox">
                                        </ul>
                                    </div>
                                    <div class="keyword-search-start start-steps clearfix">

                                        <ul id="no-results" class="hidden">
                                            <li class="item no-result-found">
                                                <a class="item">
                                                    <div class="keywords-dd-l">No results found</div>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                                <!-- keywords dro down ends   -->
                            </div>
                        </div>
                        <div class="flex-shrink-0 plr0i">
                            <div role="button" tabindex="0" id="search_button" class="left ui red button" onclick="codeAddress();">
                                Search
                            </div>

                        </div>

                        <div class="clear"></div>
                    </div>

                </div>
</form>
            </div>
        </div>

    </div> <!-- zimagery-overlay -->
</div> <!-- zimagery -->
<footer id="footer" class=" ">
    <div class="wrapper">
        <div class="clearfix row">

            <div class="col-m-16 col-s-16 last-footer-column footer-column">
                <h3 class="hidden" tabindex="0">Policies</h3>
                <div class="col-m-16 pleft0 pr0">
                    <ul class="footer-links--big">
                        <li>
                            <a href="">
                                Privacy
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Terms
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Code of Conduct
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Security
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Sitemap
                            </a>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <!-- end footer-links-container -->
            <div class="footer-bottom">
                <div tabindex="0" class="col-s-16 footer-msg">
                    <div class=" row ">Copyrights © 2017 - <a
                                href=""></a>. All rights reserved.
                    </div>
                </div>
                <div class="clear"></div>
                <!-- end wrapping_class -->
            </div>
            <!-- end footer-bottom -->
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</footer>
</body>
</html>