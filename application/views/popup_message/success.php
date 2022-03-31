<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php 
    $origin_page = $data['origin_page'];
    $message = $data['message'];
    $title = $data['title'];
    $type = $data['type'];

echo '<script>';
echo 'var origin_page ='."'$origin_page'".';';
echo 'var message ='."'$message'".';';
echo 'var title ='."'$title'".';';
echo 'var type ='."'$type'".';';
echo 'swal({
        title: title,
        text: message,
        type: type,
        timer: 2000,
        showConfirmButton: false
        }, function(){
            window.location.href = origin_page;
        });';
echo '</script>';

?>
    
</body>
</html>