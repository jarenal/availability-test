<?php 

namespace Jarenal\Parsers;

class ParserCreator {

	public static function init($filename){

		try {

			if(!file_exists($filename))
				throw new \Exception("The source file doesn't exist.", 1);

			$mime_type = pathinfo($filename,  PATHINFO_EXTENSION);
			
			switch ($mime_type) {		
				case "csv":
					$parser = new CsvParser($filename); 
					break;
				case "json":
					$parser = new JsonParser($filename); 
					break;
				case "xml":
					$parser = new XmlParser($filename); 
					break;
				default:
					throw new \Exception("Mime type not supported", 1);
					break;
			}

			return $parser;

		} catch(\Exception $ex) {
			throw $ex;
		}

	}
}