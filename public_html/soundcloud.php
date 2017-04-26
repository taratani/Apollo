<?php
	
	use Parse\ParseUser;
	require_once "track.php";

class SoundCloud {
	public $userid;
	public $user;

	private static $baseApiUrl = "https://api.soundcloud.com/";
	private static $baseUrl = "https://soundcloud.com";
	private static $clientId = "gt8GZZd1lUpJBr450wjq7VPQzdHTRXE8";

	//constructor takes soundcloud user id
	public function __construct($userid) {
		$this->userid = $userid;
		$this->user = ParseUser::getCurrentUser();
	}

	//unlink account
	public function unlink() {
		ParseUser::getCurrentUser()->set("soundcloud_user_id", null);
		ParseUser::getCurrentUser()->save();
	}

	/*
	*	returns array of all the tracks info
	*/
	public function getTracks() {
		$url = self::$baseApiUrl."tracks/".$this->userid.".json?client_id=".self::$clientId;
		
		$tracks = json_decode(file_get_contents($url));
		$a =print_r($tracks,true);
		echo $a;
		echo $url;
		$toReturn = [];

		foreach ($tracks as $key) {
			$a = print_r($key,true);
			echo $a;
			array_push($toReturn, new Track($key));
		}

		return $tracks;
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
?>