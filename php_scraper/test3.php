<?php
require_once "vendor/autoload.php";

use Symfony\Component\DomCrawler\Image;
use Symfony\Component\DomCrawler\Crawler;

$httpClient = new \GuzzleHttp\Client();

$url = "https://greenweb.ir";

$html = file_get_contents($url);
$crawler = new Crawler($html);

function get_response($urlin)
{
    $httpClient = new \GuzzleHttp\Client();
    $response = $httpClient->get($urlin);
    echo $response->getStatusCode();
}
function get_title($urlin)
{
    $htmlin = file_get_contents($urlin);
    $crawler = new Crawler($htmlin);
    $title = $crawler->filter('title')->each(function (Crawler $node, $i) {
        return $node->text();
    });
    foreach ($title as $t) {
        echo($t);
        echo strlen($t);
    }
}

echo "<table>";
echo "<tr><th>title</th><th>link</th></tr>";
foreach ($crawler->filter('body a')->extract(['_text', 'href']) as $a) {
    // echo "<hr>";
    echo "<tr><td>" . $a[0] . "</td><td>" . trim($a[1]) . "</td></tr>";
    // $urlin = trim($a[1]);
    // get_title($urlin);
    // if ($urlin !==  null) {
    //     try {
    //         // get_response($urlin);
    //         get_title($urlin);
    //     }
    //     //catch exception
    //     catch (Exception $e) {
    //         // echo 'Message: ' . $e->getMessage();
    //     }
    // }
}
echo "</table>";
