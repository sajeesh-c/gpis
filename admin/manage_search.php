<?php require("../lib/config.php"); ?>
<?php include('admin_class.php');
$admin = new Gpis_Admin();
$admin->_authenticate();?>
<?php include("../header.php"); ?>
<div id="sticky_header" class="ui sticky">
    <header class="header  breadcrumb-present" id="header">
        <div class="wrapper">
            <?php echo "Welcome ". $_SESSION['login_user'] ?>
            <?php require("../lib/handle_search.php"); ?>
        </div>
        <a href="logout.php">Log out</a>
    </header>
</div>
<?php //@todo admin session validation ?>
<?php include("actions.php"); ?>
<div class="wrapper">
    <div class="recent_search_wrap">
        <h3>Manage Search history</h3>
        <?php $recentSearches = $searchDbHandle->getUsersSearchHistory(); ?>
        <?php if (count($recentSearches) > 0): ?>
            <table border="1px">
                <tr>
                    <td><strong>Search Word</strong></td>
                    <td><strong>Lat</strong></td>
                    <td><strong>lon</strong></td>
                    <td><strong>Search count</strong></td>
                    <td>&nbsp;</td>
                </tr>
                <?php foreach ($recentSearches as $item): ?>
                    <tr>
                        <td><?= $item['search_words'] ?></td>
                        <td><?= $item['latitude'] ?></td>
                        <td><?= $item['longitude'] ?></td>
                        <td><?= $item['search_count'] ?></td>
                        <td>
                            <a href="<?= SITE_URL ?>admin/manage_search.php?action=delete&id=<?= $item['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>You don't have any search records</p>
        <?php endif; ?>
    </div>
</div>
<?php include("../footer.php"); ?>
