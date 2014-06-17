<?php

require_once __DIR__.'/../helpers/UnderScoreName.php';

class DateAuthorName extends UnderScoreName {
	protected $year;
	protected $author;

	public function __construct($year, $author, $name, $extension){
		$this->setYear($year);
		$this->setAuthor($author);
		parent::__construct($name,$extension);
	}

	public function render(){
		return $this->year.'_'.$this->author.'_'.parent::render();
	}

	public function setYear($year){
		$this->year = $year;
	}

	public function setAuthor($author){
		$this->author = $author;
	}
}

?>