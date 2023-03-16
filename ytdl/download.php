<?php

if(isset($_POST['youtubeURL'])) {
    $url = $_POST['youtubeURL'];
    $download_url = "http://www.youtube-mp3.org/get?ab=128&video_id=" . get_youtube_id($url) . "&h=56f40cdad9c104b13a170a72f19a047d"; 
    header('Location: ' . $download_url);
 }

function get_youtube_id($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}

?>
