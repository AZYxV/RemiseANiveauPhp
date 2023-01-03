<?php
if($_GET['page'] == 'page'){
    include 'pages/page.php';
} elseif ($_GET['page'] == 'header') {
    include 'pages/header.php';
} elseif ($_GET['page'] == 'footer') {
    include 'pages/footer.php';
} else {
    include 'pages/notFound.php';
}
