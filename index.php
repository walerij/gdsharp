<head>
    <meta charset="UTF-8">
</head>

<?php







function setVSmArrayToImage($image,  $text, $pupil, $out_image, $path) {

    // Создание изображения
    // мы создаем его из файла nadja.jpg
    $im = imagecreatefrompng($path.$image);
    // Создание цвета
    $color = imagecolorallocate($im, 0, 0, 0);
  
 
    //  $text = массив с текстом вида '20'=> 'апполон', '60'=>'Союз', '100'=>'Мир'
    // Замена пути к шрифту на пользовательский - иначе не прокатит
    $font = $path.'arial.ttf';

    
    //впендюривание данных о формулисте
     imagettftext($im, 15, 0, 336, 30, $color, $font, $pupil[2]); //тек дата
     imagettftext($im, 15, 0, 470, 30, $color, $font, $pupil[0]); //номур
     imagettftext($im, 15, 0, 505, 30, $color, $font, $pupil[1]); //фио
     
   //и перебор значений массива оценок
    $i=0; 
    foreach ($text as $key => $val) {
      //  imagettftext($im, 20, $angle, 0, $i*30, $color, $font, $key);
        $j=0;
        foreach($val as $t)
        { 
           if($i==8 || $j==7)
               $font = $path.'arialbd.ttf';
           else 
               $font = $path.'arial.ttf';
            if($i==8 && $j==7)
               $size = 12;
           else 
               $size=10;
           
          imagettftext($im, $size, 0, 280+48*$j, 106+$i*38, $color, $font, $t);
          $j++; 
        }
        $i++;
    }
    
    imagepng($im,$path.$out_image);
  
}
// Тип содержимого
//header('Content-Type: image/png');


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


//путь к папке, где шрифты, фоновая картинка и выводимый файл
$path='source\\';
//получение и сохранение изображения в файл out_.png
setVSmArrayToImage('obr.png',  $array_2, $pupil, 'out_.png', $path);




echo 'Вот ваш файл <br>';
echo '<img src="'.$path.'out_.png" alt="no" />';

?>
