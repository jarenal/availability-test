<?php 

namespace Jarenal\Exporters;

class ExporterCreator {

	public static function init($data, $format){

		switch ($format) {
			case 'csv':
				$exporter = new CsvExporter($data);
				break;
			case 'json':
				$exporter = new JsonExporter($data);
				break;
			case 'xml':
				$exporter = new XmlExporter($data);
				break;
			default: // terminal format
				$exporter = new TerminalExporter($data);
				break;
		}

		return $exporter;
	}
}