<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#" class=" webp webp-alpha webp-animation webp-lossless">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta content="origin" name="referrer">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="preconnect" href="https://b.zmtcdn.com/">


    <title>Searched place info</title>
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

    <script type="text/javascript" charset="utf-8"
            src="./skin/js/PlaceSearch.js"></script>


</head>
<body class=" is-responsive en">



<div class="ghboxcontainer" style="visibility: hidden; display: none;">
    <div id="ghbox"></div>
</div>


<div id="sticky_header" class="ui sticky">
    <header class="header  breadcrumb-present" id="header">
        <div class="mini-header">
            <div class="wrapper">
                <div class="row mini-header__breadcrumb">
                    <div class="col-l-10 col-m-10">
                        <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        </ol>
                    </div>
                    <div class="col-l-6 col-m-6 ta-right mini-header__sublinks">
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <form action="./PlaceInfo.php" method="post" id="search_form">
                <input type="hidden" name="latitude" value="<?php echo isset( $_POST['latitude'])?$_POST['latitude']:'' ?>" id="latitude"/>
                <input type="hidden" name="longitude" value="<?php echo isset( $_POST['longitude'])?$_POST['longitude']:'' ?>" id="longitude"/>
            <div class="row">
                <div class="col-l-2 col-s-16 header--logo-container">

                    <a href="javascript:void(0)" data-icon=""
                       class="header-icon search_btn search-bar-reveal search-required"></a>
                </div>
                <div class="col-l-16 header--search-container">
                    <div class="row clearfix">
                        <div class="alpha flex-shrink-1">
                            <div class="header__search-bar">

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
                                                            <div class="keyword_div">Search a place...
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="k-pre-2  w100">
                                                        <span class="search-bar-icon mr5"><i
                                                                class="search icon tiny"></i></span>
                                                        <label id="label_search_res" class="hdn">Find your destinations...</label>
                                                        <input name="search_words" id="keywords_input"
                                                               class="discover-search"
                                                               placeholder="Find your destinations..."
                                                               value="<?php echo isset( $_POST['search_words'])?$_POST['search_words']:'' ?>" autocomplete="off">
                                                    </div>
                                                </div>
                                                <!-- keywords dro down starts   -->
                                                <div id="explore-keywords-dropdown" class=" ">
                                                    <div id="keywords-dd">
                                                        <ul id="keywords-by" role="listbox">
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- keywords dro down ends   -->
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 plr0i">
                                            <button type="button" id="search_button" class="left ui red button" name="search" onclick="codeAddress();">Search</button>

                                        </div>

                                        <div class="clear"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </header>
</div>

    <?php
    $data = $_POST;
    $lat = isset($data['latitude'])?$data['latitude']:'';
    $lon = isset($data['longitude'])?$data['longitude']:'';
    ?>
    <div id="map">
    </div>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', initialize('<?= $lat ?>','<?= $lon ?>'));
    </script>

<footer id="footer" class=" ">
    <div class="wrapper">
        <div class="clearfix row">
            <div class="clear"></div>

            <div class="clear"></div>

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
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <!-- end footer-links-container -->
            <div class="footer-bottom">
                <div tabindex="0" class="col-s-16 footer-msg">
                    <div class=" row ">Copyright © 2017. All rights reserved.
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