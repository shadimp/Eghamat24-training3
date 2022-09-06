<?php
require_once "vendor/autoload.php";
 
use Symfony\Component\DomCrawler\Crawler;
 
$url = "https://artisansweb.net";
 
$html = file_get_contents($url);
 
$crawler = new Crawler($html);
 
$title = $crawler->filter('h3.greatwp-fp04-post-title a')->each(function(Crawler $node, $i){
    var_dump( $node->text());
});
 
// echo ("<ul>");
// foreach($title as $t) {
//     echo "<li>$t</li>";
// }
// echo ("</ul>");

?>