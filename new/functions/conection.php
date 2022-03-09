<?php

define('HOST', '127.0.0.1:3306');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'whatwatch');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Falha na conexão com o Banco de Dados!');