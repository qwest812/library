window.onload = function () {
    var site='http://libary/';
    var rus=document.querySelector('.rus');
    var eng=document.querySelector('.eng');
    var data=document.getElementById('data');
//alert(document.cookie);
    var ln= document.cookie.split('=');
    var len=ln.length;
    console.log(ln[len-1]);
    if(ln[len-1]=='eng'){
        while (data.firstChild) {
            data.removeChild(data.firstChild);
        }
        getData('eng');
    }else{
        while (data.firstChild) {
            data.removeChild(data.firstChild);
        }
        getData('rus');
    }


    rus.addEventListener('click', function (e) {
        e.preventDefault();
        while (data.firstChild) {
            data.removeChild(data.firstChild);
        }

        getData('rus');


    });

    eng.addEventListener('click', function (e) {
        e.preventDefault();
        while (data.firstChild) {
            data.removeChild(data.firstChild);
        }

        getData('eng');


    });

    function getData(lang){
        var ourRequest = new XMLHttpRequest;
        var url='';
        if(lang=='eng') {
            url =site+"json.php?key=allEng";
        }else{
            url =site+"json.php?key=all";
        }


        ourRequest.open("GET", url, true);
        ourRequest.onload = function () {
            var ourData = JSON.parse(ourRequest.responseText);
            returnData(ourData, lang);
            //console.log(ourData);
        };
        ourRequest.send();
    }


    function returnData(array, lang){

        var date = new Date(new Date().getTime() + 60 * 1000 *3);
        document.cookie = "lang="+lang+"; expires=" + date.toUTCString();
        var name='';
        if(lang=='rus'){
            name='name';
        }else{
            name='name_eng';
        }

        for(var i=0; i<array.length;i++){
            //console.log(i);
            //console.log(array[i]);
            var p = document.createElement('p');
            p.innerHTML='Name: ' + array[i]['name_righter']+'---Book: '+array[i][name];
            data.appendChild(p);
        }
    }
};
