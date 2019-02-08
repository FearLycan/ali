<?php
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "ali";

$connect = mysqli_connect($host, $user, $password, $dbname);

if (!$connect) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$map = '<?xml version="1.0" encoding="UTF-8"?>';
$map .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

$date = date("Y-m-d") . 'T18:00:15+00:00';

$map .= '<url>';
$map .= '<loc>https://aligonewild.com</loc>';
$map .= '<changefreq>daily</changefreq>';
$map .= '<lastmod>' . $date . '</lastmod>';
$map .= '<priority>1.00</priority>';
$map .= '</url>';

$map .= '<url>';
$map .= '<loc>https://aligonewild.com/contact</loc>';
$map .= '<lastmod>' . $date . '</lastmod>';
$map .= '<priority>0.5</priority>';
$map .= '</url>';

$map .= '<url>';
$map .= '<loc>https://aligonewild.com/categories</loc>';
$map .= '<lastmod>' . $date . '</lastmod>';
$map .= '<priority>0.9</priority>';
$map .= '</url>';

$map .= '<url>';
$map .= '<loc>https://aligonewild.com/rules</loc>';
$map .= '<lastmod>' . $date . '</lastmod>';
$map .= '<priority>0.5</priority>';
$map .= '</url>';

$sql = 'SELECT slug FROM category';
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($query)) {
    $map .= '<url>';
    $map .= '<loc>https://aligonewild.com/' . $row['slug'] . '</loc>';
    $map .= '<changefreq>monthly</changefreq>';
    $map .= '<lastmod>' . $date . '</lastmod>';
    $map .= '<priority>0.80</priority>';
    $map .= '</url>';
}

$sql = 'SELECT ali_product_id FROM product';
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($query)) {
    $map .= '<url>';
    $map .= '<loc>https://aligonewild.com/product/' . $row['ali_product_id'] . '</loc>';
    $map .= '<lastmod>' . $date . '</lastmod>';
    $map .= '<priority>0.50</priority>';
    $map .= '</url>';
}

$sql = 'SELECT slug FROM member';
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($query)) {
    $map .= '<url>';
    $map .= '<loc>https://aligonewild.com/member/' . $row['slug'] . '</loc>';
    $map .= '<lastmod>' . $date . '</lastmod>';
    $map .= '<priority>0.70</priority>';
    $map .= '</url>';
}

$sql = 'SELECT slug FROM country';
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($query)) {
    $map .= '<url>';
    $map .= '<loc>https://aligonewild.com/country/' . $row['slug'] . '</loc>';
    $map .= '<lastmod>' . $date . '</lastmod>';
    $map .= '<priority>0.50</priority>';
    $map .= '</url>';
}


$map .= '</urlset>';

mysqli_close($connect);


$file = fopen("../web/sitemap.xml", "w") or die("Unable to open file!");
fwrite($file, $map);
fclose($file);