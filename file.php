<?php
$arr = $_FILES;
$info = $_REQUEST;
$ext = explode(".",$info['filename'])[1];
//$fileName = md5(uniqid())."$ext";
$fileName = $info['filename'];

$baseDir = date("Y/m/d/",time());
if (!is_dir($baseDir)) {
    mkdir($baseDir,0,777);
}
$filePath = "./".$baseDir.$fileName;

$tmpName = $arr['data']['tmp_name'];
/*$content = file_get_contents($tmpName);
file_put_contents($fileName,$content,FILE_APPEND);*/

move_uploaded_file($tmpName,$filePath);


$filePath = ltrim($filePath,".");
//$filePath = "/".$baseDir.$filePath;

$arrReturn = array(
    "error" => 0,
    "type" => $ext,
    "data" => array(
        'path' => $filePath,
    ),
);
echo json_encode($arrReturn);