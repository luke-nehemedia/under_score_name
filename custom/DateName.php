<?php

require_once __DIR__.'/../helpers/UnderScoreName.php';

class DateName extends UnderScoreName {
	protected $year;

	public function __construct($year, $name, $extension){
		$this->year = $year;
		parent::__construct($name,$extension);
	}

	public function render(){
		return $this->year.'_'.parent::render();
	}
}
