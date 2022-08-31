<?php
require_once "vendor/autoload.php";
use Symfony\Component\DomCrawler\Image;
use Symfony\Component\DomCrawler\Crawler;
$httpClient = new \GuzzleHttp\Client();
 
$url = "https://greenweb.ir";
 
$html = file_get_contents($url);
//size
//  $fileSizeInBytes=filesize($html); 
// echo $fileSizeInBytes;
///response code
$response = $httpClient->get($url);
echo $response->getStatusCode();

$crawler = new Crawler($html);

 ///get link text
// $title = $crawler->filter('body a')->extract(['_text', 'href']){
//     return $node->text();
// });

echo "<table>";
echo "<tr><th>title</th><th>link</th></tr>";
foreach($crawler->filter('body a')->extract(['_text', 'href']) as $a) {
    echo "<tr><td>" . $a[0] . "</td><td>" . $a[1] . "</td></tr>";
}
echo "</table>";

// echo "<ul>";
// foreach($title as $t) {
//     echo "<li>$t</li>";
// }
// echo "</ul>";
///get video 
$p_count = $crawler->filter('video')->count();
echo("<hr>video");
echo($p_count);
echo("<hr>");
///get image src
$img_count = $crawler->filter('img')->count();
echo($img_count);
echo("<hr>img");
echo "<table>";
echo "<tr><th>title</th><th>link</th></tr>";
foreach($crawler->filter('body img')->extract(['_text', 'src']) as $a) {
    echo "<tr><td>" . $a[0] . "</td><td>" . $a[1] . "</td></tr>";
}
echo "</table>";
// $image = $crawler->filter('body img')->each(function(Crawler $node, $i){
//     return $node->image()->getUri();
// });
// echo "<ul>";
// foreach($image as $t) {
//     echo "<li>$t</li>";
// }
// echo "</ul>";

//get title head 
$titre = $crawler->filter('title')->each(function(Crawler $node, $i){
    return $node->text();
});
echo "<ul>";
foreach($titre as $t) {
    echo "<li>$t</li>";    
    echo strlen($t);
}
echo "</ul>";
//meta description
// $data = $crawler->filterXpath("//meta[@name='description']")->extract(array('content'));
$data=$crawler->filter('meta[name="description"]')->eq(0)->attr('content');
if ($data!=null){
    echo "yes";
}
//link rel="canonical
$data1=$crawler->filter('link[rel="canonical"]')->eq(0)->attr('href');
if ($data1!=null){
    echo "yes";
}

?>