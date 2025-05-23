<?php
  /**
  *
  * Classe para manipulação do banco de dados
  * 
  * @author Matheus Reus Vieira <matheus.reusv@gmail.com>
  * @version 1.0.0 $ 2023-01-27 13:35:52 $
  *
  */

  class Db{
    public static function selectAll($table, $elOrder = null, $order = null){
      $query = "SELECT * FROM `$table`";

      if($order != null && $elOrder != null){
        $query .= " ORDER BY $elOrder $order";
      }
      
      $sql = MySql::connect()->prepare($query);
      $sql->execute();

      return $sql->fetchAll();
    }

    public static function selectAllByVar($table, $var, $condition, $elOrder = null, $order = null){
      $sql = MySql::connect()->prepare("SELECT * FROM `$table` WHERE `$var` = ?");
      $sql->execute([$condition]);
      $sql = $sql->fetchAll();

      return $sql;
    }

    public static function selectId($table, $id){
      $sql = MySql::connect()->prepare("SELECT * FROM `$table` WHERE id = ? LIMIT 1");
      $sql->execute([$id]);

      $sql = $sql->fetch();

      return $sql;
    }

    public static function selectVar($table, $var, $condition){
      $sql = MySql::connect()->prepare("SELECT * FROM `$table` WHERE `$var` = ? AND deleted = 0 LIMIT 1");
      $sql->execute([$condition]);

      $sql = $sql->fetch();

      return $sql;
    }

    public static function selectLimited($table, $start, $end, $elOrder = null, $order = null, $by_att = null){
       $query = "SELECT * FROM `$table` WHERE deleted = 0";

      if($order != null && $elOrder != null){
        $query .= $by_att == null ? " ORDER BY $elOrder $order" :" ORDER BY last_att DESC, $elOrder $order";
      }

      $query .= " LIMIT $start, $end";
      $sql = MySql::connect()->prepare($query);
      $sql->execute();

      return $sql->fetchAll();
    }

    public static function insert($table, $info){
      $query = "INSERT INTO `$table` VALUES (null";

      foreach($info as $key => $value){
      $query .= ",?";
      }

      $query .= ")";

      $sql = MySql::connect()->prepare($query);

      if($sql->execute($info)){
        return true;
      }
      else{
        return false;
      }
    }

    public static function update($table, $info){
      $first = 0;
      $query = "UPDATE `$table` SET ";

      foreach($info as $key => $value){
        if($first == 0){
          if($key != 'id'){
            $query .= $key.' = ?';
            $data[] = $value;

            $first++;
          }
        }
        else{
          if($key != 'id'){
            $query .= ','.$key.' = ?';
            $data[] = $value;
          }
        }
      }

      $query .= " WHERE id = ?";
      $data[] = $info['id'];

      $sql = MySql::connect()->prepare($query);

      if($sql->execute($data)){
        return true;
      }
      else{
        return false;
      }
    }

    public static function uploadFile($path, $f){
      $path = DIR.'/file/'.$path;
      if(!file_exists($path)){
        mkdir($path, 0777, true);
      }

      if($f['error'] == 0){
        $name = $f['name'];
        $verify_name = glob($path.'/'.$name, GLOB_BRACE);

        $k = 1;
        while(count($verify_name) > 0){
          $name = '';
          for($j = 0; $j < (count(explode('.', $f['name']))-1); $j++){
            $name .= $name == '' ? explode('.', $f['name'])[$j] : '.'.explode('.', $f['name'])[$j];
          }
          $name .= ' ('.$k.').'.explode('.', $f['name'])[count(explode('.', $f['name']))-1];
          $verify_name = glob($path.'/'.$name, GLOB_BRACE);

          $k++;
        }

        if(!move_uploaded_file($f['tmp_name'], $path.'/'.$name)){
          return false;
        }

        return $name;
      }

      return false;
    }

    public static function uploadCopyFile($f, $path){
      $path = DIR.'/file/'.$path;
      if(!file_exists($path)){
        mkdir($path, 0777, true);
      }
      
      if($f['error'] == 0){
        $name = $f['name'];
        $verify_name = glob($path.'/'.$name, GLOB_BRACE);

        $k = 1;
        while(count($verify_name) > 0){
          $name = '';
          for($j = 0; $j < (count(explode('.', $f['name']))-1); $j++){
            $name .= $name == '' ? explode('.', $f['name'])[$j] : '.'.explode('.', $f['name'])[$j];
          }
          $name .= ' ('.$k.').'.explode('.', $f['name'])[count(explode('.', $f['name']))-1];
          $verify_name = glob($path.'/'.$name, GLOB_BRACE);

          $k++;
        }

        if(!copy($f['tmp_name'], $path.'/'.$name)){
          return false;
        }
      }

      return true;
    }

    public static function copyFile($f1, $f2, $file_name){
      $path = DIR.'/file/'.$f2;
      $f1 = DIR.'/file/'.$f1.'/'.$file_name;
      $f2 = DIR.'/file/'.$f2;
      if(file_exists($f1)){
        $name = $file_name;
        $verify_name = glob($f2.'/'.$name, GLOB_BRACE);

        $k = 1;
        while(count($verify_name) > 0){
          $name = '';
          for($j = 0; $j < (count(explode('.', $file_name))-1); $j++){
            $name .= $name == '' ? explode('.', $file_name)[$j] : '.'.explode('.', $file_name)[$j];
          }
          $name .= ' ('.$k.').'.explode('.', $file_name)[count(explode('.', $file_name))-1];
          $verify_name = glob($path.'/'.$name, GLOB_BRACE);

          $k++;
        }

        if(!copy($f1, $f2.'/'.$name)){
          return false;
        }
      }

      return true;
    }

    public static function removeFile($file){
      if(file_exists($file)){
        if(unlink($file)){
          return true;
        }
      }

      return false;
    }
  }
?>