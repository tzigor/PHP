<?php
    $title = "My first title";
$date = date('l jS \of F Y h:i:s A');
$content = file_get_contents("site_3.html");
$content = str_replace("{{ title }}", $title, $content);
$content = str_replace("date", $date, $content);

echo $content;