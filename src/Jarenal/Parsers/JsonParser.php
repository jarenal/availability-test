<?php 

namespace Jarenal\Parsers;

class JsonParser implements iParser {

	private $filename;

	public function __construct($filename){
		$this->filename = $filename;
	}

	public function getData(){

		try {

			if(!file_exists($this->filename))
				throw new \Exception("The file '{$this->filename}' doesn't exist.", 1);
			
			$handle = @fopen($this->filename, "r");

			if($handle===false)
				throw new \Exception("Error trying to open file '{$this->filename}'.", 1);

			$json = fread($handle, filesize($this->filename));
			fclose($handle);
				
			return json_decode($json, true);


		} catch(\Exception $ex){
			throw $ex;
		}

	}
}