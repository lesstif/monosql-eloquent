<?php

namespace MonologEloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentLog extends Model
{
    protected $table;
    //
    //protected $fillable = [''];

    public function __construct($table)
    {
        $this->table = $table;
    }
}

