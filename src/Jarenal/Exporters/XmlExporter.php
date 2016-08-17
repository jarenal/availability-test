<?php 

namespace Jarenal\Exporters;

class XmlExporter implements iExporter {
	
	private $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function getOutput()
	{
		$dom = new \DOMDocument('1.0', 'UTF-8');
		$element = $dom->appendChild(new \DOMElement("root"));

		foreach ($this->data as $parameter => $item) 
		{
			$paramNode = $element->appendChild(new \DOMElement($parameter));
			$daysNode = $paramNode->appendChild(new \DOMElement("days"));

			foreach ($item as $date => $value) 
			{
				$day = $daysNode->appendChild(new \DOMElement("day"));
				$day->setAttribute("id", $date);
				$day->appendChild(new \DOMText($value));
			}
		}

		$dom->formatOutput = true;
		return $dom->saveXML(); 
	}
}