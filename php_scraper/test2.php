<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector;

$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get('https://amazon.com');
$htmlString = (string) $response->getBody(true)->getContents();
echo $response->getStatusCode();

$crawler = new Crawler($htmlString);
$title = $crawler->filter('h3.greatwp-fp04-post-title a')->each(function(Crawler $node, $i){
    echo $node->text();
    echo("<hr>");
});
$links_count = $crawler->filter('a')->count();
echo("<hr>");
echo($links_count);
$link = $crawler->filter('h3.greatwp-fp04-post-title a')->each(function(Crawler $node, $i){
    echo $node->link()->getUri();
    echo("<hr>");
});
$snippet = $crawler->filter('.greatwp-fp04-post-snippet p')->each(function(Crawler $node, $i){
    echo $node->text();
    echo("<hr>");
});
$image = $crawler->filter('.greatwp-fp04-post-thumbnail a img')->each(function(Crawler $node, $i){
     echo $node->image()->getUri();
     echo("<hr>");
});

