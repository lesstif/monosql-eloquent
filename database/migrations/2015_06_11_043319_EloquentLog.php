<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EloquentLog extends Migration
{
    protected $table;

    public function __construct()
    {
        $this->table = env('LOG_TABLE', 'EloquentLogs');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create($this->table, function(Blueprint $table)
		{
			$table->bigIncrements('id');
            $table->string('channel');
            $table->tinyInteger('loglevel')->index();
            $table->string('loglevel_name', 20)->index();
            //$table->text('context');
            $table->text('message');

            // formatted whole log message
            //$table->text('formatted');
            $table->nullableTimestamps();
		});      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists($this->table);
    }
}

