<?php
require("../lib/config.php");
include('admin_class.php'); // Includes Login Script
$error = ''; // Variable To Store Error Message
$admin = new Gpis_Admin();
if($admin->isAllowed()){
    header("location: index.php");
}
if (isset($_POST['submit'])) {
    if(!$admin->loginAction()){
        $error="Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#" class=" webp webp-alpha webp-animation webp-lossless">
<head>
    <title>Manage Gpis</title>
    <link href="<?= SITE_DIR ?>/skin/css/admin_style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
    <div id="login">
        <h2>Admin Login Form</h2>
        <form action="" method="post">
            <label>UserName :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</div>
</body>
</html>
