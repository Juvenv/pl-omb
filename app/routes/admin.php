<?php
Route::get('/', function(){

  $user =
  [
    'name' => 'Vitor Silvério de Souza',
    'sector' => [
      'name '=> 'Ouvidoria'
    ],
    'profile' => [
      'name' => 'Ouvidoria'
    ]
  ];
  $user = json_encode($user);

  return View::make('index')->with(compact('user'));

});
