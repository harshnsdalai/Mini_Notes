<?php 
    $data_w=file_get_contents("loged.php");
    
    $data_1=(explode('<div id="main_down">',$data_w));
    $data=(explode("</div",$data_1[1]));

    echo (data[0]);






?>