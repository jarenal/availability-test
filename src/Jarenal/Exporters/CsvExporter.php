<?php 

namespace Jarenal\Exporters;

class CsvExporter implements iExporter {
	
	private $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function getOutput()
	{
		$csv = "";
		$headers = array();

		foreach ($this->data as $parameter => $item) {

			$row = array();
			$row[] = $parameter; // First column will be the parameter name

			$headers = array("parameters/dates");
			
			foreach ($item as $date => $value) {

				$headers[] = $date;
				$row[] = $value;
			}
			
			$csv .= '"'.implode('","', $row)."\"\n\r";
		}

		$csv = '"'.implode('","', $headers)."\"\n\r".$csv;

		return $csv;
	}
}