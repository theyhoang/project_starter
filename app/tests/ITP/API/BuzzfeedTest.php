<?php

class BuzzfeedTest extends PHPUnit_Framework_TestCase {

    public function test_status_is_error()
    {
        $errorJson = '{"status": "error","message": "Aw Snap! Something went wrong!"}';
        $mock = $this->getMock('ITP\Utils\JsonCurl');
        $mock
          ->expects($this->once())
          ->method('request')
          ->will($this->returnValue(json_decode($errorJson)));

        $buzzfeed = new ITP\API\Buzzfeed($mock);
        $results = $buzzfeed->get();

        // var_dump($results);

        $this->assertEquals('error', $buzzfeed->status);
    }

    public function test_sets_data()
    {
        $jsonData = file_get_contents(__DIR__ . '/json-success-fixture.json');
        $mock = $this->getMock('ITP\Utils\JsonCurl');
        $mock
          ->expects($this->once())
          ->method('request')
          ->will($this->returnValue(json_decode($jsonData)));

        $buzzfeed = new ITP\API\Buzzfeed($mock);
        $results = $buzzfeed->get();
        $this->assertCount(5, $buzzfeed->content);
    }


	
}