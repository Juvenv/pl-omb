<?php
Route::get('/', function(){
  return View::make('index');
});

Route::get('/manifestation/search', function(){
  return View::make('index');
});
