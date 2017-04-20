<?php
Route::get('/', function(){
  (new ManifestationController)->store();
  // return View::make('index');
});

Route::get('/manifestation/search', function(){
  return View::make('index');
});
