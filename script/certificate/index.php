<?php
header('content-type:image/jpeg');
$font="MTCORSVA_0.TTF";
$image=imagecreatefromjpeg("certificate.jpg");
$color=imagecolorallocate($image,19,21,22);
$name="Vishal Gupta";
imagettftext($image,50,0,365,420,$color,$font,$name);
imagejpeg($image);
imagedestroy($image);

?>