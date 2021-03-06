<?php
session_start();
include('./functions/conection.php');

// var_dump($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="description" content="O melhor site de randomização de filmes, quando estiver indeciso no que assistir, dê um WhatWatch!">
    <meta name="keywords" content="WhatWatch, o que assistir, indicar filmes, indicar series, sortear filme, sortear serie">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <title>WhatWatch</title>
    <link rel="stylesheet" type="text/css" href="./css/base.css">
    <script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>
    <script>
        $.getJSON('https://api.bigdatacloud.net/data/ip-geolocation?key=209724fb28224d21a9076a2e9f16a62b', function(data) {
            var language = data.country.isoAdminLanguages[0].isoAlpha2;
            if(language == "pt") {
                document.getElementById("name__btn_language").innerHTML = "SORTEAR";
            }else if (language == "en") {
                document.getElementById("name__btn_language").innerHTML = "RAFFLE";
            }else if (language == "es") {
                document.getElementById("name__btn_language").innerHTML = "RIFA";
            }
            else{
                document.getElementById("name__btn_language").innerHTML = "RAFFLE";
            }
        });
        $.getJSON('./json/images.json', function(data) {
            var urlImgs = data;
            var numberOfImgs = urlImgs.imagens.length;
            
            function setImg1() {
                let numberUrlImg = (Math.random() * (numberOfImgs - 0) + 0).toFixed(0);
                document.getElementById('grid_capa-filme1').style.backgroundImage = "url('"+urlImgs.imagens[numberUrlImg]+"')";
            }
            function setImg2() {
                let numberUrlImg = (Math.random() * (numberOfImgs - 0) + 0).toFixed(0);
                document.getElementById('grid_capa-filme2').style.backgroundImage = "url('"+urlImgs.imagens[numberUrlImg]+"')";
            }
            function setImg3() {
                let numberUrlImg = (Math.random() * (numberOfImgs - 0) + 0).toFixed(0);
                document.getElementById('grid_capa-filme3').style.backgroundImage = "url('"+urlImgs.imagens[numberUrlImg]+"')";
            }
            function setImg4() {
                let numberUrlImg = (Math.random() * (numberOfImgs - 0) + 0).toFixed(0);
                document.getElementById('grid_capa-filme4').style.backgroundImage = "url('"+urlImgs.imagens[numberUrlImg]+"')";
            }
            function setImg5() {
                let numberUrlImg = (Math.random() * (numberOfImgs - 0) + 0).toFixed(0);
                document.getElementById('grid_capa-filme5').style.backgroundImage = "url('"+urlImgs.imagens[numberUrlImg]+"')";
            }
            function setImg6() {
                let numberUrlImg = (Math.random() * (numberOfImgs - 0) + 0).toFixed(0);
                document.getElementById('grid_capa-filme6').style.backgroundImage = "url('"+urlImgs.imagens[numberUrlImg]+"')";
            }
            function setImg7() {
                let numberUrlImg = (Math.random() * (numberOfImgs - 0) + 0).toFixed(0);
                document.getElementById('grid_capa-filme7').style.backgroundImage = "url('"+urlImgs.imagens[numberUrlImg]+"')";
            }
            function setImg8() {
                let numberUrlImg = (Math.random() * (numberOfImgs - 0) + 0).toFixed(0);
                document.getElementById('grid_capa-filme8').style.backgroundImage = "url('"+urlImgs.imagens[numberUrlImg]+"')";
            }
            
            
            setImg1();
            setImg2();
            setImg3();
            setImg4();
            setImg5();
            setImg6();
            setImg7();
            setImg8();
            // console.log(urlImgs.imagens);
});
    </script>
    <script>
        document.documentElement.className = "js";

        var supportsCssVars = function supportsCssVars() {
          var e,
              t = document.createElement("style");
          return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e;
        };
        
        supportsCssVars() || alert("Esse site não funciona com o seu navegador, por favor utilize um navegador mais recente.");
    </script>
</head>
<body class="demo-3 loading">
    <main>
            <div class="content">
                <div class="grid grid--img">
                    <div class="grid__item pos-1"><div id="grid_capa-filme1" class="grid__item-img"></div></div>
                    <div class="grid__item pos-2"><div id="grid_capa-filme2" class="grid__item-img"></div></div>
                    <div class="grid__item pos-3"><div id="grid_capa-filme3" class="grid__item-img"></div></div>
                    <div class="grid__item pos-4"><div id="grid_capa-filme4" class="grid__item-img"></div></div>
                    <div class="grid__item pos-5"><div id="grid_capa-filme5" class="grid__item-img"></div></div>
                    <div class="grid__item pos-6"><div id="grid_capa-filme6" class="grid__item-img"></div></div>
                    <div class="grid__item pos-8"><div id="grid_capa-filme7" class="grid__item-img"></div></div>
                    <div class="grid__item pos-10"><div id="grid_capa-filme8" class="grid__item-img"></div></div>
                </div>
                <div class="content__title">
                    <img src="./images/home_logo.png" width="500px" height="auto" alt="Logo">
                    <div class="content__btn">
                        <div id="name__btn_language"></div>
                        <?php
                        if(isset($_SESSION) && empty($_SESSION)){
                            echo('
                            <div onclick="location.href='."'".'login.php'."'".'">LOGIN</div>
                            ');
                        }
                        ?>
                    </div>
                </div>
            </div>
    </main>
    <footer>
        <svg viewBox="0 0 120 20">
         <defs> 
           <mask id="xxx">
             <circle cx="7" cy="12" r="40" fill="#fff" />
           </mask>
           
           <filter id="goo">
              <feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
              <feColorMatrix in="blur" mode="matrix" values="
                   1 0 0 0 0  
                   0 1 0 0 0  
                   0 0 1 0 0  
                   0 0 0 13 -9" result="goo" />
              <feBlend in="SourceGraphic" in2="goo" />
              </filter>
             <path id="wave" d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
          </defs> 
        
           <use id="wave3" class="wave" xlink:href="#wave" x="0" y="1" ></use> 
           <use id="wave2" class="wave" xlink:href="#wave" x="0" y="2" ></use>
         
          <g class="gooeff">
          <!-- <circle class="drop drop1" cx="20" cy="10" r="1.8"  />
          <circle class="drop drop2" cx="25" cy="10.5" r="1.5"  />
          <circle class="drop drop3" cx="16" cy="10.8" r="1.2"  /> -->
            <use id="wave1" class="wave" xlink:href="#wave" x="0" y="3" />
        </svg>
        
        <div style="color: #000; font-weight: bold;">WhatWatch by Mink</div>
    </footer>

    <svg class="cursor" width="80" height="80" viewBox="0 0 80 80">
        <circle class="cursor__inner" cx="40" cy="40" r="20"></circle>
    </svg>
    <script src="./js/ImageGridMotionEffect.js"></script>
    <script>
        var firstChoose = (Math.random() * (1 - 0) + 0);
        console.log(firstChoose);
        if(firstChoose > 0.5){
            document.getElementById("name__btn_language").onclick = function() {location.href="./raffle/films.php"}
        }else{
            document.getElementById("name__btn_language").onclick = function() {location.href="./raffle/series.php"}
        }
    </script>
    
    <script>
        var page = new jsPDF();
        var specialElementHandlers = {
                '#editor': function (element, renderer) {
                return true;
            }
        };

        page.fromHTML($('.demo-3').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    page.save('sample-file.pdf');
    </script>
</body>
</html>