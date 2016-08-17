<?php

use PHPUnit\Framework\TestCase;
use Jarenal\Parsers\ParserCreator;
use Jarenal\AvailabilityGenerator;
use Jarenal\Fixtures\DummyData;

class AvailabilityGeneratorTest extends TestCase
{
    public function testOneRoom()
    {
        $parser = ParserCreator::init(dirname(__FILE__)."/Examples/availabilitygeneratortest.csv");
        $generator = new AvailabilityGenerator($parser->getData());
        $this->assertEquals($generator->getData(), DummyData::get("availability-test-1"));

    }

    public function testTwoRooms()
    {
        $parser = ParserCreator::init(dirname(__FILE__)."/Examples/availabilitygeneratortest-2-rooms.csv");
        $generator = new AvailabilityGenerator($parser->getData());
        $this->assertEquals($generator->getData(), DummyData::get("availability-test-2"));

    }

}