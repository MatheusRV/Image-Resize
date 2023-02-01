<?php
  include('../../config.php');

  $p = $_POST;
  $data['success'] = false;
  $data['reload'] = false;

  $search = $p['search'];
  $data['result'] = '';

  $wImg = '75';
  $hImg = '75';

  if($search != ''){
    $sql = MySql::connect()->prepare("SELECT * FROM `noticias` WHERE (titulo LIKE ? OR texto LIKE ?) ORDER BY pdate DESC LIMIT 10");

    if($sql->execute(['%'.$search.'%','%'.$search.'%']) && $sql->rowCount() > 0){
      $sql = $sql->fetchAll();

      foreach($sql as $key => $value){

        $data['result'] .= '<li value="'.$value['id'].'">
                              <img src="'.INCLUDE_PATH.'/imgtemp/?largura='.$wImg.'&altura='.$hImg.'&arquivo='.$value['imagem'].'">
                              <a href="'.INCLUDE_PATH.'/'.$p['tema'].'/'.str_replace(' ', '-', strtolower($value['titulo']))'-'.$value['id'].'.html">
                                <p>'.$value['titulo'].'</p>
                                <p>'.$value['resumo'].'</p>
                              </a>'
                            '</li>';
        $data['success'] = true;
      }
    }
    else{
      $data['success'] = true;
    }
  }
  else{
    $data['result'] = '<li class="alone">Digite o título da notícia.</li>';
    $data['success'] = true;
  }

  $data['result'] = $data['result'] == '' ? '<li class="alone">Nenhum resultado encontrado!</li>' : $data['result'];

  die(json_encode($data));
?>