<?php
$searchPages = filter_input(INPUT_GET,'page',FILTER_DEFAULT);
if($searchPages == 'page'){
    include 'pages/page.php';
}  elseif ($searchPages == 'contact') {
    include 'pages/contact.php';
}  elseif ($searchPages == 'header') {
    include 'pages/header.php';
}  elseif ($searchPages == 'footer') {
    include 'pages/footer.php';
}  else {
    include 'pages/notFound.php';
}
