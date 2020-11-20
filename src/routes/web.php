<?php
/*
  funções declaradas dentro do web.php geram erro no artisan config:cache, mensagem de declaração duplicada
  sem existir, por isso foi usado o helper;
*/

Route::group(['prefix' => 'admin', 'middleware' => ['web','admin'], 'as' => 'admin.'],function(){
    Route::group(['prefix' => 'testimonials'], function () {
    Route::get('/','TestimonialsController@index');
    Route::get('teste', 'TestimonialsController@teste');
    Route::get('list', 'TestimonialsController@list');
    Route::get('view/{id}', 'TestimonialsController@view');
    Route::post('create', 'TestimonialsController@create');
    Route::post('update/{id}', 'TestimonialsController@update');
    Route::get('delete/{id}', 'TestimonialsController@delete');			
  });
});
