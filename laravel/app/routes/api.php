<?php
Route::get('loggedUser', 'UserController@loggedUser');
Route::resource('status', 'StatusController');
Route::resource('claimant', 'ClaimantController');
Route::resource('manifestation', 'ManifestationController');
