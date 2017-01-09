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
<div class="wrapper">
    <div class="recent_search_wrap">
        <h3>Recent Search history</h3>
        <?php $recentSearches = $searchDbHandle->getUsersSearchHistory(); ?>
        <table border="1px">
            <tr>
                <td><strong>Search Word</strong></td>
                <td><strong>Lat</strong></td>
                <td><strong>lon</strong></td>
                <td><strong>Search count</strong></td>
            </tr>
            <?php foreach ($recentSearches as $item): ?>
                <tr>
                    <td><?= $item['search_words'] ?></td>
                    <td><?= $item['latitude'] ?></td>
                    <td><?= $item['longitude'] ?></td>
                    <td><?= $item['search_count'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php include("footer.php"); ?>
