<?php
include("../simple_html_dom.php");
ini_set("user_agent","my_Application/2.5");
$url ='https://water.taiwanstat.com/';
$html=file_get_html($url);

$con = mysqli_connect("localhost","user01","password");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, "water");
mysqli_query($con,"SET NAMES 'utf8'"); //確保中文資料傳輸並寫入資料庫不亂碼

foreach($html->find('.volumn') as $i => $e)
{
    $name = $html->find('.name')[$i]->plaintext;
    $title = $e->plaintext;
    $wupdate = $html->find('.updateAt')[$i]->plaintext;
    $level = $html->find('.state')[$i]->plaintext;

    echo $name.'<br>';
    echo $title.'<br>';
    echo $wupdate.'<br>';
    echo $level.'<br>';
    echo '<hr>';

    // 將資料插入到資料庫中
    $sql="INSERT INTO waterdata (name, title , wupdate ,level ) VALUES ('$name', '$title', '$wupdate', '$level')";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
}

echo "成功新增一筆資料";
mysqli_close($con);
?>
