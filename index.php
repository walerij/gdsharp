<?php



function setVSArrayToImage($image,$angle,  $text) {

    // Создание изображения
   
    $im = imagecreatefrompng($image);
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


function setVSmArrayToImage($image,$angle,  $text, $pupil) {

    // Создание изображения
    // мы создаем его из файла nadja.jpg
    $im = imagecreatefromjpeg($image);
    // Создание цвета
    $color = imagecolorallocate($im, 0, 0, 0);
  
 
    //  $text = массив с текстом вида '20'=> 'апполон', '60'=>'Союз', '100'=>'Мир'
    // Замена пути к шрифту на пользовательский - иначе не прокатит
    $font = 'arial.ttf';

    
    //впендюривание данных о формулисте
     imagettftext($im, 15, $angle, 336, 30, $color, $font, $pupil[2]); //тек дата
     imagettftext($im, 15, $angle, 470, 30, $color, $font, $pupil[0]); //номур
     imagettftext($im, 15, $angle, 505, 30, $color, $font, $pupil[1]); //фио
     
   //и перебор значений массива оценок
    $i=0; 
    foreach ($text as $key => $val) {
      //  imagettftext($im, 20, $angle, 0, $i*30, $color, $font, $key);
        $j=0;
        foreach($val as $t)
        { 
           if($i==8 || $j==7)
               $font = 'arialbd.ttf';
           else 
               $font = 'arial.ttf';
            if($i==8 && $j==7)
               $size = 12;
           else 
               $size=10;
           
          imagettftext($im, $size, $angle, 280+48*$j, 106+$i*38, $color, $font, $t);
          $j++; 
        }
        $i++;
    }
    return $im;
}
// Тип содержимого
header('Content-Type: image/png');
$pupil = array('791','Валерий Ждунов', date('d.m.Y'));

$array_2 =array(
    '0'=>array('5','5','5','5','5','5','5','35'),
    '1'=>array('5','5','5','5','5','5','5','35'),
    '2'=>array('5','5','5','5','5','5','5','35'),
    '3'=>array('5','5','5','5','5','5','5','35'),
    '4'=>array('5','5','5','5','5','5','5','35'),
    '5'=>array('5','5','5','5','5','5','5','35'),
    '6'=>array('5','5','5','5','5','5','5','35'),
    '7'=>array('5','5','5','5','5','5','5','35'),
    '8'=>array('35','35','35','35','35','35','35','245'),
);


$im= setVSmArrayToImage('obr.png', 0, $array_2,$pupil);

//выходной файл
$out_im='outfile.png';

//сохранение в файл
imagepng($im,$out_im);
imagedestroy($im);
?>
