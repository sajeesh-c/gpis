<?php require("lib/config.php"); ?>

<?php include("header.php"); ?>

    <div id="sticky_header" class="ui sticky">
        <header class="header  breadcrumb-present" id="header">
            <div class="wrapper">
                <?php include("search_form.php"); ?>
                <?php require("lib/handle_search.php"); ?>
            </div>
        </header>
    </div>
    <div id="map"></div>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', initialize('<?= $searchForm->getLatitude() ?>', '<?= $searchForm->getLongitudee() ?>'));
    </script>

<?php include("footer.php"); ?>