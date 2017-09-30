<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

$capsule = new \App\Config();

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table){
   $table->increments('id');
   $table->string('email', 100);
   $table->string('name', 100);
   $table->string('password', 100);
   $table->timestamps();
});