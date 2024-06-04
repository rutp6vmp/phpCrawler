<?php
include("../simple_html_dom.php");
ini_set("user_agent","my_Application/2.5");
$url ='https://travel.ettoday.net/category/%E6%A1%83%E5%9C%92/';
$html=file_get_html($url);
$title = array();
$link = array();
$counter = 0; // 新增一個計數器
foreach($html->find('.box_0 a') as $e) // 修正這裡
{
    $counter++; // 每次迴圈都讓計數器加1
    if($counter >= 1 && $counter <=  6) { // 只有當計數器在3到6之間時，才抓取資料
        $title[]=$e->plaintext;
        $link[]=$e->href;
    }
}
echo "ETtoday旅遊雲—桃園<br>";
for ($i=0;$i<count($title);$i++){
 
    echo '<a href="'.$link[$i].'">'.$title[$i].'</a><br>'; // 使用 <a> 標籤來建立超連結

}
?>
