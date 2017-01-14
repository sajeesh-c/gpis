<?php require("lib/config.php"); ?>
<?php $isHome=true; ?>
<?php include("header.php"); ?>
    <div class="zimagery">
        <div class="zimagery-overlay">
            <div class="h-city-main p-relative" id="zimagery-container">
                <div class="logo--home"></div>
                <h1 class="h-city-home-title">Find your destinations </h1>
                <div class="wrapper">
                    <?php include("search_form.php"); ?>
                </div>
            </div>
        </div> <!-- zimagery-overlay -->
    </div> <!-- zimagery -->
<?php include("footer.php"); ?>