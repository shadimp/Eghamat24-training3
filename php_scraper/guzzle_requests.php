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


///response code
function get_response($url, $httpClient)
{
    $response = $httpClient->get($url);
    $res = $response->getStatusCode();
    return $res;
}
$rsp = get_response($url, $httpClient);
echo "Response_code" . $rsp;
echo "<hr>";

//get title
function get_title($crawler)
{
    return $crawler->filter('title')->each(function (Crawler $node, $i) {
        return $node->text();
    });
}
$t = get_title($crawler);
$title = $t[0];
echo $title;
$title_character_count = strlen($title);
echo $title_character_count;
if ($title_character_count > 60) {
    echo "غیرمجاز";
} else {
    echo "مجاز";
}

echo "<hr>";
//get link count
function get_link_count($crawler)
{
    $link_count = $crawler->filter('a')->count();
    return $link_count;
}
$link_count = get_link_count($crawler);
echo "link-count" . $link_count;
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
    //insert into array
    // $link_array[] = $a[1];
    // insert_links($a[1]);
    echo "<tr><td>" . $a[0] . "</td><td>" . $a[1] . "</td></tr>";
}
echo "</table>";
echo ("<hr>");

// var_dump($link_array);
///get video 
function get_video($crawler)
{
    return $crawler->filter('video')->count();
}
$video_count = get_video($crawler);
echo "video-count" . $video_count;
echo ("<hr>");
///get image src
$crawler->filter('img')->each(function ($node) {
    $src = $node->attr('src');
    // $src="'".$src."'";
    insert_links($src);
    // echo $src . '<br>';
});
// foreach ($crawler->filter('body img')->$node->attr(['src']) as $aimg) {
// echo $aimg[0];
//     // insert_links($aimg[1]);
// }
//
function get_image_count($crawler)
{
    return $crawler->filter('img')->count();
}
$img_count = get_image_count($crawler);
echo "image-count" . $img_count;
echo ("<hr>");

//meta description
function get_meta_description($crawler)
{
    return $crawler->filter('meta[name="description"]')->eq(0)->attr('content');
}

if (get_meta_description($crawler) != null) {
    echo get_meta_description($crawler);
    $metadescription = get_meta_description($crawler);
    $meta_len = strlen($metadescription);
    echo $meta_len;
    if ($meta_len > 150) {
        echo "غیرمجاز";
    } else {
        echo "مجاز";
    }
}
echo "<hr>";
//link rel="canonical
function get_canonycal($crawler)
{
    return $crawler->filter('link[rel="canonical"]')->eq(0)->attr('href');
}
$canonycal = get_canonycal($crawler);
if (get_canonycal($crawler) !== null) {
    echo "has canonycal";
}
//insert into db

function insert_links($alink)
{
    include('config/conn.php');

    // if (!empty($a)) {
    mysqli_query($conn, "INSERT INTO `links`(`link`)VALUES ('$alink')");
    // }
}
// insert_intodb($url, $link_count, $img_count, $title_character_count, $title, $meta_len, $metadescription, $canonycal, $rsp, $video_count);
// function insert_intodb($url, $link_count, $img_count, $title_character_count, $title, $meta_len, $metadescription, $canonycal, $rsp, $video_count)
// {
//     include('config/conn.php');
//     if (!empty($url)) {

//         mysqli_query($conn, "INSERT INTO `links`(`link`)  VALUES ('$url')");
//     }
// }
// insert_intodb($url, $link_count, $img_count, $title_character_count, $title, $meta_len, $metadescription, $canonycal, $rsp, $video_count);
