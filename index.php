<?php
define('URL','http://localhost/api');
if (isset($_FILES['file'])){
    $ch = curl_init();
    $cFile  = new CURLFile($_FILES['file']['tmp_name'],$_FILES['file']['type'],$_FILES['file']['name']);
    $values = [
        'name'=>$_POST['name'],
        'email'=>$_POST['email']
    ];
    $data = [
        'files'=>$cFile,
        'filesWithData'=>json_encode($values)
    ];
    curl_setopt($ch, CURLOPT_URL, URL.'/upload.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $res = curl_exec($ch);
    curl_close($ch);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <input type="text" name="name">
    <input type="email" name="email">
    <input type="file" name="file">
    <button type="submit">Save</button>
</form>
</body>
</html>