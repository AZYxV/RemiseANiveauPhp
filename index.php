<?php
if($_GET['page'] == 'page'){
    include 'page.php';
} elseif ($_GET['page'] == 'header') {
    include 'header.php';
} elseif ($_GET['page'] == 'footer') {
    include 'footer.php';
} else {
    include 'notFound.php';
}
