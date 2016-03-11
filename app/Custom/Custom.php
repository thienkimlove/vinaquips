<?php


namespace App\Custom;

class Custom
{
   public static function imageUrl($path)
   {
       $ars = explode('/', $path);

       if (isset($ars[3]) && $ars[3] && file_exists(public_path('files/'.$ars[3]))) {
           return url($path);
       } else {
           return url($ars[0].'/'.$ars[1].'/'.$ars[2].'/default.jpg');
       }


   }
}