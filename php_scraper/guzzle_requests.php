<?php
require_once "vendor/autoload.php";

use Symfony\Component\DomCrawler\Image;
use Symfony\Component\DomCrawler\Crawler;
?>

<form method="get" action="guzzle_requests.php">
    <label> site adrress </label><br><input type="text" name="site_adrress" size="50"><br>
    <input type="submit">
</form>

<?php
$httpClient = new \GuzzleHttp\Client();

$url =  $_GET["site_adrress"];
$html = file_get_contents($url);
$crawler = new Crawler($html);
//size
//  $fileSizeInBytes=filesize($html); 
// echo $fileSizeInBytes;
///response code
function get_response($url, $httpClient)
{
    $response = $httpClient->get($url);
    $res = $response->getStatusCode();
    return $res;
}

echo "Response_code" . get_response($url, $httpClient);
echo "<hr>";


function get_title($crawler)
{
    $titre = $crawler->filter('title')->each(function (Crawler $node, $i) {
        return $node->text();
    });
    echo "<ul>";
    foreach ($titre as $t) {
        echo "title" . "<li>$t</li>";
        echo "کاراکتر " . strlen($t);
        $title = $t;
        $title_character_count = strlen($t);
        if (strlen($t) > 60) {
            echo "غیرمجاز";
        } else {
            echo "مجاز";
        }
    }
    echo "</ul>";
}
//get title head 
get_title($crawler);
echo "<hr>";
//get link count
function get_link_count($crawler)
{
    $link_count = $crawler->filter('a')->count();
    return $link_count;
}

echo "link-count" . get_link_count($crawler);
echo ("<hr>");

///get link text
function get_link_text($crawler)
{
    $link_text = $crawler->filter('body a')->extract(['_text', 'href']);
    return $link_text;
}
echo "<table>";
echo "<tr><th>title-link</th><th>link</th></tr>";
foreach (get_link_text($crawler) as $a) {
    echo "<tr><td>" . $a[0] . "</td><td>" . $a[1] . "</td></tr>";
}
echo "</table>";
echo ("<hr>");

///get video 
function get_video($crawler)
{
    $video_count = $crawler->filter('video')->count();
    return $video_count;
}
echo "video-count" . get_video($crawler);
echo ("<hr>");
///get image src
function get_image_count($crawler)
{
    $img_count = $crawler->filter('img')->count();
    return $img_count;
}
echo "image-count" . get_image_count($crawler);
echo ("<hr>");

//meta description
function get_meta_description($crawler)
{
    $metadescription = $crawler->filter('meta[name="description"]')->eq(0)->attr('content');
    return $metadescription;
}

if (get_meta_description($crawler) != null) {
    echo get_meta_description($crawler);
    $x = get_meta_description($crawler);
    $meta_len = strlen($x);
    echo $meta_len;
    if ($meta_len > 150) {
        echo "غیرمجاز";
    } else {
        echo "مجاز";
    }
}
echo "<hr>";
//link rel="canonical
function get_canonycal($crawler){
    $canonycal = $crawler->filter('link[rel="canonical"]')->eq(0)->attr('href');
    return $canonycal;
}

if (get_canonycal($crawler)!== null) {
    echo "has canonycal";
}
function insert_intodb($url)
{      
    include('config/conn.php');
    
    if (!empty($url)) {
       
        mysqli_query($conn, "INSERT INTO `scraper`(`link`, `link_count`, `image_count`, `title_character_count`,`title`, `meta_character_count`, `meta`, `canonycal`, `response_code`, `video_count`) 
        VALUES (                                   '$url','$link_count','$img_count','$title_character_count','$title','$meta_len','$metadescription','$canonycal','$get_response($url, $httpClient)','$video_count')");
    }
}
insert_intodb($url);
