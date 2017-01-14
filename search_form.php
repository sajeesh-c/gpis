<?php require("lib/form.php"); ?>
<form action="<?php echo $searchForm->getFormAction(); ?>" method="post" id="search_form">
    <input type="hidden" name="latitude" value="<?php echo $searchForm->getLatitude() ?>" id="latitude"/>
    <input type="hidden" name="longitude" value="<?php echo $searchForm->getLongitudee() ?>" id="longitude"/>
    <input type="hidden" name="customsearch" value="<?php echo $searchForm->getCustomsearchOption() ?>"
           id="customsearch"/>

    <div id="search_main_container" class="full_search  ">
        <div id="search_bar_wrapper" class="search_bar search-zindex" role="form">
            <?php if (!isset($isHome)) : ?>
                <div class="search_type flex-shrink-0">
                    <div id="location_contianer">
                        <div id="location_pretext">
                            <div class="l-pre-1" aria-label="Suggested searches...">
                                <span class="location_placeholder ml5">
                                        <i class="location arrow icon tiny pr2"></i>
                                </span>
                                    <span id="location_input_sp" class="location_input_sp mr5"><?php echo $searchForm->getCustomsearchOption() ?></span>
                                    <span class="right location-dropdown"><i class="ui icon black tiny caret down left"></i></span>
                            </div>

                        </div>

                        <!-- keywords dro down starts   -->
                        <div id="explore-keywords-dropdown" class="homepage ">
                            <div id="keywords-dd" style="overflow: hidden;">
                                <ul id="keywords-by" role="listbox">
                                </ul>
                            </div>
                            <div class="keyword-search-start start-steps clearfix"
                                 style="overflow: hidden; display: none;">

                                <ul id="explore-by">
                                    <li class="label ttupper">Suggested Searches</li>


                                    <li class="item" >
                                        <div class="start-step-label">
                                            <span>Food</span>
                                        </div>
                                    </li>

                                    <li class="item" >
                                        <div class="start-step-label">
                                            <span>Hospital</span>
                                        </div>
                                    </li>

                                    <li class="item" >
                                        <div class="start-step-label">
                                            <span>Restaurant</span>
                                        </div>
                                    </li>

                                    <li class="item" >
                                        <div class="start-step-label">
                                            <span>School</span>
                                        </div>
                                    </li>

                                    <li class="item" ..>
                                        <div class="start-step-label">
                                            <span>Temple</span>
                                        </div>
                                    </li>

                                    <li class="item" >
                                        <div class="start-step-label">
                                            <span>Airport</span>
                                        </div>
                                    </li>

                                    <li class="item" >
                                        <div class="start-step-label">
                                            <span>Railway</span>
                                        </div>
                                    </li>

                                    <li class="item" >
                                        <div class="start-step-label">
                                            <span>Church</span>
                                        </div>
                                    </li>

                                    <li class="item" >
                                        <div class="start-step-label">
                                            <span>Petrol pump</span>
                                        </div>
                                    </li>

                                    <li class="item" >
                                        <div class="start-step-label">
                                            <span>Museum</span>
                                        </div>
                                    </li>

                                    <li class="item">
                                        <div class="start-step-label">
                                            <span>Zoo</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <!-- Location dro down ends   -->
                    </div>
                </div>
            <?php endif; ?>
            <div class="flex-shrink-1 search-box plr0i ml5 mr5">
                <div id="keywords_container" class="col-s-16 pr0">
                    <div id="keywords_pretext">
                        <div class="k-pre-2  w100">
                            <span class="search-bar-icon mr5"><i class="search icon tiny"></i></span>
                            <label id="label_search_res" class="hdn">Search a place...</label>
                            <input id="keywords_input" class="discover-search"
                                   placeholder="Search a place..." value="<?php echo $searchForm->getSearchKeyword() ?>"
                                   name="search_words"
                                   autocomplete="on">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 plr0i">
                <div role="button" tabindex="0" id="search_button" class="left ui red button" onclick=" codeAddress();">
                    Search
                </div>
            </div>
            <a class="recent_search" href="recent_search.php">Recent Searches</a>
            <div class="clear"></div>
        </div>

    </div>
</form>
<script type="text/javascript">
    var searchType = '<?php echo $searchForm->getCustomsearchOption() ?>';
</script>