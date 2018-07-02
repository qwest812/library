/**
 * Created by User on 02.07.2018.
 */
window.onload = function () {

    var site='http://libary/';

    var loginbutton = document.getElementsByName('login')[0];


    loginbutton.addEventListener('click', function (e) {
        e.preventDefault();
        var emailValue = document.getElementsByName('email')[0].value;
        var passValue = document.getElementsByName('pass')[0].value;
//console.log(passValue);

        var resultEmail = emailValue.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
        var resultPass = passValue.match(/^[a-z0-9_-]{6,15}$/);
        //console.log(resultEmail);
        //console.log(resultPass);
        if(resultEmail && resultPass){
            checkLoginAndPass(emailValue,passValue);

        }else{
            e.preventDefault();
            var disable= document.querySelector('.disable');
            disable.innerHTML='Пароль или логин не соответвуют парвилам(Email -qqq@gamil.com   pass -    1234qwe';
            disable.className='enable';

        }




        //console.log(emailValue, passValue);
    });


    function checkLoginAndPass(email, pass) {
        var ourRequest = new XMLHttpRequest;
        var url =site+"json.php?key=login"+'&pass='+pass+'&email='+email;
        console.log(url);
        ourRequest.open("GET", url, true);
        ourRequest.onload = function () {
            var ourData = JSON.parse(ourRequest.responseText);
            console.log(ourData);
            //var result= 1+ ourData;
            //console.log(result);
            if(ourData =='true'){
                var date = new Date(new Date().getTime() + 60 * 1000 *3);
                //document.cookie = "name=value; expires=" + date.toUTCString();
                document.cookie = "userName="+email+";expires=" + date.toUTCString();
                window.setTimeout(function () {
                    location.href = "http://libary/library.php";
                }, 0);
                //window.location.href="h";
                //setTimeout( 'location="http://libary/library.php"',0);
            }
            //picture.innerHTML='Спасибо за заявку';

        };
        ourRequest.send();
    }




};