<?php
session_start();
var_dump($_SESSION);

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9104146bde.js"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Perfil | WhatWatch</title>
</head>
<body>
    <div class="container">
        <!-- sideBar -->
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><img src="../images/soft_logo.png" width="60px" height="60px" id="logo_redeph"></i></span>
                        <span class="title">WhatWatch</span>
                        
                        
                    </a>
                </li>
                <li class="hovered">
                    <a href="./">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="title">Início</span>
                    </a>
                </li>
                <li>
                    <a href="./write.php">
                        <span class="icon"><i class="fas fa-history"></i></span>
                        <span class="title">Histórico</span>
                    </a>
                </li>
                <li>
                    <a href="./config.php">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="title">Configurações</span>
                    </a>
                </li>
                <li>
                    <a href="?sair=sim">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- main -->
        <div class="main">
            <div class="topbar">
                <!-- Botão Sanduiche-->
                <div class="toggle">
                    <i class="fas fa-bars"></i>
                </div>    
                <!-- userPhoto -->
                <?php
                    if($_SESSION['photoURL'] == ""){
                        echo('
                        <div class="user">
                            <img src="../images/user.png">
                        </div>
                        ');
                    }else{

                    }
                ?>
            </div>
            <!-- inbox Chamados -->
            <div class="details">
                <div class="recentInbox">
                    <div class="cardHeader">
                        <h2>Histórico</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Titulo</td>
                                <td>Tipo</td>
                                <td>Gênero</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="amarelo">
                                <td>#414</td>
                                <td>Os Vingadores</td>
                                <td>Filme</td>
                                <td>Ação, Aventura, Ficção</td>
                                <td>Você assistiu?</td>
                            </tr>
                            <tr class="verde">
                                <td>#649</td>
                                <td>How I met your mother</td>
                                <td>Série</td>
                                <td>Comédia, Aventura</td>
                                <td>Assistido</td>
                            </tr>
                            <tr class="verde">
                                <td>#4511</td>
                                <td>Os Simpsons</td>
                                <td>Série</td>
                                <td>Comédia, Estilo de vida</td>
                                <td>Assistido</td>
                            </tr>
                            <tr class="vermelho">
                                <td>#566</td>
                                <td>A Casa do Terror</td>
                                <td>Filme</td>
                                <td>Terror, Thriller</td>
                                <td>Não Assistido</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Botão para ligar a cafeteira -->
        <div onclick="location.href='../raffle/films.php'" class="coffe-button">
            <i class="fas fa-random"></i>
        </div>
    </div>

    <script>
        // ativar barra lateral
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        var edit_save = document.getElementById("logo_redeph");

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
    </script>
</body>
</html>