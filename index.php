<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mycss.css">
</head>
<body>
<div class="container-fluid row">
    <div class="container col-lg-8 text-center">
        <div class="disable"></div>
        <form class="row " action="/library" method="post">
            <input type="email" placeholder="Email" name="email"  oninvalid="this.setCustomValidity('Email не верный')">
            <input type="password" placeholder="Password" name="pass" onclick="">
            <input type="submit" name="login">
        </form>
    </div>
</div>
<script src="js/myjs.js"></script>
</body>

</html>