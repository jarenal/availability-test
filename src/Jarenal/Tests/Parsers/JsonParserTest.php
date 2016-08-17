<?php

use PHPUnit\Framework\TestCase;
use Jarenal\Parsers\JsonParser;

class JsonParserTest extends TestCase
{
    public function testFileNotExistError()
    {
        $this->expectException(\Exception::class);

    	$parser = new JsonParser(dirname(__FILE__)."/../Examples/no-exist.json");

        $parser->getData();

    }
}