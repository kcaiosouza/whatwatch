<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="description" content="O melhor site de randomização de filmes, quando estiver indeciso no que assistir, dê um WhatWatch!">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/base2.css">
    <link rel="stylesheet" type="text/css" href="../css/raffle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script>
        var choosedPage = (Math.random() * (500 - 1) + 1).toFixed(0);
        var linkImageBG = "https://image.tmdb.org/t/p/w1920_and_h1080_bestv2";
        var linkImagePoster = "https://image.tmdb.org/t/p/w600_and_h900_bestv2";
        $.getJSON('https://api.bigdatacloud.net/data/ip-geolocation?key=209724fb28224d21a9076a2e9f16a62b', function(data) {
            var language = data.country.isoAdminLanguages[0].isoAlpha2;
            if(language == "pt"){var language = "pt-BR"}

            $.getJSON('https://api.themoviedb.org/3/discover/movie?api_key=c14a5e48b924e8f71f90d1fe90ccd44b&language=pt-BR&include_adult=false&primary_release_date.gte=2017-01-01&primary_release_date.lte=2022-01-15&vote_average.gte=5.5&page=' + choosedPage, function(data) {
                var listOfFilms = data;
                var choosedNumberFilm = (Math.random() * (20 - 1) + 0).toFixed(0);
                var idFilm = listOfFilms.results[choosedNumberFilm].id;
    
                $.getJSON('https://api.themoviedb.org/3/movie/'+ idFilm +'?api_key=c14a5e48b924e8f71f90d1fe90ccd44b&language='+language, function(data){
                    var choosedFilm = data;
    
                    function createShareBtn() {
                    var iconShare = document.createElement('span');
                    iconShare.className = "fa fa-share"
                    var isMobile = window.orientation > -1;
                    if(isMobile == true) {
                        iconShare.onclick = ()=>{
                            var shareData = {
                                title: choosedFilm.title,
                                text: 'Olha esse filme que eu encontrei! Vamos assistir?',
                                url: 'https://whatwatch.live/share.html#'+idFilm
                            }
                             navigator.share(shareData)
                        };
                    }else{
                        iconShare.onclick = ()=>{navigator.clipboard.writeText("https://www.whatwatch.live/share/film.html#"+idFilm).then(alert("Link copiado com sucesso")); };
                    }
                    iconShare.style = "margin-left: 10px; color: #FFF";
                    document.getElementById('starsRateAndShareBTN').appendChild(iconShare);
                    
                }
                createShareBtn()
    
                    // BUSCAR AS PLATAFORMAS
                    $.getJSON('https://api.themoviedb.org/3/movie/'+idFilm+'/watch/providers?api_key=c14a5e48b924e8f71f90d1fe90ccd44b', function(data){
                        var ListPlatforms = data.results.BR;
                        linkImagePlat = "https://image.tmdb.org/t/p/w300"
                        // console.log(ListPlatforms)
                        if(ListPlatforms == undefined) {
                            location.reload();
                        }else{
                            if(ListPlatforms.flatrate == undefined){
                                location.reload();
                            }else{
                                ListPlatforms.flatrate.forEach(function(item, index){
                                    var img = document.createElement('img');
                                    img.src = linkImagePlat+item.logo_path;
                                    img.width = 100;
                                    img.height = 100;
                                    document.getElementById('imgPlatform').appendChild(img);
                                    // console.log(index, item.provider_name, item.logo_path,)
                                })
                            }
                        }
                    })
    
                    // QUEM INFORMA OS GENEROS
                    choosedFilm.genres.forEach(function(item, index){
                        var genero = document.createElement('h2');
                        genero.innerText = item.name;
                        genero.className = "genres";
                        document.getElementById('generos').appendChild(genero);
                    })
    
                    // QUEM CONTROLA A HORA
                    document.getElementById('duration').innerText = choosedFilm.runtime + "min";
    
                    // QUEM VAI MUDAR A IMAGEM DE FUNDO
                    if(choosedFilm.backdrop_path == null){
                        document.getElementById("background").src = '../images/banner_default.png'
                        document.getElementById("background").style.filter = "blur(1rem)"
                    }else{
                        document.getElementById("background").src = linkImageBG+choosedFilm.backdrop_path
                        document.getElementById("background").style.filter = "blur(1rem)"
                    }
    
                    // QUEM VAI MUDAR A CAPA
                    if(choosedFilm.poster_path == null){
                        location.reload();
                    }else{
                        document.getElementById("poster").src= linkImagePoster + choosedFilm.poster_path;
                    }
    
                    
                    // QUEM MUDA AS OUTRAS INFORMAÇÕES
                    document.getElementById("nameAndYear").innerHTML = choosedFilm.title+" ("+(choosedFilm.release_date).substring(0,4)+")";
                    
                    document.getElementById("rate").innerHTML = choosedFilm.vote_average;
                    var styleStar = document.createElement('style');
                    styleStar.type = 'text/css';
                    styleStar.innerHTML = '.infoTwo .checked:nth-child( n ):nth-child( -n + '+(Number(choosedFilm.vote_average).toFixed(0))+' ) {color: orange;}';
                    document.getElementsByTagName('head')[0].appendChild(styleStar);
                    
                    
                    if(choosedFilm.overview == "" && language == "pt-BR"){
                        document.getElementById("overview").innerHTML = "Em breve...";
                    }else if(choosedFilm.overview == "" && language == "es"){
                        document.getElementById("overview").innerHTML = "En breve...";
                    }else if (choosedFilm.overview == "" && language == "en"){
                        document.getElementById("overview").innerHTML = "Coming soon...";
                    }else if (choosedFilm.overview == "" && language !== "pt-BR" && "es"){
                        document.getElementById("overview").innerHTML = "Coming soon...";
                    }
                    else{
                        document.getElementById("overview").innerHTML = choosedFilm.overview;
                    }
                    setTimeout(()=>{window.onload = document.getElementById('load').style.display = 'none'; document.title = choosedFilm.title + " | WhatWatch";}, 2000)
                });
                return idFilm;
            });
        });

    </script>
    <title>Loading...</title>
</head>
<body>
    <div class="loading" id="load">
        <div class="retangulo"></div>
    </div>
    <img id="background"/>
    <section id="container">
        <div class="infoOne">
            <img id="poster" />
            <div class="infoTwo">
                <h1 id="nameAndYear" class="title"></h1>
                <div class="generos" id="generos">
                </div>
                <div class="time" id="time">
                    <span class="fa fa-clock-o"></span>
                    <h2 id="duration"></h2>
                </div>
                <div id="starsRateAndShareBTN" class="starRate">    
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <p id="rate"></p>
                </div>
                <h1 class="title">Plataformas</h1>
                <div id="imgPlatform">
                </div>
                <h1 class="title">Sinopse</h1>
                <p id="overview"></p>
        </div>
        </div>
    </section>
</body>
</html>