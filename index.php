<?php

function setTextToImage($angle, $x, $y, $text) {

    // Создание изображения
    // мы создаем его из файла nadja.jpg
    $im = imagecreatefromjpeg('nadja.jpg');
    // Создание цвета
    $color = imagecolorallocate($im, 255, 255, 255);
  
 
    //  $text = массив с текстом вида '20'=> 'апполон', '60'=>'Союз', '100'=>'Мир'
    // Замена пути к шрифту на пользовательский - иначе не прокатит
    $font = 'arial.ttf';

   //и перебор значений массива
    foreach ($text as $key => $val) {
        imagettftext($im, 20, $angle, $x, $key, $color, $font, $val);
    }
    return $im;
}


function setVSArrayToImage($image,$angle,  $text) {

    // Создание изображения
    // мы создаем его из файла nadja.jpg
    $im = imagecreatefromjpeg($image);
    // Создание цвета
    $color = imagecolorallocate($im, 255, 255, 255);
  
 
    //  $text = массив с текстом вида '20'=> 'апполон', '60'=>'Союз', '100'=>'Мир'
    // Замена пути к шрифту на пользовательский - иначе не прокатит
    $font = 'arial.ttf';

   //и перебор значений массива
    $i=1;
    foreach ($text as $key => $val) {
        imagettftext($im, 20, $angle, 0, $i*30, $color, $font, $key);
        imagettftext($im, 20, $angle, 500, $i*30, $color, $font, $val);
        $i++;
    }
    return $im;
}
// Тип содержимого
header('Content-Type: image/png');
$array_ = array('20'=> 'апполон', '60'=>'Союз', '100'=>'Мир');

$array_1 =array(
    'Проверка отчетов'=>'20',
    'Видеоуроки'=>'5',
    'Решение консольных задач'=>'3',
   
    
);

$im= setVSArrayToImage('obl.jpg', 0, $array_1);
// $im = setTextToImage(0,11, 20,$array_);



// Текст
//imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

imagepng($im);
imagedestroy($im);
?>
