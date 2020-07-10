<?php
    $target_name = "..\FileImage/". $name .".jpg";
    rename($target_file, $target_name);
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_name)) {
        $stop = 1;
    }else {
        $stop = 0;
        $formSuccess = "Sorry, there was an error uploading your file.";
    }
?>