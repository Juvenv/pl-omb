<?php
Route::get('loggedUser', 'UserController@loggedUser');
Route::resource('status', 'StatusController');
Route::resource('claimant', 'ClaimantController');
Route::resource('manifestation', 'ManifestationController');
Route::resource('unit', 'UnitController');
Route::resource('sector', 'SectorController');
Route::resource('subject', 'subjectController');
