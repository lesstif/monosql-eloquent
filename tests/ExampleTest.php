<?php

require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use MonologEloquent\EloquentHandler;

use Illuminate\Database\Capsule\Manager as Capsule;

class ExampleTest extends PHPUnit_Framework_TestCase 
{
    private $table = 'Mytable';

    public function setUp()
    {
        parent::setUp();

        $capsule = new Capsule;

        $database = __DIR__.'/../database.sqlite';

        if(!file_exists($database))
            file_put_contents ($database, null);

        $capsule->addConnection([
            'driver' => 'sqlite',
            'database' => $database,
            'prefix' => ''
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /**
     * I don't know how can i running artisan migrate command outside laravel.
     *
     * @return void
     */
    public function testLogExample()
    {
        // create a log channel
        $log = new Logger('channel-name');
        $log->pushHandler(new StreamHandler('path-to-your.log', Logger::WARNING));

        $log->pushHandler(new EloquentHandler($this->table, Logger::DEBUG));

        // add records to the log
        $log->addWarning('Foo');
        $log->addError('Bar');       
    }
}
