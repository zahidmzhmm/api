<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requested-with");
$data = json_decode(isset($_POST['filesWithData'])?$_POST['filesWithData']:file_get_contents("php://input"),true);
if (!empty($_FILES['files']['tmp_name'])){
    echo $data['name'].'<br>'.$data['email'].'<br>';
    $file_tmp = $_FILES['files']['tmp_name'];
    $file_nam_ex = explode('.',$_FILES['files']['name']);
    $file_extension = end($file_nam_ex);
    $filename = strtoupper(substr(sha1(md5(rand(10001,99999).time())),0,13)).'.'.$file_extension;
    $up = move_uploaded_file($file_tmp,'uploads/'.$filename);
    if ($up==true){
        echo "<a href='uploads/$filename'>$filename</a><br><br>";
    }else{
        echo "Upload Error";
    }
}