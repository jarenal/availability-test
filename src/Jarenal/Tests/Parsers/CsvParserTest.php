<?php

use PHPUnit\Framework\TestCase;
use Jarenal\Parsers\CsvParser;
use Jarenal\Fixtures\DummyData;

class CsvParserTest extends TestCase
{
    public function testWithoutQuotes()
    {
        $parser = new CsvParser(dirname(__FILE__)."/../Examples/csvparsertest-without-quotes.csv");

        $this->assertEquals($parser->getData(), DummyData::get("csvparsertest-one"));
    }

    public function testWithQuotes()
    {
    	$parser = new CsvParser(dirname(__FILE__)."/../Examples/csvparsertest-with-quotes.csv");

        $this->assertEquals($parser->getData(), DummyData::get("csvparsertest-one"));
    }

    public function testEmpty()
    {
    	$parser = new CsvParser(dirname(__FILE__)."/../Examples/csvparsertest-empty.csv");

        $this->assertEquals($parser->getData(), array());
    }

    public function testFormatError()
    {
        $this->expectException(\Exception::class);

        $parser = new CsvParser(dirname(__FILE__)."/../Examples/csvparsertest-format-error.csv");

        $parser->getData();

    }

    public function testEmptyCellError()
    {
        $this->expectException(\Exception::class);

        $parser = new CsvParser(dirname(__FILE__)."/../Examples/csvparsertest-empty-cell-error.csv");

        $parser->getData();

    }

    public function testFileNotExistError()
    {
        $this->expectException(\Exception::class);

    	$parser = new CsvParser(dirname(__FILE__)."/../Examples/no-exist.csv");

        $parser->getData();

    }
}