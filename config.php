<?php
  /*----------GENERAL----------*/
  session_start();
  ob_start();

  date_default_timezone_set('America/Sao_Paulo');
  /*------------------------------*/


  /*----------CONSTANTS----------*/

  /**/define('INCLUDE_PATH','http://localhost/Ideias/Image-Resize/');
  define('DIR',__DIR__); /*/

  /**define('INCLUDE_PATH','https://www.canalicara.com/');
  define('DIR',__DIR__); /**/
  
  /*------------------------------*/
  $auto_load = function($class){
    if(file_exists(DIR.'/class/'.$class.'.php')){
      include('class/'.$class.'.php');
    }
  };

  spl_autoload_register($auto_load);
  /*------------------------------*/


  $_SESSION['login'] = isset($_SESSION['login']) ? $_SESSION['login'] : 'matheus@gmail.com';
  $_SESSION['nivel'] = isset($_SESSION['nivel']) ? $_SESSION['nivel'] : 100;
  $_SESSION['nome_usuario'] = isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Matheus';
  $_SESSION['id_usuario'] = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 1;

  /*----------DATABASE----------*/
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASSWORD', '');
  define('DATABASE', 'canal');/*/
  /*------------------------------*/

  /*-----------API--------------*/
  define('API_URL', 'https://graph.facebook.com/v15.0/103887732623072/messages');
  define('API_DEFAULT_NUMBER', '5548998449277');
  /*----------------------------*/
?>