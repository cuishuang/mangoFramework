<?php

namespace config;

use \NoahBuscher\Macaw\Macaw;

Macaw::get('/', function() {
  echo '<h1>Mango Framework.</h1>';
});


Macaw::get('hello', function() {
  echo '<h1>Hello Mango Framework.</h1>';
});

//首页
Macaw::get('index','app\controllers\Home\IndexController@index');


Macaw::dispatch();

