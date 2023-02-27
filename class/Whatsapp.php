<?php
	class Whatsapp{

		public static function getToken(){
			$user = Db::selectVar('whats_api', 'id_usuario', $_SESSION['id_usuario']);

			if(is_array($user)){
				if(isset($user['token']) && $user['token'] != ''){ return array('token' => $user['token']); }
				else{ return 'Token is not defined'; }
			}
			else{ return 'You are not allowed to use the Whatsapp Business API! Please, contact the system admin.'; }
		}

		public static function sendMessage($number, $text, $url = false){
			$token = self::getToken();

			if(is_array($token)){
				$curlPost = array();
				$curlPost['messaging_product'] = 'whatsapp';
				$curlPost['to'] = $number;
				$curlPost['type'] = 'text';
				$curlPost['text']['preview_url'] = $url;
				$curlPost['text']['body'] = $text;
				$ch = curl_init();         
				curl_setopt($ch, CURLOPT_URL, API_URL);         
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);         
				curl_setopt($ch, CURLOPT_POST, 1);         
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $token['token'], 'Content-Type: application/json'));     
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));     
				$data = json_decode(curl_exec($ch), true); 
				$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);         

				if ($http_code != 200) {
					echo '<pre>';
					print_r($curlPost);
					echo '<br>'; 
					print_r($data);
					echo '</pre>';
					$error_msg = 'Falha ao enviar mensagem'; 
					if (curl_errno($ch)) { 
					    $error_msg = curl_error($ch); 
					} 
					throw new Exception('Error '.$http_code.': '.$error_msg); 
				}
				curl_close($curl);
			}
			else{ return $token; }
		}

		public static function sendNews($id){
			$news = Db::selectId('noticias', $id);

				$numero = '5548998449277';
				$titulo = strtoupper(Variable::removeAccent($news['titulo']));
				$resumo = Variable::removeAccent($news['resumo']);
				$link = strtolower(str_replace(' ', '-', Variable::removeAccent($news['tema'].'/'.trim($news['titulo']).'-'.$id))).'.html';

			$token = self::getToken();

			if(is_array($token)){
				$curlPost = array();
				$curlPost['messaging_product'] = 'whatsapp';
				$curlPost['to'] = $numero;
				$curlPost['type'] = 'template';
				$curlPost['template'] = array('name' => 'teste', 'language' => array( 'code' => 'pt_BR'),
					'components' => array(
						array('type' => 'header', 'parameters' => array(array('type' => 'text', 'text' => json_encode(strtoupper($titulo))))),
						array('type' => 'body', 'parameters' => array(array('type' => 'text', 'text' => json_encode($resumo)))),
						array('type' => 'button', 'sub_type' => 'url', 'index' => '0', 'parameters' => array(array('type' => 'text', 'text' => $link)))
					)
				);
				$ch = curl_init();         
	      curl_setopt($ch, CURLOPT_URL, API_URL);         
	      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);         
	      curl_setopt($ch, CURLOPT_POST, 1);         
	      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $token['token'], 'Content-Type: application/json'));     
	      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));     
	      $data = json_decode(curl_exec($ch), true); 
	      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);         
	       
	      if ($http_code != 200) {
	    		echo '<pre>';
	    		print_r($curlPost);
	    		echo '<br>'; 
	    		print_r($data);
	    		echo '</pre>';
	        $error_msg = 'Falha ao enviar mensagem'; 
	        if (curl_errno($ch)) { 
	            $error_msg = curl_error($ch); 
	        } 
	        throw new Exception('Error '.$http_code.': '.$error_msg); 
	      }
				curl_close($ch);
	    }
			else{ return $token; }
		}

		public static function registerUser(){}

		public static function registerContact(){}
	}
?>