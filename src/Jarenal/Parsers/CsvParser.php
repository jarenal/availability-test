<?php 

namespace Jarenal\Parsers;

class CsvParser implements iParser {

	private $filename;

	public function __construct($filename){
		$this->filename = $filename;
	}

	public function getData(){

		try
		{
			if(!file_exists($this->filename))
				throw new \Exception("The file '{$this->filename}' doesn't exist.", 1);

			$temp_data = array();

			$handle = fopen($this->filename, "r");

			if($handle===false)
				throw new \Exception("Error trying to open file '{$this->filename}'.", 1);

		    while (($row = fgetcsv($handle, 0, ",")) !== false) {
		        $temp_data[] = $row;
		    }

		    fclose($handle);


			$data = array();

			foreach ($temp_data as $key => $row) 
			{
				if(count($row)!==4)
					throw new \Exception("The CSV file must have 4 columns.", 1);

				foreach ($row as $cell) {
					if($cell==="")
						throw new \Exception("The CSV file has a wrong format", 1);
				}

				if($row[0]=="room")
					continue;
				$data[$row[0]][$row[1]] = array("minimum"=>$row[2], "status"=>$row[3]);
			}
			
			return $data;

		} catch (\Exception $ex) {
			throw $ex;
		}
	}
}