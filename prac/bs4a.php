<?php
include("../simple_html_dom.php");
ini_set("user_agent","my_Application/2,.5");
$url ='https://finance.ettoday.net/?from=pc_side_menu';
$html=file_get_html($url);
foreach($html->find('h3 a') as $e)
    echo($e->plaintext.'<br>');
?>