<?php

use \NoahBuscher\Macaw\Macaw;

Macaw::get('/', function() {
  echo '///';
});

Macaw::get('/test', function() {
  //echo 'test';

	$home = new app\controllers\HomeController;

	var_dump($home->test());
});


Macaw::get('/index','app\controllers\HomeController@index');


Macaw::dispatch();
