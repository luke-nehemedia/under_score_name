<?php

/**
  * Under_Score_Name
  *
  *	This class generates under_score_(file)_names from a given string.
  *	It can also be used to filter strings according to specific rules.
  *
  *	Last Update: 2014-06-17
  *
  * @author  Lucas Bares <luke@nehemedia.de>
  *	@version 1.0.2
  *	@package helpers
  *	@see http://luke.nehemedia.de/2014/06/11/laravel-under_score_name/ Blog Entry
  *	@see https://github.com/theLuke90/under_score_name Git-Repository
  */
class UnderScoreName {

	/**
	 *	Chars which are allowed and and are not replaced or deleted
	 *
	 *	@var Array
	 */
	protected $allow = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
					  'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
					  '1','2','3','4','5','6','7','8','9','0','_','-'];

	/**
	 *	Chars to be replaced by other chars
	 *
	 *	@var Array
	 */
	protected $replace = ['ä'=>'ae','ö' => 'oe','ü' => 'ue', 'Ä' => 'Ae', 'Ö' => 'Oe', 'Ü' => 'Ue', '.' => '-', ':' => '-', ' ' => '_', '?' => '', '!' => '',',' => '-'];

	/**
	 *	Chars that may not be at the end of the created name.
	 *
	 *	@var Array
	 */
	protected $forbidAtEnd = ['.',',','_','-'];

	protected $filename = '';
	protected $extension = '';

	/**
	 *	Construct
	 *
	 *	@param string $filename A filename or name
	 *	@param string|bool $extension (Optional) the file's extension
	 */
	public function __construct($filename, $extension = null){
		$this->setFilename($filename);
		$this->setExtension($extension);
	}

	/**
	 *	Generates an under_score (file)name
	 *
	 *	If no parameters are submitted, the function uses the stored object-variables $filename and $extension.
	 *
	 *	@param 	string $filename (Optional) Filename (does not overwrite stored data)
	 *	@param 	string|bool $extension (Optional) Extension name or Flag to not-use it (does not overwrite stored data)
	 *	@return string
	 */
	public function render($filename = null,$extension = null){
		// Use object variables if no parameters were submitted
		if(!$filename) $filename = $this->filename;
		if(($extension !== false) && $this->hasExtension()) $extension = $this->extension;

		// Split and walk string
		$array = str_split(trim($filename));
		$underScoreName = '';
		foreach ($array as $char) {
			if(array_key_exists($char, $this->replace) !== false){
				$underScoreName .= $this->replace[$char];
			}elseif(array_search($char, $this->allow) !== false){
				$underScoreName .= $char;
			}
		}

		// Remove unwanted chars from the end of the string
		while(array_search(mb_substr($underScoreName, -1), $this->forbidAtEnd)){
			$underScoreName = mb_substr($underScoreName, 0, -1);
		}

		// Add extionsion (lowercase)
		if($extension !== false){
			$underScoreName .= '.' . strtolower($extension);
		}

		return $underScoreName;
	}

	/**
	 *	Checks whether an extension was registered
	 *
	 *	@return bool
	 */
	protected function hasExtension(){
		return ((isset($this->extension)) && (strlen($this->extension) > 0)) ? true : false;
	}

	/**
	 *	Returns the under_score_name if the object is used as a String
	 *
	 *	@return string
	 */
	public function __toString(){
		return $this->render($this->filename,$this->extension);
	}

	// Add-Functions
	public function addReplace($search, $replace) { $this->replace[$search] = $replace; }
	public function addAllow($char) { $this->allow[] = $char; }
	public function addForbidAtEnd($char) { $this->forbidAtEnd[] = $char; }

	// Setter-Functions
	public function setFilename($filename) { $this->filename = $filename; }
	public function setExtension($extension) { $this->extension = $extension; }

	// Getter-Functions
	public function getFilename() { return $this->filename; }
	public function getReplace($search = null) { return (isset($search)) ? $this->replace[$search] : $this->replace; }
	public function getAllow($search = null) { return (isset($search)) ? $this->allow[$search] : $this->allow; }
	public function getForbidAtEnd($search = null) { return (isset($search)) ? $this->forbidAtEnd[$search] : $this->forbidAtEnd; }
	public function getExtension() { return $this->extension; }

}

?>