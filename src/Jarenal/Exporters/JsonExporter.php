<?php 

namespace Jarenal\Exporters;

class JsonExporter implements iExporter {
	
	private $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function getOutput()
	{
		return json_encode($this->data);
	}	
}