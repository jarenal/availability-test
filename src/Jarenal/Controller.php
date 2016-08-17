<?php 

namespace Jarenal;

use \Jarenal\Exporters\ExporterCreator;
use \Jarenal\Parsers\ParserCreator;
use \Jarenal\AvailabilityGenerator;

class Controller {

	private $filename;
	private $output_file;
	private $output_format;

	public function __construct($source_file, $output_file="", $output_format=""){
		$this->filename = $source_file;
		$this->output_file = $output_file;
		$this->output_format = $output_format;
	}

	public function getOutput(){

		try { 
			$parser = ParserCreator::init($this->filename);
			$generator = new AvailabilityGenerator($parser->getData());
			$availability_data = $generator->getData();

			$exporter = ExporterCreator::init($availability_data, $this->output_format);

			$final_output = $exporter->getOutput();

			switch ($this->output_format) {
				case 'csv':
				case 'json':
				case 'xml':
					$handle = @fopen($this->output_file, "w+");
					fwrite($handle, $final_output);
					fclose($handle);
					return "The file '{$this->output_file}' was generated successfully.";
					break;
				default: // terminal
					return $final_output;
					break;
			}

		} catch (\Exception $ex) {
			throw $ex;
		}

	}
}