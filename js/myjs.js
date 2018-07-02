/**
 * Created by User on 02.07.2018.
 */
window.onload = function() {

    var emailValue =document.getElementsByName('email')[0].value;
    var passValue=document.getElementsByName('pass')[0].value;
    var loginbutton =document.getElementsByName('login')[0];


    loginbutton.addEventListener('click', function (e) {
        e.preventDefault();


        console.log(emailValue,passValue);
    });


    function checkLogin(){

    }
    function checkPass(){

    }
};