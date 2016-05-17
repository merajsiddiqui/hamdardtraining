<?php

// initialize seo
include("seo.php");

$seo = new SEO(array(
    "title" => "Sarvodya Furnishers",
    "keywords" => "Divine, Online, IT Solutions, Technologies, Internet,  Computer Rental, Wholsale IT purchases, Install Server, " ,
    "description" => "Divine Technologies Hardware and IT solution for your business, Rent Computers or buy servers.",
    "author" => "Meraj Ahmad Siddiqui",
    "robots" => "INDEX,FOLLOW",
    "photo" => CDN . "images/logo.png"
));

Framework\Registry::set("seo", $seo);