<?php

namespace MonologEloquent;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

use MonologEloquent\EloquentLog;

class EloquentHandler extends AbstractProcessingHandler
{
    private $table;
    //
    public function __construct($table = null, $level = Logger::DEBUG, $bubble = true)
    {     
        if (empty($table)) {
           $this->table = env('LOG_TABLE', 'EloquentLogs');
        } else {
            $this->table = $table;
        }

        parent::__construct($level, $bubble);
    }

    protected function write(array $record)
    {   
        $logmodel = new EloquentLog($this->table);

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
