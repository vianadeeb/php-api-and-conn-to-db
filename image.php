<?php

    $file =  file_get_contents("image.png");


    $image_encode =  base64_encode($file);




    echo '<img src="data:image/png;base64,'.$image_encode.'" />';
?>