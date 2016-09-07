<?php
namespace App\MyLibrary;
use App;

class TranslateAPI {
		
	//the GOOGLE SERVER
	var $host = 'https://www.googleapis.com/language/translate/v2?key={API_KEY}&source={source}&target={target}&format=html&q={text}';
	//default
	//setting API
	var $api = 'AIzaSyBQfKac1H96dMy4R5Ri1O856InCfZDWl9Y';
	var $source = 'en';
	var $target = null;
	var $text = null;
	
	function translate($text,$target=null,$source=false) {
				
		if ( (!$source ) ) {
			$source = $this->source;
		}
		if ( is_null( $target ) ) {
			$target = $this->target;
		}
		if($target=='zh_hk' OR $target=='zh-HK' OR $target=='zh-hk'){
			$target = 'zh-tw';
		}
		$ori_text = $text;
		$text = urlencode($text);
		$host = str_replace( '{API_KEY}', $this->api, $this->host );
		$host = str_replace( '{source}', $source, $host );
		$host = str_replace( '{target}', $target, $host );
		$host = str_replace( '{text}',  $text, $host );
		$data = array();

		
		$response = $this->fetch($host);
		$data = json_decode($response);
		//set the geoPlugin vars
		if(!array_key_exists('error',$data)){
			$replace = $data->data->translations[0]->translatedText;
		}else{
			$replace = $ori_text;
		}
		$this->translation = $replace;
	}
	
	function fetch($host) {

		if ( function_exists('curl_init') ) {
			//use cURL to fetch data
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, $host);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, 'FA translation google API');
			$response = curl_exec($ch);
			curl_close ($ch);
			
		} else if ( ini_get('allow_url_fopen') ) {
			
			//fall back to fopen()
			$response = file_get_contents($host, 'r');
			
		} else {

			trigger_error ('GoogleTranslate API class Error: Cannot retrieve data. Either compile PHP with cURL support or enable allow_url_fopen in php.ini ', E_USER_ERROR);
			return;
		
		}
		
		return $response;
	}
	public static function force($text,$target=null,$source=false) {
		$new = new TranslateAPI;
		if ( (!$source ) ) {
			$source = $new->source;
		}
		if ( is_null( $target ) ) {
			$target = $new->target;
		}
		if($target=='zh_hk' OR $target=='zh-HK' OR $target=='zh-hk'){
			$target = 'zh-tw';
		}
		$ori_text = $text;
		$text = urlencode($text);
		
		$host = str_replace( '{API_KEY}', $new->api, $new->host );
		$host = str_replace( '{source}', $source, $host );
		$host = str_replace( '{target}', $target, $host );
		$host = str_replace( '{text}',  $text, $host );
		$data = array();

		
		$response = $new->fetch($host);
		$data = json_decode($response);
		//set the geoPlugin vars
		if(!array_key_exists('error',$data)){
			$replace = str_replace( 'fanl2brq',"\n", $data->data->translations[0]->translatedText );
		}else{
			$replace = $ori_text;
		}
		return $replace;
	}
}

?>
