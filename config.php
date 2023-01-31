<?php
  /*----------GENERAL----------*/
  session_start();
  ob_start();

  date_default_timezone_set('America/Sao_Paulo');
  /*------------------------------*/


  /*----------CONSTANTS----------*/

  define('INCLUDE_PATH','http://localhost/Ideias/Image-Resize/');
  define('DIR',__DIR__); /*/
  
  /*------------------------------*/
  $auto_load = function($class){
    if(file_exists(DIR.'/class/'.$class.'.php')){
      include('class/'.$class.'.php');
    }
  };

  spl_autoload_register($auto_load);
  /*------------------------------*/


  /*----------DATABASE----------*/
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASSWORD', '');
  define('DATABASE', 'canal');/*/
  /*------------------------------*/
?>