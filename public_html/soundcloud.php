<?php
	
	use Parse\ParseUser;
	require_once "track.php";

	//lol this is a total hack but it works
	if(isset($_GET['code'])) {
		$code = $_GET['code'];
		$secret = getenv("SC_SECRET");
		$url = SoundCloud::$baseApiUrl."oauth2/token";
		$fields = "client_secret=$secret&client_id=".getenv("SC_CLIENT_ID")."&redirect_uri=http://apollo.jadengrossman.com&grant_type=authorization_code&code=$code";

		$cu = curl_init($url);
		curl_setopt($cu, CURLOPT_POST, 1);
		curl_setopt($cu, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);

		$resp = curl_exec($cu);
		if(curl_error($cu))
		{
		    echo 'error:' . curl_error($cu);
		}

		$json = json_decode($resp);
		ParseUser::getCurrentUser()->set("soundcloud_token", $json->access_token);

		ParseUser::getCurrentUser()->save();
		echo "param: " . $fields;
		echo "resp: " . $resp;
		$a = print_r($resp, true);
		echo "a: " . $url . $a;
	}

class SoundCloud {
	public $userid; //soundcloud user id
	public $username; //soundcloud username
	public $avatar_url; //soundcloud avatar url
	public $access_token;//soundcloud accesstoken from oauth2
	public $user;//parse user

	public static $baseApiUrl = "https://api.soundcloud.com/";
	public static $baseUrl = "https://soundcloud.com";
	public static $clientId = "";

	//constructor takes soundcloud user id
	public function __construct($access_token) {
		$this->access_token = $access_token;
		$this->user = ParseUser::getCurrentUser();
		$this->getUserData();
	}

	public static function launchOauth2() {
		$url = self::$baseUrl."/connect".
		"?client_id=".self::$clientId.
		"&redirect_uri="."http://apollo.jadengrossman.com".
		"&response_type="."code".
		"&scope="."non-expiring";
		header("location:$url");
	}

	public function getUserData() {
		$url = self::$baseApiUrl."me?oauth_token=".$this->access_token;
		$info = json_decode(file_get_contents($url));
		$this->userid = $info->id;
	}

	
	//unlink account
	public function unlink() {
		ParseUser::getCurrentUser()->set("soundcloud_token", null);
		ParseUser::getCurrentUser()->save();
	}

	/*
	*	returns array of all the tracks info
	*/
	public function getTracks() {
		$url = self::$baseApiUrl."me/tracks?oauth_token=".$this->access_token;
		
		$tracks = json_decode(file_get_contents($url));
		$a =print_r($tracks,true);
		echo "got".$a;
		echo $url;
		$toReturn = [];

		foreach ($tracks as $key) {
			$a = print_r($key,true);
			echo $a;
			array_push($toReturn, new Track($key));
		}

		return $toReturn;
	}

	public function getPlaylists() {
		$url = self::$baseApiUrl."playlists/".$this->userid."/?client_id=".self::$clientId;
		
		$playlists = json_decode(file_get_contents($url), true);
		//$a =print_r($tracks,true);
		//echo $a;
		return $playlists;
	}

	//static function to get id by username
	public static function getUserIdFromUsername($username) {
		$url = self::$baseApiUrl."resolve.json?"
		 . "url=".self::$baseUrl
		 . "/$username"
		 . "&client_id=".self::$clientId;
		 
		$user_json = file_get_contents($url);
		 
		$user = json_decode($user_json);
		 
		return $user->id;
	}
}

SoundCloud::$clientId = getenv("SC_CLIENT_ID");
?>