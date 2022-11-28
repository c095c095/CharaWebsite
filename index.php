<?php

session_start();
date_default_timezone_set("Asia/Bangkok");
error_reporting(0);

// OPEN PHP ERROR;
// ini_set("display_errors", 1);
// ini_set("display_startup_errors", 1);
// error_reporting(E_ALL);

include("system/connect.php");
include("system/f_query.php");
include("system/f_utility.php");
include("system/link.php");

$page = (@$_GET['page'] != "") ? $_GET['page'] : "home";
$u_id = (@$_SESSION['u_id'] != "") ? $_SESSION['u_id'] : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title[$page] ?> - โภชชรา</title>
    <link rel="icon" href="assets/images/icon.png">
    <link rel="stylesheet" href="assets/icon.css">
    <link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/jquery.min.js"></script>
</head>
<body class="bg-light">
    <?php

    include("navbar.php");
    include($link[$page]);
    
    $sql_viewweb = "INSERT INTO view_web VALUES(NULL, '$u_id', CURRENT_TIMESTAMP)";
    qry($sql_viewweb);

    include("footer.php");

    ?>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>