<?php
include("../simple_html_dom.php");
ini_set("user_agent","my_Application/2.5");
$url ='https://nimishprabhu.com/';
$html=file_get_html($url);
$title = array();
$link = array(); // 修正這裡
foreach($html->find('.post-title a') as $e)
{
    $title[]=$e->plaintext;
    $link[]=$e->href;
}
for ($i=0;$i<count($title);$i++){ // 修正這裡
    echo $title[$i].'<br>';
    echo $link[$i].'<br>';    
    echo '<br>';
}
?>
