<?php
    if($checkErrIMG == 1)
    {
        unlink($imgSrc);
        require "UploadFile.php";
    }else{
        $target_name = "..\FileImage/". $name .".jpg";
        rename($imgSrc, $target_name);
        $stop = 1;
        
    }
    $imgSrc = "";
?>