<?php
require "convert.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<?php
    echo readDocx('archivos/ejemplo.docx');
?>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
function refrescar (){
    var x = document.querySelectorAll('span');
    for(var i = 0; i < x.length; i++){
        if(x[i].innerHTML.length == 0 || x[i].innerHTML == "&nbsp;"){
            x[i].style.display="none";
        }
    };

    var word = $('.word')
    console.log(word.length)
    for(var xlr = 0; xlr < word.length; xlr++ ){
        var x = word[xlr].childNodes;
        var id = ["lista1"]
        for (var i = 0; i < x.length; i++){
            if(x[i].nodeName == "LI" || x[i].nodeName == "P"){
                if(x[i].getAttribute('class') == "Prrafodelista-P"){
                    x[i].setAttribute("class",id[id.length - 1]);
                } else {
                    id.push("lista"+Math.round(Math.random()*10000000))
                }
            } else {
                id.push("lista"+Math.round(Math.random()*10000000));
            }
        }
        for(var i = 0; i < id.length; i++){
            var l = "."+id[i]
            $( l ).wrapAll( "<ul class='PrimerNivel' />");
        }
    }
    var o = $(".PrimerNivel");
    for (var i = 0; i < o.length; i++){
        var r = ["lista"+Math.round(Math.random()*10000000)];
        for( var n = 0; n < o[i].childNodes.length; n++){
            if(o[i].childNodes[n].getAttribute('lvl') == "1" || o[i].childNodes[n].getAttribute('lvl') == "no" || o[i].childNodes[n].getAttribute('lvl') == "2" || o[i].childNodes[n].getAttribute('lvl') == "3"){
                o[i].childNodes[n].setAttribute("class",r[r.length -1]);
            } else {
                r.push("lista"+Math.round(Math.random()*10000000))
            }
        };
        for(var u = 0; u < r.length; u++){
            var l = "."+r[u]
            $( l ).wrapAll( "<ul class='segundolevel' />");
        }
    };
    var o = $(".segundolevel");
    for (var i = 0; i < o.length; i++){
        var r = ["lista"+Math.round(Math.random()*10000000)];
        for( var n = 0; n < o[i].childNodes.length; n++){
            if(o[i].childNodes[n].getAttribute('lvl') == "2" || o[i].childNodes[n].getAttribute('lvl') == "no" || o[i].childNodes[n].getAttribute('lvl') == "3"){
                o[i].childNodes[n].setAttribute("class",r[r.length -1]);
            } else {
                r.push("lista"+Math.round(Math.random()*10000000))
            }
        };
        for(var u = 0; u < r.length; u++){
            var l = "."+r[u]
            $( l ).wrapAll( "<ul class='tercerlevel' />");
        }
    };
    var o = $(".tercerlevel");
    for (var i = 0; i < o.length; i++){
        var r = ["lista"+Math.round(Math.random()*10000000)];
        for( var n = 0; n < o[i].childNodes.length; n++){
            if(o[i].childNodes[n].getAttribute('lvl') == "3" || o[i].childNodes[n].getAttribute('lvl') == "no"){
                o[i].childNodes[n].setAttribute("class",r[r.length -1]);
            } else {
                r.push("lista"+Math.round(Math.random()*10000000))
            }
        };
        for(var u = 0; u < r.length; u++){
            var l = "."+r[u]
            $( l ).wrapAll( "<ul class='cuartolevel' />");
        }
    };
}
refrescar();
</script>
<style>
    li{
        margin:0;
    }
</html>