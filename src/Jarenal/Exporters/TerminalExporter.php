<?php 

namespace Jarenal\Exporters;

class TerminalExporter implements iExporter {
	
	private $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function getOutput()
	{
		$tbl = new \Console_Table();

		// Creating table rows... 
		foreach ($this->data as $parameter => $item) {

			$row = array();
			$row[] = $parameter; // First column will be the parameter name

			$headers = array("Parameters / Dates");
			
			foreach ($item as $date => $value) {
				$headers[] = $date;
				$row[] = $value;
			}
			$tbl->addRow($row);
		}

		// Adding header line
		$tbl->setHeaders($headers);

		return $tbl->getTable();
	}
}