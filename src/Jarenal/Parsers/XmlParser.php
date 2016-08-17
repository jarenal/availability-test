<?php 

namespace Jarenal\Parsers;

class XmlParser implements iParser {

	private $filename;

	public function __construct($filename){
		$this->filename = $filename;
	}

	public function getData(){

		try {

			if(!file_exists($this->filename))
				throw new \Exception("The file '{$this->filename}' doesn't exist.", 1);

			$xml = simplexml_load_file($this->filename);

			if($xml===false)
				throw new \Exception("Error trying to open file '{$this->filename}'.", 1);				

			$data = array();

			foreach ($xml->room as $room) {

				$data[(string)$room['id']] = array();

				foreach ($room->days->day as $day) 
				{
					$data[(string)$room['id']][(string)$day['id']] = array("minimum"=>(string)$day->minimum, "status"=>(string)$day->status);
				}

			}

			return $data;

		} catch(\Exception $ex){
			throw $ex;
		}
		

	}

}