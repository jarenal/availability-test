#!/usr/bin/php
<?php 

require_once __DIR__."/vendor/autoload.php";

require_once __DIR__."/vendor/pear/console_table/Table.php";

use \Jarenal\Controller;

$message = <<<EOD

Usage:

	availability-generator.php [options]

This script generate a real time availability from a file resource. The next file formats are supported: XML, JSON, and CSV.

Optional arguments:

  -h, --help          Show this help message.
  -s, --source        Source file. Supported formats are: XML, JSON, and CSV.
  -o, --output        Output file. This parameter is optional. If you don't choose an output file the script will show the output through the terminal.
  -f, --format        Output file format. Supported formats are: XML, JSON, and CSV. Only required if you use output file.


EOD;

if(count($argv)==1 || (isset($argv[1]) && in_array($argv[1], array("-h", "--help"))))
	die($message);

$parameters = array("source"=>"", "output"=>"", "format"=>"");

foreach ($argv as $key => $argument) {

	// Parsing source
	if($argument == "-s") {
		if(isset($argv[$key+1]))
			$parameters["source"] = $argv[$key+1];
	} elseif(strpos($argument, "--source") !== false) {
		$parts = explode("=", $argument);
		$parameters["source"] = $parts[1];	
	}

	// Parsing output
	if($argument == "-o")
	{
		if(isset($argv[$key+1]))
			$parameters["output"] = $argv[$key+1];
	} elseif(strpos($argument, "--output") !== false) {
		$parts = explode("=", $argument);
		$parameters["output"] = $parts[1];	
	}

	// Parsing format
	if($argument == "-f")
	{
		if(isset($argv[$key+1]))
			$parameters["format"] = strtolower($argv[$key+1]);
	} elseif(strpos($argument, "--format") !== false) {
		$parts = explode("=", $argument);
		$parameters["format"] = $parts[1];	
	}

}

try {
	$controller = new Controller($parameters["source"], $parameters['output'], $parameters["format"]);

	die($controller->getOutput()."\n\r");

} catch (\Exception $ex) {
	die($ex->getMessage()."\n\r");
}
