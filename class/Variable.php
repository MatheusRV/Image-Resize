<?php
  class Variable{

    public static function removeAccent($string){
      return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"), $string);
    }

    public static function delTree($dir){ 
      $files = array_diff(scandir($dir), array('.','..')); 
      foreach ($files as $file) { 
        (is_dir("$dir/$file")) ? Variable::delTree("$dir/$file") : unlink("$dir/$file"); 
      } 
      return rmdir($dir); 
    }

    public static function getContent($path){
      if(file_exists($path)){
        $directory = array_diff(scandir($path), array('..', '.'));
      }
      else{
        $directory = [];
      }

      return $directory;
    }

    public static function qtdPg($name_table, $perPg = 50){
      $qtdPg = MySql::connect()->prepare("SELECT id FROM `$name_table`");
      $qtdPg->execute();
      $qtdPg = $qtdPg->rowCount();

      return ceil($qtdPg / $perPg);
    }
  }
?>