<?php

require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ExampleTest extends PHPUnit_Framework_TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLogExample()
    {
        /*
        // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));

        // add records to the log
        $log->addWarning('Foo');
        $log->addError('Bar');
        */
        /*
        $stack = array();
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
        */
    }
}
