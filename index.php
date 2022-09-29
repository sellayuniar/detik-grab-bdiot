<?php
include('./simplehtmldom_1_9_1/simple_html_dom.php');
//method dari php native
$konten = file_get_contents('https://www.detik.com/');
//method dari PHP_simple_HTML_DOM
$html = str_get_html($konten);

echo "gambar: <br>";
//fetching url gambar ke halaman web
$images = array();
$i = 0;
    foreach($html->find('img') as $img) {
        $images[$i]['image'] = $img->src;
        $i++;
    }

print_r($images);

        $json = json_encode($images);
        $file = fopen('detikData.json', 'w');
        fwrite($file, $json);
        fclose($file);
?>