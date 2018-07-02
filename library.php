<?php
include ('bd.php');
if(empty($_COOKIE['userName'])){
//    header("HTTP/1.1 403 Forbidden");
//    header("Location: http://libary" . $_SERVER['HTTP_HOST'], TRUE, 403);

    header("HTTP/1.1 403 Forbidden");
    header('Location: http://libary');

    var_dump(444);
}
//var_dump($_COOKIE);
class library{
    function __construct(){
        $user=DB::getObject()->ifIsSetUser($_COOKIE['userName']);
    }
    function checkEmail(){

    }
    function checkPass(){

    }
    function ifIsSetUser(){

    }
}
$library=new library();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<input type="button" class="rus" value="Rus">
<input type="button" class="eng" value="Eng">
<div id="data"></div>
<script src="js/library.js">

</script>
</body>
</html>
