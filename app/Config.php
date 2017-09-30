<?php

namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;

class Config
{
    protected $capsule;

    public function __construct()
    {
        $this->capsule = new Capsule();

        $this->capsule->addConnection([
           'driver' => 'mysql',
           'host' => '127.0.0.1',
           'database' => 'test_db',
           'username' => 'root',
           'password' => ''
        ]);

        $this->capsule->setAsGlobal();

        $this->capsule->bootEloquent();
    }
}