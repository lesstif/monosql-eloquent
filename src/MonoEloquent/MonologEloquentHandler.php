<?php

namespace MonoEloquent;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class MonologEloquentHandler extends AbstractProcessingHandler
{
    //
    public function __construct(EloquentLog $logmodel, $level = Logger::DEBUG, $bubble = true)
    {     
        parent::__construct($level, $bubble);
    }

    protected function write(array $record)
    {   
        $logmodel = new EloquentLog;

        $logmodel->channel = $record['channel'];
        $logmodel->loglevel = $record['level'];
        $logmodel->loglevel_name = $record['level_name'];
        //$logmodel->context = json_encode($record['context']);
        $logmodel->message = empty($record['message']) ? ' ' : $record['message'];
        //$logmodel->formatted = $record['formatted'];
        $logmodel->created_at = $record['datetime']->format('U');

        $logmodel->save();
    }
}
