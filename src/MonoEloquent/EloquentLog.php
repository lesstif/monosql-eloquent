<?php

namespace MonoEloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentLog extends Model
{
    protected $table = 'EloquentLogs';
    //
    //protected $fillable = [''];
    
    public function __construct($table = 'EloquentLogs')
    {
        $this->table = $table;
    }
}

