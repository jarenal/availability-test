<?php

use PHPUnit\Framework\TestCase;
use Jarenal\Parsers\XmlParser;

class XmlParserTest extends TestCase
{
    public function testFileNotExistError()
    {
        $this->expectException(\Exception::class);

    	$parser = new XmlParser(dirname(__FILE__)."/../Examples/no-exist.xml");

        $parser->getData();

    }
}