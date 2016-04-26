<?php

use \NoahBuscher\Macaw\Macaw;

Macaw::get('/', function() {
  echo '///';
});

Macaw::get('/test', function() {
  echo 'test';
});


Macaw::get('/home','HomeController@home');


Macaw::dispatch();
