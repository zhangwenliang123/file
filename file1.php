<?php
    $file = "aaa.jpg";
    $tmpName=$_FILES['data'] ['tmp_name'];

    file_put_contents($file,$tmpName,FILE_APPEND);

    $res = array(
        "error" =>0,
    );
    echo json_encode($res);


?>