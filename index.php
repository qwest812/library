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
    <div class="container col-lg-6 text-center">
        <form class="row " action="/library" method="post">
            <label for=""></label>
            <input type="email" placeholder="Email" name="email"  oninvalid="this.setCustomValidity('Email не верный')">
            <label for=""></label>
            <input type="password" placeholder="pass" name="pass">
            <input type="submit" name="login">
        </form>
    </div>
</div>
<script src="js/myjs.js"></script>
</body>

</html>