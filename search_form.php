<?php require("lib/form.php"); ?>
<form action="<?php echo $searchForm->getFormAction(); ?>" method="post" id="search_form">
    <input type="hidden" name="latitude" value="<?php echo $searchForm->getLatitude() ?>" id="latitude"/>
    <input type="hidden" name="longitude" value="<?php echo $searchForm->getLongitudee() ?>" id="longitude"/>

    <div id="search_main_container" class="full_search  ">
        <div id="search_bar_wrapper" class="search_bar search-zindex" role="form">

            <div class="flex-shrink-1 search-box plr0i ml5 mr5">
                <div id="keywords_container" class="col-s-16 pr0">
                    <div id="keywords_pretext">
                        <div class="k-pre-2  w100">
                            <span class="search-bar-icon mr5"><i class="search icon tiny"></i></span>
                            <label id="label_search_res" class="hdn">Search a place...</label>
                            <input id="keywords_input" class="discover-search"
                                   placeholder="Search a place..." value="<?php echo $searchForm->getSearchKeyword() ?>" name="search_words"
                                   autocomplete="on">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 plr0i">
                <div role="button" tabindex="0" id="search_button" class="left ui red button" onclick=" codeAddress();">Search</div>
            </div>
            <a class="recent_search" href="recent_search.php">Recent Searches</a>
            <div class="clear"></div>
        </div>

    </div>
</form>