<?php
session_start();
include_once("conection.php");

if($_POST){
    
  //verificando se o usuario inseriu os dados (se sim, coletando login e senha)

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  if(!empty($login) AND (!empty($senha))){
    
    //verificando a existencia do usuario no banco de dados(se sim, confirma senha)

    $searchBD_user = "SELECT * FROM `users` WHERE user = '$login' LIMIT 1;";
    $resultUser = mysqli_query($conn, $searchBD_user);

      if($resultUser){
        
        //verificando senha encriptografada
        $row_user = mysqli_fetch_assoc($resultUser); 

        if($senha == $row_user['senha']){
          //criando sessão do usuario
          $_SESSION['user']['id_user'] = $row_user['user_id'];
          $_SESSION['user']['login'] = $row_user['user'];
          $_SESSION['user']['nome'] = $row_user['nome'];
          $_SESSION['user']['email'] = $row_user['email'];
          
          echo("Bem Vindo!");
          header("Location:../index.php");
          
        }else{
          echo("Login ou senha incorretos!");
        //   header("Location:../index.php");
          
        }     
      }
  }else{
    echo("Você precisa inserir todos os dados de login!");
    // header("Location:../index.php");
  
  }
}else{
  echo("Página não encontrada!");
//   header("Location:../index.php");
}