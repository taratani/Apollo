<?php

class Track {
	public $id;
	public $user_id;
	public $username;
	public $title;
	public $permalink_url;
	public $sharing;
	public $purchase_url;
	public $artwork_url;

	public function __construct($obj) {
		if($obj) {
			$this->id = $obj->id;
			$this->user_id = $$obj->user_id;
			echo $this->id;
		}
	}
}
?>